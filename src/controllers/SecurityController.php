<?php
session_start();

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../models/Shelter.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            $this->unsetSession();
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $userRepository->getUser($email);

        if (!$user)
            return $this->render('login', ['messages' => ['User not found!']]);

        if ($user->getEmail() !== $email)
            return $this->render('login', ['messages' => ['User with this email not exist!']]);

        if(!password_verify($password, $user->getPassword()))
            return $this->render('login', ['messages' => ['Wrong password!']]);

        $userId = $this->userRepository->getUserDetailsId($user);
        $this->userRepository->log($userId,true);

        $_SESSION['user'] = htmlspecialchars($user->getEmail());
        $_SESSION['userId'] = htmlspecialchars($userId);
        $_SESSION['shelter'] = htmlspecialchars($this->userRepository->checkIfUserIsAShelter($userId));

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function signUpShelter() {
        if (!$this->isPost()) {
            $this->unsetSession();
            return $this->render('signin-shelter');
        }

        $phoneNumber= $_POST['phone'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $streetNumber = $_POST['street-number'];
        $postalCode = $_POST['postal-code'];
        $website = $_POST['website'];

        $shelter = new Shelter($phoneNumber, $city, $street, $streetNumber, $postalCode, $website, null);
        $this->signUp($shelter, 'signin-shelter');
    }

    public function signUpPersonal() {
        if (!$this->isPost()) {
            $this->unsetSession();
            return $this->render('signin-personal');
        }
        $this->signUp(null, 'signin-personal');
    }

    public function signUp($shelter, $template) {
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmed-password'];

        if ($password !== $confirmedPassword) {
            return $this->render($template, ['messages' => ['Podaj prawidłowe hasło']]);
        }

        if (empty($_POST['terms'])) {
            return $this->render($template, ['messages' => ['Nie zaakceptowano warunków']]);
        }
        $emailCheck = $this->userRepository->checkIfEmailAlreadyExist($email);
        if($emailCheck) {
            return $this->render($template, ['messages' => ['Użytkownik z takim e-mailem już istnieje']]);
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($email, $hashed_password);
        $this->userRepository->addUser($user, $shelter);

        return $this->render('login', ['messages' => ['Zarejestrowano do serwisu!']]);
    }

    public function logout(){
        $this->userRepository->log($_SESSION['userId'],(bool)false);
        $this->unsetSession();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function unsetSession(){
        session_unset();
    }
}
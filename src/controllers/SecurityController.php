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

        setcookie("user_email", $user->getEmail(), time()+ 360, "/");
        $_SESSION['user'] = htmlspecialchars($user->getEmail());
        $userId = $this->userRepository->getUserDetailsId($user);
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
        $name = $_POST['user-name'];

        if ($password !== $confirmedPassword) {
            return $this->render($template, ['messages' => ['Podaj prawidłowe hasło']]);
        }

        if (empty($_POST['terms'])) {
            return $this->render($template, ['messages' => ['Nie zaakceptowano warunków']]);
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($email, $hashed_password, $name);
        $this->userRepository->addUser($user, $shelter);

        return $this->render('login', ['messages' => ['Zarejestrowano do serwisu!']]);
    }

    public function logout(){
        $this->unsetSession();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function unsetSession(){
        if (!empty($_SESSION['user']))
            unset($_SESSION['user']);

        if (!empty($_SESSION['userId']))
            unset($_SESSION['userId']);

        if (!empty($_SESSION['shelter']))
            unset($_SESSION['shelter']);
        session_destroy();
    }
}
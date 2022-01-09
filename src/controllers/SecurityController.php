<?php

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
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function signUpShelter() {
        if (!$this->isPost()) {
            return $this->render('signin-shelter');
        }

        $phoneNumber= $_POST['phone'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $streetNumber = $_POST['street-number'];
        $postalCode = $_POST['postal-code'];
        $website = $_POST['website'];
//        $openFromDay = $_POST['shelter-name'];
//        $openToDay = $_POST['shelter-name'];
//        $openFromHour = $_POST['shelter-name'];
//        $openToHour = $_POST['shelter-name'];

        $shelter = new Shelter($phoneNumber, $city, $street, $streetNumber, $postalCode, $website);
        $this->signUp($shelter, 'signin-shelter');
    }

    public function signUpPersonal() {
        if (!$this->isPost()) {
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

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name);
        $user->setShelter($shelter);
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Zarejestrowano do serwisu!']]);
    }
}
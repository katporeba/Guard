<?php
require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        $this->render('dashboard');
    }

    public function search() {
        $this->render('search');
    }

    public function chooseAnimal() {
        $this->render('choose-animal');
    }

    public function signUp() {
        $this->render('signin');
    }
}
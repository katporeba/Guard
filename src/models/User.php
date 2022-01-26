<?php
require_once __DIR__ .'/../models/Shelter.php';

class User {
    private $email;
    private $password;

    public function __construct(
        string $email,
        string $password
    ) {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}
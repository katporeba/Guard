<?php

class User {
    private $email;
    private $password;
    private $username;
    private $idShelter;

    public function __construct(
        string $email,
        string $password,
        string $username,
        string $idShelter
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->idShelter = $idShelter;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}
<?php
require_once __DIR__ .'/../models/Shelter.php';

class User {
    private $email;
    private $password;
    private $username;
    private $shelter;

    public function __construct(
        string $email,
        string $password,
        string $username
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->shelter = null;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getShelter()
    {
        return $this->shelter;
    }

    public function setShelter($shelter): void
    {
        $this->shelter = $shelter;
    }




}
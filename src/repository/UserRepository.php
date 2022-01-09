<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository {

    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public."User" WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // tworzymy jako tablica asocjacyjna
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //trzeba rzucic wyjątek
        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['id_Shelter']
        );
    }
}
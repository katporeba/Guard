<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Shelter.php';



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
            $user['password']
        );
    }

    public function addUser(User $user, $shelter) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."User" (email, password, "logged_in")
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            false
        ]);

        if($shelter != null) {
            $id = $this->getUserDetailsId($user);
            $shelter->setIdUser($id);
            $db = $this->database->connect();
            $stmt = $db->prepare('
            INSERT INTO public."Shelter" ("phone_number", city, street, "street_number","postal_code",website, "id_User")
            VALUES (?, ?, ?, ?, ?, ?, ?)
            ');

            $stmt->execute([
                $shelter->getPhoneNumber(),
                $shelter->getCity(),
                $shelter->getStreet(),
                $shelter->getStreetNumber(),
                $shelter->getPostalCode(),
                $shelter->getWebsite(),
                $id
            ]);
        }
    }

    public function getUserDetailsId(User $user): int {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."User" WHERE email = :email
        ');
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_User'];
    }

    public function checkIfUserIsAShelter(int $id) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Shelter" WHERE "id_User" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['id_Shelter'] != null) {
            return $data['id_Shelter'];
        }
        else
            return "personal";
    }

    public function log(int $id, bool $boolValue) {
        $stmt = $this->database->connect()->prepare('
            UPDATE public."User" SET "logged_in" = :boolValue WHERE "id_User" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':boolValue', $boolValue, PDO::PARAM_BOOL);
        $stmt->execute();
    }

}
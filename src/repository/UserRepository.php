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
            $user['username']
//            $user['id_Shelter']
        );
    }

    public function addUser(User $user) {
        if($user->getShelter() == null) {
            $idShelter = null;
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public."User" (email, password, username, "id_Shelter")
            VALUES (?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getUsername(),
                $idShelter
            ]);
        }
        else {
            $db = $this->database->connect();
            $stmt = $db->prepare('
            INSERT INTO public."Shelter" ("phone_number", city, street, "street_number","postal_code",website,"open_from_day","open_to_day","open_from_hour","open_to_hour")
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getShelter()->getPhoneNumber(),
                $user->getShelter()->getCity(),
                $user->getShelter()->getStreet(),
                $user->getShelter()->getStreetNumber(),
                $user->getShelter()->getPostalCode(),
                $user->getShelter()->getWebsite(),
                $user->getShelter()->getOpenFromDay(),
                $user->getShelter()->getOpenToDay(),
                $user->getShelter()->getOpenFromHour(),
                $user->getShelter()->getOpenToHour()
            ]);

            $id = $db->lastInsertId();

            $stmt = $this->database->connect()->prepare('
            INSERT INTO public."User" (email, password, username, "id_Shelter")
            VALUES (?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getUsername(),
                $id
            ]);
        }
    }

    public function getUserDetailsId(User $user): int {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->bindParam(':phone', $user->getPhone(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}
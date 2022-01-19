<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../models/Shelter.php';
require_once __DIR__.'/../models/Animal.php';
require_once __DIR__.'/../models/Graph.php';

class ProjectRepository extends Repository {
    public function getProject(int $id_Project): ?Project {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" WHERE id_Project = :id_Project
        ');
        $stmt->bindParam(':id_Project', $id_Project, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) {
            return null;
        }

        return new Project(
            $project['title'],
            $project['description'],
            $project['image'],
            $project['id_Project']
        );
    }

    public function addProject(Project $project, Animal $animal, Graph $graph): void {
        $date = new DateTime("now", new DateTimeZone('Europe/Warsaw'));
        $db = $this->database->connect();

        $animalType = $animal->getAnimalType();
        $stmt = $this->database->connect()->prepare('
            SELECT "id_Animal_type" FROM public."Animal_type" WHERE type_name LIKE :name;
        ');
        $stmt->bindParam(':name', $animalType, PDO::PARAM_STR);
        $stmt->execute();
        $projects = $stmt->fetchAll();
        $idAnimalType = $projects[0][0];

        $stmt = $db->prepare('
            INSERT INTO public."Graph" ("requires_attention", "accepts_children", "accepts_animals", "energy_level")
            VALUES (?, ?, ?, ?)
        ');

        $stmt1 = $db->prepare('
            INSERT INTO public."Animal" (name, age, gender, size, health, color, weight, "id_Graph", "id_Animal_type")
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');


        $stmt2 = $this->database->connect()->prepare('
            INSERT INTO public."Project" (title, description, "id_Shelter", "id_Animal", "created_at", photo)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $graph->getRequiresAttention(),
            $graph->getAcceptsChildren(),
            $graph->getAcceptsAnimals(),
            $graph->getEnergyLevel()
        ]);

        $idGraph = $db->lastInsertId();

        $stmt1->execute([
            $animal->getName(),
            $animal->getAge(),
            $animal->getGender(),
            $animal->getSize(),
            $animal->getHealth(),
            $animal->getColor(),
            $animal->getWeight(),
            $idGraph,
            $idAnimalType
        ]);

        $id = $db->lastInsertId();

        $stmt2->execute([
            $project->getTitle(),
            $project->getDescription(),
            $_SESSION["shelter"],
            $id,
            $date->format("Y-m-d h:i:s"),
            $project->getImage()
        ]);
    }

    public function getProjects(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" NATURAL JOIN public."Animal" NATURAL JOIN public."Shelter" 
                NATURAL JOIN public."User" NATURAL JOIN public."Animal_type" NATURAL JOIN public."Graph" ORDER BY "created_at" DESC;
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->returnObjects($projects);
    }

    public function getFavouriteProjects(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Favourites" NATURAL JOIN public."Project" NATURAL JOIN public."Animal"
            NATURAL JOIN public."Shelter" NATURAL JOIN public."Animal_type" NATURAL JOIN public."User"
            NATURAL JOIN public."Graph" WHERE public."Favourites"."id_Fav_User" = :idUser ORDER BY "created_at" DESC;
        ');
        $stmt->bindParam(':idUser', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->returnObjects($projects);
    }

    public function getProjectsWithFilter($filterArray) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" NATURAL JOIN public."Shelter" NATURAL JOIN public."Animal" NATURAL JOIN public."Animal_type"
             NATURAL JOIN public."Graph" WHERE city LIKE :local AND health LIKE :health AND age <= :age AND type_name LIKE :type '.$filterArray['color'].$filterArray['size'].$filterArray['gender'].' ORDER BY "created_at" '.$filterArray['filter']);

        $stmt->bindParam(':local', $filterArray['local'], PDO::PARAM_STR);
        $stmt->bindParam(':health', $filterArray['healthy'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $filterArray['age'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $filterArray['rGroup'], PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectsWithId(int $id) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" NATURAL JOIN public."Shelter" NATURAL JOIN public."Animal" NATURAL JOIN public."Animal_type"
             NATURAL JOIN public."Graph" NATURAL JOIN public."User" WHERE "id_Project" = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);
        $post = [];
        $post[] = $this->createObject($project);
        $post['checkFav'] = $this->checkIfInFavourites($id);
        return $post;
    }

    public function like(int $id) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Favourites" WHERE "id_Project" = :idProject AND "id_Fav_User" = :idUser
         ');

        $stmt->bindParam(':idProject', $id, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $_SESSION["userId"], PDO::PARAM_INT);

        $stmt->execute();
        $project = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!is_null($project[0])) {
            $stmt = $this->database->connect()->prepare('
            DELETE FROM public."Favourites" WHERE "id_Project" = :idProject AND "id_Fav_User" = :idUser
         ');
            $stmt->bindParam(':idProject', $id, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $_SESSION["userId"], PDO::PARAM_INT);

            $stmt->execute();
        }
        else {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public."Favourites"("id_Fav_User", "id_Project") VALUES(:idUser, :idProject)
         ');
            $stmt->bindParam(':idProject', $id, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $_SESSION["userId"], PDO::PARAM_INT);

            $stmt->execute();
        }
    }

    public function checkIfInFavourites(int $id){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Favourites" WHERE "id_Project" = :idProject AND "id_Fav_User" = :idUser
         ');

        $stmt->bindParam(':idProject', $id, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $_SESSION["userId"], PDO::PARAM_INT);

        $stmt->execute();
        $project = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!is_null($project[0])) {
            return true;
        }
        else return false;
    }

    public function returnObjects($projects) {
        $result = [];
        foreach ($projects as $project){
            $result[] = $this->createObject($project);
        }

        return $result;
    }

    public function createObject($project) {
        return array(
            "project" => new Project(
                $project['title'],
                $project['description'],
                $project['photo'],
                $project['id_Project']
            ),

            "animal" => new Animal(
                $project['name'],
                $project['age'],
                $project['gender'],
                $project['size'],
                $project['health'],
                $project['color'],
                $project['weight'],
                $project['type_name']
            ),

            "shelter" => new Shelter(
                $project['phone_number'],
                $project['city'],
                $project['street'],
                $project['street_number'],
                $project['postal_code'],
                $project['website'],
                $project['id_User']
            ),

            "user" => new User(
                $project['email'],
                $project['password'],
                $project['username']
            ),

            "graph" => new Graph(
                $project['requires_attention'],
                $project['accepts_children'],
                $project['accepts_animals'],
                $project['energy_level']
            ),

            "date" => $project['created_at'],
//            "checkfav" => $this->checkIfInFavourites($project['id_Project'])
        );
    }

}
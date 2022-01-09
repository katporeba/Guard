<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../models/Animal.php';


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
            $project['image']
        );
    }

    public function addProject(Project $project, Animal $animal): void {
        $date = new DateTime();
        $db = $this->database->connect();
        $stmt1 = $db->prepare('
            INSERT INTO public."Animal" (name, age, gender, size, health, color, weight, "id_Shelter", "id_Graph")
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');


        $stmt2 = $this->database->connect()->prepare('
            INSERT INTO public."Project" (title, description, "id_Shelter", "id_Animal", "created_at", photo)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $idShelter = 1;
        $idAnimal = 1;
        $idGraph = 1;

        $stmt1->execute([
            $animal->getName(),
            $animal->getAge(),
            $animal->getGender(),
            $animal->getSize(),
            $animal->getHealth(),
            $animal->getColor(),
            $animal->getWeight(),
            $idShelter,
            $idGraph
        ]);

        $id = $db->lastInsertId();

        $stmt2->execute([
            $project->getTitle(),
            $project->getDescription(),
            $idShelter,
            $id,
            $date->format('Y-m-d'),
            $project->getImage()
        ]);
    }

    public function getProjects(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" NATURAL JOIN public."Animal" NATURAL JOIN public."Shelter" NATURAL JOIN public."User";
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $tmp = array(
                "project" => new Project(
                    $project['title'],
                    $project['description'],
                    $project['photo']
                ),

                "animal" => new Animal(
                    $project['name'],
                    $project['age'],
                    $project['gender'],
                    $project['size'],
                    $project['health'],
                    $project['color'],
                    $project['weight']
                ),

                "shelter" => new Shelter(
                    $project['phone_number'],
                    $project['city'],
                    $project['street'],
                    $project['street_number'],
                    $project['postal_code'],
                    $project['website']
                ),

                "user" => new User(
                    $project['email'],
                    $project['password'],
                    $project['username']
                ),

                "date" => $project['created_at']
                );

            $result[] = $tmp;
        }

        return $result;
    }

    public function getProjectByTitle(string $searchString) {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Project" WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
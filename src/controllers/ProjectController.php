<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';
require_once __DIR__.'/../models/Animal.php';
require_once __DIR__.'/../models/Graph.php';


class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $projectRepository;

    public function __construct() {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }

    public function searchBy() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectsWithFilter($decoded));
        }
    }

    public function search() {
        $projects = $this->projectRepository->getProjects();
        $this->render('search', ['projects' => $projects]);
    }

    public function favourites() {
        if (!isset($_SESSION["userId"])){
            $this->render('login');
        }
        $projects = $this->projectRepository->getFavouriteProjects();
        $this->render('favourites', ['projects' => $projects]);
    }

    public function addProject() {
        if (empty($_SESSION['shelter'])) {
            return $this->render('login');
        }
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            $project = new Project($_POST['name-animal'], $_POST['post-desc'], $_FILES['file']['name']);
            $animal = new Animal($_POST['name-animal'],$_POST['age'], $_POST['genderCheck'], $_POST['chooseSize'], $this->checkIfHealthy($_POST['healthy']), $_POST['Color'], $_POST['weight'], $_POST['rGroup']);
            $graph = new Graph($_POST['graph1'], $_POST['graph2'], $_POST['graph3'], $_POST['graph4']);

            $this->projectRepository->addProject($project, $animal, $graph);

            return $this->render('search', [
                'messages' => $this->message,
                'projects' => $this->projectRepository->getProjects()
            ]);
        }
        return $this->render('add-post', ['messages' => $this->message]);
    }

    public function post(int $id) {
        $projects = $this->projectRepository->getProjectsWithId($id);
        $this->render('post', ['projects' => $projects]);
    }

    public function like(int $id) {
        $this->projectRepository->like($id);
        http_response_code(200);
    }

    private function validate(array $file): bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

    private function checkIfHealthy($health) {
        if(!$health == 'Zdrowy/a') {
            return 'Wymaga leczenia';
        }
        else return $health;
    }

}
<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';
require_once __DIR__.'/../models/Animal.php';

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

    public function addProject() {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            // TODO create new project object and save it in database
            $project = new Project($_POST['name-animal'], $_POST['post-desc'], $_FILES['file']['name']);
            $animal = new Animal($_POST['name-animal'],$_POST['age'], $_POST['genderCheck'], $_POST['chooseSize'], $_POST['healthy'], $_POST['Color'], $_POST['weight']);

            $this->projectRepository->addProject($project, $animal);

            return $this->render('search', ['messages' => $this->message, 'project'=>$project, 'animal'=>$animal]);
        }
        return $this->render('add-post', ['messages' => $this->message]);
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
}
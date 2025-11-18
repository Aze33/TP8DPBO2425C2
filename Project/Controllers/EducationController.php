<?php
include_once 'models/Education.php';
include_once 'models/Lecturer.php'; // Load Lecturer untuk dropdown
include_once 'config/database.php';

class EducationController {
    private $eduModel;
    private $lecturerModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->eduModel = new Education($db);
        $this->lecturerModel = new Lecturer($db);
    }

    public function index() {
        $educations = $this->eduModel->getAll();
        include 'views/Education/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->eduModel->create($_POST['institution'], $_POST['degree'], $_POST['major'], $_POST['grad_year'], $_POST['lecturer_id']);
            header("Location: index.php?mod=education");
        } else {
            $lecturers = $this->lecturerModel->getAll();
            include 'views/Education/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->eduModel->update($_POST['id'], $_POST['institution'], $_POST['degree'], $_POST['major'], $_POST['grad_year'], $_POST['lecturer_id']);
            header("Location: index.php?mod=education");
        } else {
            $row = $this->eduModel->getById($id);
            $lecturers = $this->lecturerModel->getAll();
            include 'views/Education/edit.php';
        }
    }

    public function delete($id) {
        if ($id) $this->eduModel->delete($id);
        header("Location: index.php?mod=education");
    }
}
?>
<?php
include_once 'models/Lecturers.php';
include_once 'config/database.php';

class LecturerController {
    private $model;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->model = new Lecturer($db);
    }

    public function index() {
        $lecturers = $this->model->getAll();
        include 'views/Lecturers/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->create($_POST['name'], $_POST['nidn'], $_POST['phone'], $_POST['join_date']);
            header("Location: index.php?mod=lecturer");
        } else {
            include 'views/lecturers/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($_POST['id'], $_POST['name'], $_POST['nidn'], $_POST['phone'], $_POST['join_date']);
            header("Location: index.php?mod=lecturer");
        } else {
            $row = $this->model->getById($id);
            include 'views/lecturers/edit.php';
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=lecturer");
    }
}
?>
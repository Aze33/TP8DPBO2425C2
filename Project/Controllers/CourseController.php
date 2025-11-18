<?php
include_once 'models/Course.php';
include_once 'models/Lecturer.php'; // Butuh ini untuk dropdown dosen
include_once 'config/database.php';

class CourseController {
    private $courseModel;
    private $lecturerModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->courseModel = new Course($db);
        $this->lecturerModel = new Lecturer($db);
    }

    public function index() {
        $courses = $this->courseModel->getAll();
        include 'views/courses/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->courseModel->create($_POST['course_name'], $_POST['credits'], $_POST['lecturer_id']);
            header("Location: index.php?mod=course");
        } else {
            // Ambil data dosen untuk dropdown
            $lecturers = $this->lecturerModel->getAll();
            include 'views/courses/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->courseModel->update($_POST['id'], $_POST['course_name'], $_POST['credits'], $_POST['lecturer_id']);
            header("Location: index.php?mod=course");
        } else {
            $row = $this->courseModel->getById($id);
            $lecturers = $this->lecturerModel->getAll();
            include 'views/courses/edit.php';
        }
    }

    public function delete($id) {
        $this->courseModel->delete($id);
        header("Location: index.php?mod=course");
    }
}
?>
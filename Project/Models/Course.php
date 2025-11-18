<?php
class Course {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    // Menggunakan JOIN agar nama dosen muncul, bukan cuma ID-nya
    public function getAll() {
        $sql = "SELECT courses.*, lecturers.name as lecturer_name 
                FROM courses 
                LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM courses WHERE id = $id")->fetch_assoc();
    }

    public function create($course_name, $credits, $lecturer_id) {
        $sql = "INSERT INTO courses (course_name, credits, lecturer_id) VALUES ('$course_name', '$credits', '$lecturer_id')";
        return $this->conn->query($sql);
    }

    public function update($id, $course_name, $credits, $lecturer_id) {
        $sql = "UPDATE courses SET course_name='$course_name', credits='$credits', lecturer_id='$lecturer_id' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM courses WHERE id=$id");
    }
}
?>
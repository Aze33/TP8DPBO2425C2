<?php
class Education {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getAll() {
        // Join ke lecturers biar muncul nama dosennya
        $sql = "SELECT educations.*, lecturers.name as lecturer_name 
                FROM educations 
                LEFT JOIN lecturers ON educations.lecturer_id = lecturers.id
                ORDER BY educations.grad_year DESC";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM educations WHERE id = $id")->fetch_assoc();
    }

    public function create($inst, $deg, $major, $year, $lec_id) {
        $stmt = $this->conn->prepare("INSERT INTO educations (institution, degree, major, grad_year, lecturer_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $inst, $deg, $major, $year, $lec_id);
        return $stmt->execute();
    }

    public function update($id, $inst, $deg, $major, $year, $lec_id) {
        $stmt = $this->conn->prepare("UPDATE educations SET institution=?, degree=?, major=?, grad_year=?, lecturer_id=? WHERE id=?");
        $stmt->bind_param("sssiii", $inst, $deg, $major, $year, $lec_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM educations WHERE id=$id");
    }
}
?>
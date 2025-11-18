<?php
class Lecturer {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getAll() {
        // KITA UBAH: Sekarang Join ke tabel 'educations', bukan 'schedules'
        $sql = "SELECT lecturers.*, 
                GROUP_CONCAT(
                    DISTINCT CONCAT('<b>', educations.degree, '</b> ', educations.institution, ' (', educations.grad_year, ')') 
                    SEPARATOR '<br>'
                ) as riwayat_pendidikan
                FROM lecturers
                LEFT JOIN educations ON lecturers.id = educations.lecturer_id
                GROUP BY lecturers.id
                ORDER BY lecturers.id DESC";
                
        return $this->conn->query($sql);
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM lecturers WHERE id = $id")->fetch_assoc();
    }

    public function create($name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("INSERT INTO lecturers (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $nidn, $phone, $join_date);
        return $stmt->execute();
    }

    public function update($id, $name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("UPDATE lecturers SET name=?, nidn=?, phone=?, join_date=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $nidn, $phone, $join_date, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM lecturers WHERE id=$id");
    }
}
?>
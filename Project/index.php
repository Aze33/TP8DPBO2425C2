<?php
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// --- Modul Lecturer ---
if ($mod == 'lecturer') {
    include_once 'controllers/LecturerController.php';
    $controller = new LecturerController();
    switch ($action) {
        case 'index': $controller->index(); break;
        case 'create': $controller->create(); break;
        case 'edit': $controller->edit($id); break;
        case 'delete': $controller->delete($id); break;
        default: $controller->index();
    }

// --- Modul Course ---
} elseif ($mod == 'course') {
    include_once 'controllers/CourseController.php';
    $controller = new CourseController();
    switch ($action) {
        case 'index': $controller->index(); break;
        case 'create': $controller->create(); break;
        case 'edit': $controller->edit($id); break;
        case 'delete': $controller->delete($id); break;
        default: $controller->index();
    }

// --- Modul Education (Baru) ---
} elseif ($mod == 'education') {
    include_once 'controllers/EducationController.php';
    $controller = new EducationController();
    switch ($action) {
        case 'index': $controller->index(); break;
        case 'create': $controller->create(); break;
        case 'edit': $controller->edit($id); break;
        case 'delete': $controller->delete($id); break;
        default: $controller->index();
    }
}
?>
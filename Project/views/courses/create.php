<!doctype html>
<html lang="en">
<head>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Course</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  <div class="container col-md-6">
    <div class="card">
        <div class="card-header bg-primary text-white">Add Course</div>
        <div class="card-body">
            <form method="post" action="index.php?mod=course&action=create">
                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>SKS</label>
                    <input type="number" name="credits" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Lecturer</label>
                    <select name="lecturer_id" class="form-select">
                        <option value="">-- Select Lecturer --</option>
                        <?php while ($lec = $lecturers->fetch_assoc()) { ?>
                            <option value="<?= $lec['id'] ?>"><?= $lec['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="index.php?mod=course" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
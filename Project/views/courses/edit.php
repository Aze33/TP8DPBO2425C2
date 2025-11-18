<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit Mata Kuliah</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container col-md-6 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Course</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?mod=course&action=edit">
                
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" name="course_name" value="<?= $row['course_name'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah SKS</label>
                    <input type="number" name="credits" value="<?= $row['credits'] ?>" class="form-control" required min="1" max="6">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="lecturer_id" class="form-select">
                        <option value="">-- Pilih Dosen --</option>
                        <?php 
                        // Loop data dosen untuk dropdown
                        if ($lecturers->num_rows > 0) {
                            while ($lec = $lecturers->fetch_assoc()) { 
                                // Logika untuk auto-select dosen yang lama
                                $selected = ($lec['id'] == $row['lecturer_id']) ? 'selected' : '';
                        ?>
                            <option value="<?= $lec['id'] ?>" <?= $selected ?>>
                                <?= $lec['name'] ?> (<?= $lec['nidn'] ?>)
                            </option>
                        <?php 
                            } 
                        }
                        ?>
                    </select>
                    <div class="form-text">Kosongkan atau pilih "Pilih Dosen" jika belum ada pengampu.</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php?mod=course" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success px-4">Update</button>
                </div>

            </form>
        </div>
    </div>
  </div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
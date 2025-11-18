<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit Pendidikan</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container col-md-8 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Education</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?mod=education&action=edit">
                
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Dosen</label>
                    <select name="lecturer_id" class="form-select" required>
                        <option value="">-- Pilih Dosen --</option>
                        <?php while ($lec = $lecturers->fetch_assoc()) { 
                             $selected = ($lec['id'] == $row['lecturer_id']) ? 'selected' : '';
                        ?>
                            <option value="<?= $lec['id'] ?>" <?= $selected ?>>
                                <?= $lec['name'] ?> (<?= $lec['nidn'] ?>)
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenjang</label>
                        <select name="degree" class="form-select" required>
                            <option value="S1" <?= ($row['degree'] == 'S1') ? 'selected' : '' ?>>S1</option>
                            <option value="S2" <?= ($row['degree'] == 'S2') ? 'selected' : '' ?>>S2</option>
                            <option value="S3" <?= ($row['degree'] == 'S3') ? 'selected' : '' ?>>S3</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Nama Kampus</label>
                        <input type="text" name="institution" value="<?= $row['institution'] ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Jurusan / Prodi</label>
                        <input type="text" name="major" value="<?= $row['major'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="number" name="grad_year" value="<?= $row['grad_year'] ?>" class="form-control" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="index.php?mod=education" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Tambah Pendidikan</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container col-md-8 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Education</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?mod=education&action=create">
                
                <div class="mb-3">
                    <label class="form-label">Nama Dosen</label>
                    <select name="lecturer_id" class="form-select" required>
                        <option value="">-- Pilih Dosen --</option>
                        <?php while ($lec = $lecturers->fetch_assoc()) { ?>
                            <option value="<?= $lec['id'] ?>"><?= $lec['name'] ?> (<?= $lec['nidn'] ?>)</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenjang</label>
                        <select name="degree" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Nama Kampus</label>
                        <input type="text" name="institution" class="form-control" placeholder="Contoh: Institut Teknologi Bandung" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Jurusan / Prodi</label>
                        <input type="text" name="major" class="form-control" placeholder="Contoh: Teknik Informatika" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="number" name="grad_year" class="form-control" placeholder="YYYY" min="1900" max="2099" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="index.php?mod=education" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
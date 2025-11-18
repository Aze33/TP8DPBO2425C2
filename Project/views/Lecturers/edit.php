<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit Dosen</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
          <h4 class="mb-0 text-center">Update Lecturer</h4>
        </div>
        <div class="card-body">
            <form method="post" action="index.php?mod=lecturer&action=edit">
                
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">NAME:</label>
                    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIDN:</label>
                    <input type="text" name="nidn" value="<?= $row['nidn'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">PHONE:</label>
                    <input type="text" name="phone" value="<?= $row['phone'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">JOIN DATE:</label>
                    <input type="date" name="join_date" value="<?= $row['join_date'] ?>" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?mod=lecturer" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
  </div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Data Mata Kuliah</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container mt-4">
    <h3>Data Mata Kuliah</h3>
    <a class="btn btn-primary mb-3" href="index.php?mod=course&action=create">Add New</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-dark">
            <tr>
                <th style="width: 5%;">No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Dosen Pengampu</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1; // Inisialisasi nomor
            if ($courses->num_rows > 0) {
                while ($row = $courses->fetch_assoc()) { 
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                
                <td><strong><?= $row['course_name'] ?></strong></td>
                <td class="text-center"><?= $row['credits'] ?></td>
                <td><?= $row['lecturer_name'] ?? '<span class="text-muted">Belum ditentukan</span>' ?></td>
                
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="index.php?mod=course&action=edit&id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="index.php?mod=course&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Delete</a>
                </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='5' class='text-center'>Belum ada data mata kuliah.</td></tr>";
            }
            ?>
          </tbody>
        </table>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
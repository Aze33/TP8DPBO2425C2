<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Riwayat Pendidikan</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>

  <div class="container mt-4">
    <h3>Data Riwayat Pendidikan</h3>
    <a class="btn btn-primary mb-3" href="index.php?mod=education&action=create">Add New</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
          <thead class="table-dark">
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Dosen</th>
                <th>Jenjang</th>
                <th>Nama Kampus</th>
                <th>Jurusan</th>
                <th>Lulus</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1; // Inisialisasi nomor
            if ($educations->num_rows > 0) {
                while ($row = $educations->fetch_assoc()) { 
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                
                <td><strong><?= $row['lecturer_name'] ?? 'Tanpa Nama' ?></strong></td>
                
                <td class="text-center">
                    <span class="badge bg-info text-dark"><?= $row['degree'] ?></span>
                </td>
                <td><?= $row['institution'] ?></td>
                <td><?= $row['major'] ?></td>
                <td class="text-center"><?= $row['grad_year'] ?></td>
                
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="index.php?mod=education&action=edit&id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="index.php?mod=education&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='7' class='text-center text-muted'>Belum ada data riwayat pendidikan.</td></tr>";
            }
            ?>
          </tbody>
        </table>
    </div>
  </div>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
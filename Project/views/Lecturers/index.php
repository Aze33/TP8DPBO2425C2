<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <title>Data Dosen</title>
</head>
<body>
  <?php include 'views/includes/navbar.php'; ?>
  
  <div class="container mt-4">
    <h3>Data Dosen</h3>
    <a class="btn btn-primary mb-3" href="index.php?mod=lecturer&action=create">Add New</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-dark">
            <tr>
                <th style="width: 5%;">No</th>
                <th>Name</th>
                <th>NIDN</th>
                <th>Phone</th>
                <th style="width: 35%;">Riwayat Pendidikan</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1; // Inisialisasi nomor
            if ($lecturers->num_rows > 0) {
                while ($row = $lecturers->fetch_assoc()) { 
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                
                <td>
                    <strong><?= $row['name'] ?></strong><br>
                    <small class="text-muted">Gabung: <?= $row['join_date'] ?></small>
                </td>
                <td><?= $row['nidn'] ?></td>
                <td><?= $row['phone'] ?></td>
                
                <td>
                    <?php 
                    if (isset($row['riwayat_pendidikan']) && $row['riwayat_pendidikan']) {
                        echo $row['riwayat_pendidikan']; 
                    } else {
                        echo '<span class="badge bg-secondary">Belum ada data</span>';
                    }
                    ?>
                </td>

                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="index.php?mod=lecturer&action=edit&id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="index.php?mod=lecturer&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Delete</a>
                </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='6' class='text-center'>Data masih kosong.</td></tr>";
            }
            ?>
          </tbody>
        </table>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
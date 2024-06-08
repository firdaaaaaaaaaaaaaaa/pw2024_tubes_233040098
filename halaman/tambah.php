<?php
session_start();

// Cek peran pengguna
if(!isset($_SESSION['role']) || $_SESSION['role']!== 'admin') {
    // pengguna bukan admin
    echo "Anda tidak memiliki akses";
    exit;
}

require '../function/functions.php';

// Cek apakah tombol submit sudah ditekan
if( isset($_POST["tambah"])) {
    // Cek apakah data berhasil ditambahkan
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index2.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index2.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Menu</title>
  <!-- link bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- link icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark" data-bs-theme="dark">
  <div class="container mt-5 pt-3">
    <div class="grid">
      <a href="index2.php" onclick="return confirm('ingin kembali?')"></a>
    </div>
    <h1 class="text-white" style="text-align: center;">Tambah Menu</h1>
    <form action="" method="post" enctype="multipart/form-data" class="bg-dark text-white">
      <div class="mb-3">
        <label for="menu_name" class="form-label text-white">Nama Menu</label>
        <input type="text" data-role="input" class="form-control bg-dark text-white" id="menu_name" name="menu_name" required>
      </div>
      <div class="mb-3">
        <label for="deskripsi_menu" class="form-label text-white">Deskripsi</label>
        <textarea class="form-control bg-dark text-white" data-role="input" id="deskripsi_menu" name="deskripsi_menu" required></textarea>
      </div>
      <div class="mb-3">
        <label for="id_kategori" class="form-label text-white">Kategori</label>
        <select class="form-control bg-dark text-white" data-role="input" id="id_kategori" name="id_kategori" required>
          <!-- Ambil data kategori dari database -->
          <?php
          $kategori = query("SELECT * FROM kategori_menu");
          foreach($kategori as $row) {
              echo "<option value='". $row['id_kategori']. "'>". $row['nama_kategori']. "</option>";
          }
         ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label text-white">Harga</label>
        <input type="number" data-role="input" class="form-control bg-dark text-white" id="harga" name="harga" required>
      </div>
      <div class="mb-3">
        <label for="rating_menu" class="form-label text-white">Rating</label>
        <input type="number" data-role="input" class="form-control bg-dark text-white" id="rating_menu" name="rating_menu" step="0.1" required>
      </div>
      <div class="mb-3">
        <label for="picture" class="form-label text-white">Gambar</label>
        <input type="file" data-role="input" class="form-control bg-dark text-white" id="picture" name="picture" onchange="previewImage()" required>
      </div>
      <button type="submit" name="tambah" class="btn btn-outline-secondary text-white">Tambah Menu</button>
      <a href="index2.php" onclick="return confirm('Ingin kembali?')" class="btn btn-outline-secondary" style="color: white;">Kembali</a>

    </form>
  </div>

  <!-- js bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-M
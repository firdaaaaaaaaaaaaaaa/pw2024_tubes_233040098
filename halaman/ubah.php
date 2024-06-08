<?php
session_start();

require '../function/functions.php';

// ambil data di url
$id = $_GET["id_menu"];

// query data berdasarkan id
$mn = query("SELECT * FROM menu WHERE id_menu = $id");

if (count($mn) == 0) {
    echo "<script>
            alert('Data tidak ditemukan!');
            document.location.href = 'index2.php';
          </script>";
    exit;
}

// cek apakah tombol submit sudah ditekan
if( isset($_POST["submit"])) {
    // cek data apakah berhasil diubah atau tidak
    if( ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index2.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'index2.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #1a2226;
            color: white;
        }
        .form-container {
            background-color: #1a2226;
            padding: 20px;
            border-radius: 5px;
            color: white;
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
        .form-control, .form-select {
            background-color: #444;
            border: none;
            color: #fff;
        }
        .form-control:focus, .form-select:focus {
            background-color: #555;
            color: #fff;
        }
        /* .btn-outline-secondary {
            color: black;
            border-color: #1a2226;
        }
        .btn-outline-secondary:hover {
            background-color: #777;
            color: #fff;
        } */
        img {
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container form-container">
        <h1 class="text-center">Ubah Menu</h1>
            
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mn["id_menu"]; ?>">
            <input type="hidden" name="pictureLama" value="<?= $mn["picture"]; ?>">
            <div class="field mb-3">
                <label for="menu_name" class="form-label">Nama Menu:</label>
                <input type="text" class="form-control" name="menu_name" id="menu_name" required value="<?= $mn["menu_name"]; ?>">
            </div>
            <div class="field mb-3">
                <label for="nama_kategori" class="form-label">Kategori:</label>
                <select class="form-control" name="id_kategori" id="id_kategori" required>
                    <?php
                    $kategori = query("SELECT * FROM kategori_menu");
                    foreach($kategori as $row) {
                        $selected = ($row['id_kategori'] == $mn['id_kategori']) ? 'selected' : '';
                        echo "<option value='". $row['id_kategori']. "' $selected>". $row['nama_kategori']. "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="field mb-3">
    <label for="deskripsi_menu" class="form-label">Deskripsi:</label>
    <textarea class="form-control" name="deskripsi_menu" id="deskripsi_menu" required><?= $mn["deskripsi_menu"]; ?></textarea>
</div>

            <div class="field mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" class="form-control" name="harga" id="harga" required value="<?= $mn["harga"]; ?>">
            </div>
            <div class="field mb-3">
                <label for="rating_menu" class="form-label">Rating:</label>
                <input type="text" class="form-control" name="rating_menu" id="rating_menu" required value="<?= $mn["rating_menu"]; ?>">
            </div>
            <div class="field mb-3">
                <label for="picture" class="form-label">Gambar:</label>
                <img src="img/<?= $mn['picture']; ?>" width="100">
                <input type="file" class="form-control" name="picture" id="picture" onchange="previewImage()">
            </div>
            <div>
            <button type="submit" name="submit" class="btn btn-outline-secondary" style="color: white;">Ubah Menu</button>
            <a href="index2.php" onclick="return confirm('Ingin kembali?')" class="btn btn-outline-secondary" style="color: white;">Kembali</a>
        
            </div>
        </form>
    </div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>

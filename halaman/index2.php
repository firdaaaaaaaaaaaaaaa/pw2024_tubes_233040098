<?php

session_start();

// if( !isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

// cek peran pengguna
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // pengguna bukan admin
    echo "Anda tidak memiliki akses";
    exit;
}

require '../function/functions.php';

// paginition
// konfigurasi
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM menu"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif)  - $jumlahDataPerHalaman;

if (isset($_POST["submit"])) {
    $keyword = $_POST["keyword"];
    $menu = cari($keyword);
} else {
    $menu = query("SELECT menu.*, kategori_menu.nama_kategori
                   FROM menu
                   JOIN kategori_menu ON menu.id_kategori = kategori_menu.id_kategori
                   LIMIT $awalData, $jumlahDataPerHalaman");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- link boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* .loader {
            width: 100px;
            position: absolute;
            top: 110px;
            left: 210px;
            z-index: -1;
            display: none;
        } */

        /* @media print {
            .logout, .tambah, .form-cari, .aksi {
                display: none;
            }
        } */
        table {
            /* border-collapse: collapse; */
            border: 1px solid white;
        }

        td {
            padding: 15px;
            height: 20px;
        }
    </style>

</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid" style="color: darkgray;">
            <!-- <a class="navbar-brand m-1" href="#" ><i class="bi bi-emoji-smile" style="color: darkgray;"></i></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item m-0">
                        <a class="nav-link active" aria-current="page" href="#" style="color: darkgray;">Daftar Menu</a>
                    </li> -->

                </ul>
                <div class="container d-flex" style="margin-left: -3px;">
                    <form class="d-flex col md-2 me-2" role="search" method="post" class="form-cari">
                        <input class="form-control me-2 bg-dark text-white" type="text" autofocus placeholder="Telusuri..." aria-label="Search" name="keyword" autocomplete="off" id="keyword">
                        <button class="btn btn-outline-secondary" type="submit" id="tombol-cari"><i class="bi bi-search"></i></button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary"><a href="dasboard.php"><i class="bi bi-box-arrow-in-right" style="color: darkgray;"></i></a></button>

                </div>
            </div>
        </div>
    </nav>
    <!-- navend -->

    <!-- navigasi -->
    <section class="bg-dark">
        <div class="container">
            <nav aria-label="Page navigation example">
                <h1 class="text-white pt-4">Daftar Menu</h1>
                <hr style="color: white;">
                <!-- <li class="button-item m-0 md-2 me-2">
                    <a href="tambah.php"><button type="button" class="btn btn-outline-secondary tambah"><i class="bi bi-plus"></i> Tambah Menu</button></a>
                </li> -->
                <!-- <button ><i class="bi bi-plus"></i><a href="tambah.php"> Tambah Menu</a></button> -->
                <a href="tambah.php"><button type="button" class="btn btn-danger"><i class="bi bi-plus"></i> Tambah Menu</button></a>
                <ul class="pagination pt-3">
                    <li class="page-item">
                        <?php if ($halamanAktif > 1) : ?>
                            <a href="?halaman=<?= $halamanAktif - 1 ?> " class="page-link"><span aria-hidden="true">&laquo;</span></a>
                        <?php endif ?>
                    </li>
                    <li class="page-item d-flex"><?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <a href="?halaman=<?= $i; ?>" class="page-link" style="baground-color: blue; color: black;"><?= $i; ?></a>
                            <?php else : ?>
                                <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </li>

                    <li class="page-item">
                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <a href="?halaman=<?= $halamanAktif + 1 ?>" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                        <?php endif ?>
                    </li>
                </ul>
            </nav>
            <div id="container bg-dark">
                <table cellpadding="20" cellspacing="0">
                    <tr class="table table-dark table-hover">
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col" style="width: 150px;">Nama menu</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" style="width: 150px;">Kategori</th>
                        <th scope="col" style="width: 150px;">Harga</th>
                        <th scope="col" style="width: 100px;">Rating</th>
                        <th scope="col" class="aksi" style="width: 200px;">Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $row) : ?>
                        <tr class="table table-dark table-hover">
                            <td scope="col"><?= $i ?></td>
                            <td scope="col"><img src="img/<?= $row["picture"]; ?>" width="100" alt=""></td>
                            <td scope="col"><?= $row["menu_name"]; ?></td>
                            <td scope="col"><?= $row["deskripsi_menu"]; ?></td>
                            <td scope="col"><?= $row["nama_kategori"]; ?></td>
                            <td scope="col"><i class="bi bi-currency-dollar"> <?= $row["harga"]; ?></i></td>
                            <td scope="col"><?= $row["rating_menu"]; ?></td>
                            <td class="aksi">
                                <button type="button" class="btn text-bg-info" onclick="location.href='ubah.php?id_menu=<?= $row['id_menu']; ?>'">Update</button>
                                <button type="button" class="btn btn-danger" onclick="if(confirm('Delete data?')) location.href='hapus.php?id_menu=<?= $row['id_menu']; ?>'">Delete</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('footer.php') ?>
    <!-- footerend -->


    <script>
        document.getElementById('keyword').addEventListener('input', function() {
            var keyword = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../ajax/search.php?keyword=' + keyword, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.querySelector('table').innerHTML = xhr.responseText;
                } else {
                    console.error('Error: ' + xhr.status);
                }
            };
            xhr.send();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</body>

</html>
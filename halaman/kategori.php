<?php
require '../function/functions.php';
$conn = koneksi();

if(isset($_GET['category'])){
    $category = $_GET['category'];

    switch($category) {
        case 'food' :
            $query = "SELECT * FROM menu WHERE id_kategori = (SELECT id_kategori FROM kategori_menu WHERE nama_kategori = 'Makanan')";
            break;
        case 'drink' :
            $query = "SELECT * FROM menu WHERE id_kategori = (SELECT id_kategori FROM kategori_menu WHERE nama_kategori = 'Minuman')";
            break;
        case 'dessert' :
            $query = "SELECT * FROM menu WHERE id_kategori = (SELECT id_kategori FROM kategori_menu WHERE nama_kategori = 'Makanan Penutup')";
            break;
    }
    $result = mysqli_query($conn, $query);

    // Check if there are any menu items
    if (mysqli_num_rows($result) > 0) {
        $menuItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $menuItems = []; // Empty array if no menu items found
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!-- nav -->
<?php include('../halaman/navbar.php') ?>

<!-- slide -->
<?php include('../halaman/slide.php') ?>

<!-- card -->
<section class="bg-dark">
    <div class="container text-center pt-5">
        <div class="row">
            <?php foreach ($menuItems as $menuItem): ?>
                <div class="col pt-3 pb-4">
                    <div class="card" style="width: 16rem;" data-bs-theme="">
                        <img src="img/<?= $menuItem["picture"]; ?>" class="card-img-top" alt="..">
                        <div class="card-body" style="background-color: darkgray;">
                            <h5 class="card-title"><?= $menuItem["menu_name"] ?></h5>
                            <p class="card-text"><a href="detailmenu.php?id=<?= $menuItem['id_menu'] ?>" class="btn btn-outline-secondary">Detail menu</a></p>
                            <div class="row">
                                <div class="col"><i class="bi bi-currency-dollar"></i><?= $menuItem["harga"] ?></div>
                                <div class="col"><?= $menuItem["rating_menu"] ?> <i class="bi bi-star-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- cardend -->

<!-- footer -->
<?php include('footer.php') ?>
<!-- footerend -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
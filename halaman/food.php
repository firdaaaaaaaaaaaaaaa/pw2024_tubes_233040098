<?php
require_once '../function/functions.php';
$conn = koneksi();

// Fetch dessert menu items from the database
$query = "SELECT * FROM menu WHERE id_kategori = 1"; 
$result = mysqli_query($conn, $query);

// Check if there are any dessert items
if (mysqli_num_rows($result) > 0) {
    $desserts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $desserts = []; 
}
?>

<!-- Display dessert menu items -->
<div class="row">
    <?php foreach ($desserts as $dessert): ?>
        <div class="col pt-3 pb-4">
            <div class="card" style="width: 16rem;" data-bs-theme="">
                <img src="../img/<?= $dessert["picture"]; ?>" class="card-img-top" alt="..">  
                <div class="card-body" style="background-color: darkgray;">
                    <h5 class="card-title"><?= $dessert["menu_name"] ?></h5>
                    <!-- Link to detail menu page -->
                    <p class="card-text"><a href="detailmenu.php?id=<?= $dessert['id_menu'] ?>" class="btn btn-outline-secondary">Detail menu</a></p>
                    <div class="row">
                        <div class="col"><i class="bi bi-currency-dollar"></i><?= $dessert["harga"] ?></div>
                        <div class="col"><?= $dessert["rating_menu"] ?> <i class="bi bi-star-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
session_start();

//menghubungkan dengan file php lainnya
require '../function/functions.php';

// mengambil id dari url
$id = $_GET['id'];


//melakukan query
$detail = query("SELECT * FROM menu WHERE id_menu = $id");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $detail = query(
    "SELECT * FROM menu
    WHERE id_menu='$id'"
  );
}

// $details = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '".$_GET['id']."' ");
//     $detail = mysqli_fetch_object($details);



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .text {
      font-weight: 500;
      padding: 50px;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100px;
      padding-inline: 50px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <?php include('navbar.php') ?>
  <!-- end navbar -->

  <!-- slide -->
  <?php include('slide.php') ?>
  <!-- end slide -->

  <!-- card -->
  <section class="bg-dark py-5 p-5">
    <div class="card flext-row" style="background-color: darkgray;">
      <div class="text">
        <h1 style="display: flex; justify-content: center;"><?= $detail["menu_name"]; ?> </h1>
        <div class="row row-cols-1">
          <div class="col-md-3 ">
            <img src="./img/<?= $detail["picture"]; ?>" class="img-fluid rounded-start" style="max-width: 300px;" alt="...">
          </div>
          <div class="col-md-8 ">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text"><?= $detail["deskripsi_menu"]; ?></p>
              <div class="row">
                <div class="row"><i class="bi bi-currency-dollar"> <?= $detail["harga"]; ?></i></div>
              </div>
              <div class="row">
                <div class="row"><i class="bi bi-star-fill"> <?= $detail["rating_menu"]; ?></i></div>
              </div>
              <div class="button d-flex p-4" style="justify-content: center;">
                <p class="card-text"><a href="#"><button type="submit" class="btn btn-outline-secondary">Order</button></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end card -->

  <!-- footer -->
  <?php include('footer.php') ?>
  <!-- footerend -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
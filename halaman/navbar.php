<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nav</title>
  <!-- link boostrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- link icon boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* body {
      overflow-x: hidden;
    }
    .dd {
      margin-top: -20px;
    } <i class="bi bi-emoji-smile" style="color: darkgray;"></i> */
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid" style="color: darkgray;">
      <a class="navbar-brand m-1" href="dasboard.php"><img src="../img/smile_food__2___1_-removebg-preview.png" width="50" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 20px;">
          <li class="nav-item m-0">
            <a class="nav-link active fw-bold" aria-current="page" href="menu.php" style="color: darkgray;"> MENU</a>
          </li>
          <li class="nav-item dropdown m-0">
            <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: darkgray;">
              KATEGORI
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #1a2226;">
              <li><a class="dropdown-item" href="kategori.php?category=food" style="color: white;"><i class="bi bi-egg-fried"></i> Food</a></li>
              <li><a class="dropdown-item" href="kategori.php?category=drink" style="color: white;"><i class="bi bi-cup-straw"></i> Drink</a></li>
              <li><a class="dropdown-item" href="kategori.php?category=dessert" style="color: white;"><i class="bi bi-cookie"></i> Dessert</a></li>
            </ul>
          </li>
        </ul>

        <button type="button" class="btn btn-outline-secondary"><a href="logout.php"><i class="bi bi-person-fill" style="color: darkgray;"></i></a></button>
      </div>
    </div>
  </nav>



  <!-- js boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- js boostrap icon -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
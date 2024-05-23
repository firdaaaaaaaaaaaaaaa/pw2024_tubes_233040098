

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <!-- Navbar --> 
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-shop-window"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart4"></i> Menu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-egg-fried"></i> Food</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-cup-straw"></i> Drink</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-cookie"></i> Dessert</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
          </ul>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
      </form>
      <button><a href="login.php"><i class="bi bi-person-fill"></i></a></button>
    </div>
  </div>
</nav>
<!-- end navbar -->

<!-- slide -->
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://dummyimage.com/700x200/000/fff" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://dummyimage.com/700x200/000/fff" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://dummyimage.com/700x200/000/fff" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- end slide -->

<!-- card -->
<div class="container text-center pt-5 ">
    <div class="row">
            <div class="col pt-3 pb-4">
                <div class="card" style="width: 16rem;" data-bs-theme="">
                    <img src="https://dummyimage.com/500x450/000/fff" class="card-img-top" alt="..">
                    <div class="card-body">
                        <h5 class="card-title"> nama produk</h5>
                        <p class="card-text">ini deskripsi
                        </p>
                        <div class="row">
                            <div class="col">harga</div>
                            <div class="col">rating</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col pt-3 pb-4">
                <div class="card" style="width: 16rem;" data-bs-theme="">
                    <img src="https://dummyimage.com/500x450/000/fff" class="card-img-top" alt="..">
                    <div class="card-body">
                        <h5 class="card-title"> nama produk</h5>
                        <p class="card-text">ini deskripsi
                        </p>
                        <div class="row">
                            <div class="col">harga</div>
                            <div class="col">rating</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col pt-3 pb-4">
                <div class="card" style="width: 16rem;" data-bs-theme="">
                    <img src="https://dummyimage.com/500x450/000/fff" class="card-img-top" alt="..">
                    <div class="card-body">
                        <h5 class="card-title"> nama produk</h5>
                        <p class="card-text">ini deskripsi
                        </p>
                        <div class="row">
                            <div class="col">harga</div>
                            <div class="col">rating</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col pt-3 pb-4">
                <div class="card" style="width: 16rem;" data-bs-theme="">
                    <img src="https://dummyimage.com/500x450/000/fff" class="card-img-top" alt="..">
                    <div class="card-body">
                        <h5 class="card-title"> nama produk</h5>
                        <p class="card-text">ini deskripsi
                        </p>
                        <div class="row">
                            <div class="col">harga</div>
                            <div class="col">rating</div>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
</div>
<!-- end card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
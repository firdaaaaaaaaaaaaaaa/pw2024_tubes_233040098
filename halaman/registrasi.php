<?php

require '../function/functions.php';

if( isset($_POST["register"])) {

    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                window.location = 'login.php';
            </script>;";
            exit();
    } else {
        echo mysqli_error(koneksi());
    } 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            height: 100%;
            background-color: #1a2226 !important;
        }
        .row {
           padding-left: 150px;
        }
    </style>
  </head>
  <body>
    <div class="container text-center">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-9">

                    <div class="row bg-drak">
                        <div class="col-lg-7">
                            <div class="p-5 ps-4 text-drak">
                                <h5 class="mb-1 fw-bold text-white ">Register!</h5>
                                <p class="mb-4 text-white">Please fill all fields below</p>
                        <form class="mb-3" action="" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control px-5" type="text" name="username" id="username" placeholder="username" autocomplete="off" required autofocus>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control px-5" type="password" name="password" id="password" placeholder="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control px-5" type="password" name="password2" id="password2" placeholder="Konfirmasi password" required>
                            <label for="password2">Konfirmasi Password</label>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" name="register" class="btn btn-danger btn-lg border-0">Registrasi</button>
                        </div>
                        </form>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>



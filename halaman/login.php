<?php





session_start();
require '../function/functions.php';

$conn = koneksi(); //tadi si variable $conn nya gaada, jadi harus di inisialisasi dulu
                    // berhubung si $conn nilainya ngambil dari function koneksi, makanya di jadiin conn = koneksi();
// cek cookie
if( isset($_COOKIE['id_User']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_User'];
    $key = $_COOKIE['key'];


    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT id_user, username, role FROM user WHERE id_User = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('xxh3', $row['username'])) {
        $_SESSION['submit'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id_User'] = $row['id'];
    }
}

if( isset($_SESSION["submit"])) {
    header("Location: index2.php");
    exit;
}


if( isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])) {
        // set session
        $_SESSION["submit"] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['id_User'] = $row['id'];

        // cek remember me
        if( isset($_POST['remember'])) {
            // buat cookie
            setcookie('id', $row['id'], time() +60);
            setcookie('key', hash('xxh3', $row['username']), time() + 60);
        }

        // redirect kehalaman sesuai peran
        if( $row['role'] === 'admin') {
            header("Location:index2.php");
            exit; 
        } if($row['role'] === 'user') {
            header("Location:menu.php");
            exit; 
        } else {
            echo "Anda tidak memiliki akses";
        }
       } else {
        $error = true;
       }
    } else {
    $error = true;
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100%;
            background-color: #1a2226 !important;
        }
        .global-container {
            height: 100%;
            padding-top: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-form {
            width: 30%;
            height: 25%;
            padding: 25px;
             /* background-color: #1a2226 !important; */
            border-radius: 10px !important ; 
        }
        .card-title {
            font-weight: 700;
            padding-top: 10px;
        }

    </style>
  </head>
  <body>

        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h1 class="card-title text-center">LOGIN</h1>
                </div>
                    <?php if( isset($error)) : ?>
                    <P style="color: darkred; font-style: italic;">Username atau Password salah</P>
                    <?php endif ?>
                    <form action="" method="post">
                    <div class="mb-3">
                    <label for="username">Username </label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" required autofocus>
                    </div>
                    <div class="fmb-3">
                    <label for="password">Password </label>
                    <input type="password" name="password" id="password" class="form-control"  placeholder="password" required>
                    </div>
                    <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="true" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                    </div>
                    <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-dark">Login</button> 
                    </div>
                    <div class="registarasi">
                        <p>Belum memiliki akun? <a href="registrasi.php" class="text-decoration-none"> Daftar</a></p>
                    </div>
                </form>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

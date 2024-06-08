<?php

// koneksi ke database
function koneksi () {
    return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040098");
}

function query($query) {
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows($result)===1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    $conn = koneksi();

    // ambil data
    $nama = htmlspecialchars($data["menu_name"]);
    $deskripsi = htmlspecialchars($data["deskripsi_menu"]);
    $kategori = htmlspecialchars($data["id_kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $rating = htmlspecialchars($data["rating_menu"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar || strpos($gambar, "Pilih gambar terlebih dahulu!") !== false || strpos($gambar, "Yang anda upload bukan gambar!") !== false || strpos($gambar, "Ukuran gambar terlalu besar") !== false || strpos($gambar, "Gagal mengupload gambar") !== false) {
        echo "<script>alert('$gambar');</script>";
        return false;
    }
   
    $query = "INSERT INTO menu (menu_name, deskripsi_menu, id_kategori, harga, rating_menu, picture) 
              VALUES ('$nama', '$deskripsi', '$kategori', '$harga', '$rating', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = trim($_FILES['picture']['name']);
    $ukuranFile = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        return "Pilih gambar terlebih dahulu!";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        return "Yang anda upload bukan gambar!";
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 5000000) {
        return "Ukuran gambar terlalu besar";
    }

   
    $namaFileBaru = str_replace(' ', '', uniqid() . '.' . $ekstensiGambar);

   
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    $conn = koneksi();

    $id = $data["id"];
    $gambarLama = htmlspecialchars($data["pictureLama"]);

    $nama = htmlspecialchars($data["menu_name"]);
    $deskripsi = $_POST["deskripsi_menu"];

    $kategori = htmlspecialchars($data["id_kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $rating = htmlspecialchars($data["rating_menu"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['picture']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE menu SET
                picture = '$gambar',
                menu_name = '$nama',
                deskripsi_menu = '$deskripsi',
                id_kategori = '$kategori',
                harga = '$harga',
                rating_menu = '$rating'
             WHERE id_menu = '$id'
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    
    $query = "SELECT * FROM menu WHERE
                menu_name LIKE '%$keyword%'";

    return query("$query");
}
function registrasi($data)
{
    $conn = koneksi();

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = isset($data["role"]) ? $data["role"] : ""; // Assign an empty string if the "role" key is not set

    // Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database dengan role
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);
}


?>


<?php
// Include the file that establishes the database connection
require '../function/functions.php';

$conn = koneksi();
// Check if the connection is established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $query = "SELECT menu.*, kategori_menu.nama_kategori 
              FROM menu 
              JOIN kategori_menu ON menu.id_kategori = kategori_menu.id_kategori
              WHERE menu.menu_name LIKE '%$keyword%' OR kategori_menu.nama_kategori LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='table table-dark table-hover'>";
            echo "<td scope='col'>" . htmlspecialchars($row['id_menu']) . "</td>";
            echo "<td scope='col'><img src='img/" . htmlspecialchars($row['picture']) . "' width='100' alt=''></td>";
            echo "<td scope='col'>" . htmlspecialchars($row['menu_name']) . "</td>";
            echo "<td scope='col'>" . htmlspecialchars($row['deskripsi_menu']) . "</td>";
            echo "<td scope='col'>" . htmlspecialchars($row['nama_kategori']) . "</td>";
            echo "<td scope='col'>" . htmlspecialchars($row['harga']) . "</td>";
            echo "<td scope='col'>" . htmlspecialchars($row['rating_menu']) . "</td>";
            echo "<td class='aksi'>
                    <button type='button' class='btn text-bg-info' onclick=\"location.href='ubah.php?id=" . htmlspecialchars($row['id_menu']) . "'\">Update</button>
                    <button type='button' class='btn btn-danger' onclick=\"if(confirm('Delete data?')) location.href='hapus.php?id=" . htmlspecialchars($row['id_menu']) . "'\">Delete</button>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center text-white'>Tidak ada item tersedia</td></tr>";
    }
}

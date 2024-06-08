<?php

session_start();


require '../function/functions.php';

$id = $_GET["id_menu"];

if( hapus($id) > 0 ) {
    echo "<script>
                alert('data berhasil dihapus!');
                document.location.href = 'index2.php';
            </script>";
} else {
    echo "<script>
                alert('data bgagal dihapus!');
                document.location.href = 'index2.php';
            </script>";
}

?>
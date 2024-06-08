<?php
require '../function/functions.php';

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $keywords = explode(" ", $keyword); // Pisahkan kata berdasarkan spasi

  // Buat klausa WHERE untuk setiap kata kunci
  $whereClauses = [];
  foreach ($keywords as $kw) {
    $whereClauses[] = "menu_name LIKE '%$kw%'";
  }
  $where = implode(" OR ", $whereClauses);

  // Query dengan klausa WHERE yang telah dibuat
  $query = "SELECT * FROM menu WHERE $where";

  $menus = query($query);

  if (count($menus) > 0) {
    foreach ($menus as $mn) {
      echo '
                <div class="col pt-3 pb-4">
                    <div class="card" style="width: 16rem;" data-bs-theme="">
                        <img src="img/' . htmlspecialchars($mn["picture"]) . '" class="card-img-top" alt="..">
                        <div class="card-body" style="background-color: darkgray;">
                            <h5 class="card-title">' . htmlspecialchars($mn["menu_name"]) . '</h5>
                            <p class="card-text"><a href="detailmenu.php?id=' . htmlspecialchars($mn['id_menu']) . '" class="btn btn-outline-secondary">Detail menu</a></p>
                            <div class="row">
                                <div class="col"><i class="bi bi-currency-dollar"></i>' . htmlspecialchars($mn["harga"]) . '</div>
                                <div class="col">' . htmlspecialchars($mn["rating_menu"]) . ' <i class="bi bi-star-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
  } else {
    echo '<div class="col">Tidak ada hasil</div>';
  }
}

    <?php


    require '../function/functions.php';


    $menu = query('SELECT * FROM menu');

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>resto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            body {
                overflow-x: hidden;
            }

            .grid {
                width: 300px;
                background-color: darkgray;
            }

            .grid h5 {
                text-align: center;
                margin-top: 10px;
            }

            .grid p {
                text-align: center;
                margin-top: 10px;
            }

            .grid .row {
                display: flex;
                justify-content: space-around;
            }
        </style>
    </head>

    <body>
        <!-- Navbar -->

        <?php require('navbar.php') ?>


        <!-- end navbar -->

        <!-- slide -->
        <?php include('slide.php') ?>

        <!-- end slide -->


        <!-- card -->
        <section class="bg-dark menu">
            <div class="container text-center pt-5">
                <form class="d-flex col md-2 me-2" role="search">
                    <input id="searchInput" class="form-control me-2 bg-dark text-white keyword" type="search" placeholder="Telusuri..." autocomplete="off">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </form>
                <div id="menuContainer" class="row">
                    <?php foreach ($menu as $mn) : ?>
                        <div class="col pt-3 pb-4">
                            <div class="card" style="width: 16rem;" data-bs-theme="">
                                <img src="img/<?= htmlspecialchars($mn["picture"]); ?>" class="card-img-top" alt="..">
                                <div class="card-body" style="background-color: darkgray;">
                                    <h5 class="card-title"><?= htmlspecialchars($mn["menu_name"]) ?></h5>
                                    <p class="card-text"><a href="detailmenu.php?id=<?= htmlspecialchars($mn['id_menu']) ?>" class="btn btn-outline-secondary">Detail menu</a></p>
                                    <div class="row">
                                        <div class="col"><i class="bi bi-currency-dollar"></i><?= htmlspecialchars($mn["harga"]) ?></div>
                                        <div class="col"><?= htmlspecialchars($mn["rating_menu"]) ?> <i class="bi bi-star-fill"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- end card -->

        <!-- footer -->
        <?php include('footer.php') ?>
        <!-- footerend -->

        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                var keyword = this.value;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../ajax/searchmenu.php?keyword=' + encodeURIComponent(keyword), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('menuContainer').innerHTML = xhr.responseText;
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                };
                xhr.send();
            });
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </body>

    </html>
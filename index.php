<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>D.A.T. Grocery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
        <nav>
            <div id="brandLogo">
                <h1> <a id="brandName" href ="index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></h1>
            </div>
            <ul>
                <li class="italic mt-2"> Your local online grocery </li>
                <?php
                    session_start();
                    if (isset($_SESSION['onlineuser'])):
                    ?>
                        <li> <a href ="login_files/logout.php">Logout</a></li>
                        <li> <?= $_SESSION['onlineuser']['first_name'] ." " . $_SESSION['onlineuser']['last_name'] ?></li>
                    <?php
                        else:
                        ?>
                         <li> <a href ="login_files/login_page.php">Login/Sign Up</a></li>
                        <?php
                            endif;
                ?>

                <li> <a href ="checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
        <h2 class="mt-3">Browse the aisles:</h2>
            <div class="product-container">
                <div class ="product-box">
                    <a href="aisle_1.php">
                        <img class="product-image" src="img/baked-goods.png" alt="bread-img" >
                    </a>
                    <div>
                        <h3><a href="aisle_1.html">Aisle One</a> </h3>
                    </div>
                </div>
                <div class ="product-box">
                    <a href="aisle_2.php">
                        <img class="product-image" src="img/fruits_vegetables.png" alt="bread-img" >
                    </a>
                    <div>
                        <h3><a href="aisle_2.php">Aisle Two</a> </h3>
                    </div>
                </div>

                <div class ="product-box">
                    <a href="aisle_3.php">
                    <img class="product-image" src="img/refrige.png" alt="bread-img">
                    </a>
                    <div>
                        <h3><a href="aisle_3.php">Aisle Three</a> </h3>
                    </div>
                </div>
            </div>
            <footer>
                <h4><i class="fa fa-leaf"></i></h4>
            </footer>
        </div>
    </body>
</html>

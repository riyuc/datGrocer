<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="style.css">
        <title> D.A.T. Grocer </title>
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
                    <h1> <a id="brandName" href="index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></h1>
                </div>
                <ul>
                    <li class="italic mt-2">Browse our aisles</li>
                    <li> <a href ="login_files/login_page.php">Login/Sign Up</a></li>
                    <li> <a href ="checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </nav>

            <p>
                <a href="index.php">
                    <input type="button" class="myBtn" value="Home">
                </a>
            </p>
            <h2>Aisle 1: Bread & Baked Goods</h2>

          <div class= "product-container">
          <?php
            include 'components/connection.php';
            session_start();

              $sql="Select * from `product` where category='Baked Goods'";
              $result=mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($result)){
                $pID=$row['pID'];
                $category=$row['category'];
                $pName=$row['pName'];
                $pPrice=$row['pPrice'];
                $pQuant=$row['pQuant'];
                $image=$row['image'];
                $pDesc=$row['pDesc'];
                echo '
                      <div class ="product-box">
                        <a href="details.php?productid='.$pID.'">
                            <img class="product-image" src="./back_end/'.$image.'" alt="product-img">
                        </a>
                        <p>
                            <a href="details.php?productid='.$pID.'">
                                <input type="button" class="myBtn" value="Product Info">
                        </p>
                      </div>';
              }
            ?>
            </div>
        </div>
        <footer>
            <h4><i class="fa fa-leaf"></i></h4>
        </footer>
    </body>
</html>


<!DOCTYPE html>
<html lang="en">
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
        <h1> <a id="brandName" href="index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></h1>
      </div>
      <ul>
        <li class="italic mt-2"> Your local online grocery </li>
        <?php
                    session_start();
                    if (isset($_SESSION['onlineuser'])):
                    ?>
        <li> <a href="login_files/logout.php">Logout</a></li>
        <li> <?= $_SESSION['onlineuser']['first_name'] ." " . $_SESSION['onlineuser']['last_name'] ?></li>
        <?php
                        else:
                        ?>
        <li> <a href="login_files/login_page.php">Login/Sign Up</a></li>
        <?php
                            endif;
                ?>

        <li> <a href="../checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
      </ul>
    </nav>
      <div class= "product-container">
        <?php
        include 'components/connection.php';
          $pID=$_GET['productid'];
          $sql="Select * from `product` where pID='$pID'";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_assoc($result)){
            $pID=$row['pID'];
            $category=$row['category'];
            $pName=$row['pName'];
            $pPrice=$row['pPrice'];
            $pQuant=$row['pQuant'];
            $image=$row['image'];
            $pDesc=$row['pDesc'];
            echo '  <div class="container">
                      <p>
                        <a href="aisle_1.php">
                          <input type="button" class="myBtn" value="Return">
                        </a>
                      </p>
                      <div class="product-page-topcontainer">
                        <div class="product-box">
                          <img class="product-page-image" src="./back_end/'.$image.'" alt="bread-img">
                        </div>
                        <hr>
                        <div>
                          <p class="primary-product-info">'.$pName.' </p>
                          <form action="" method="post">
                          <p>
                              <input type = "text" placeholder="0" name="add-quant" class="myBtn"/>
                              <input type = "submit" value = "Add Product" name="add-to-cart" class="myBtn"/>
                          </p>
                          </form>
                        </div>
                        <hr>
                        <div>
                          <p class="product-page-price">$'.$pPrice.' ($0.78 / 100g)</p><br>
                        </div>
                        <hr>

                ';
              }

              if(empty(isset($SESSION['cart']))){
                $_SESSION['cart']=array();
              }
              if(isset($_GET['pID'])){
                $pID= $_GET['pID'];
                $addQuant = $_GET['add-quant'];

                if($pQuant > 0 && filter_var($addQuant, FILTER_VALIDATE_INT)){
                    if(isset($_SESSION['cart'][$pID])){
                      $_SESSION['cart'][$pID] += $addQuant;
                    }else{
                      $_SESSION['cart'][$pID] = $addQuant;
                    }
                }else{
                  $out = "bad input";
                }
              }
              ?>
                <div class="tab">
                  <button class="tablinks" onclick="openDesc(event, 'Toast')">
                    More
                  </button>
                </div>

                <div id="Toast" class="tabcontent">
                  <p class="primary-product-info">Product Information</p>
                  <p><?php echo $pDesc; ?></p>
                </div>

                <script>
                  function openDesc(evt, product) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                      tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tabcontent.length; i++) {
                      tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(product).style.display = "block";
                    evt.currentTarget.className += " active";
                  }
                </script>
              </div>
            </div>
      </div>
    <footer>
      <h4><i class="fa fa-leaf"></i></h4>
    </footer>
  </div>
</body>

</html>

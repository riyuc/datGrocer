
<?php
  include('../components/connection.php');



  if(isSet($_POST['ok'])){
    $pID=$_POST['pID'];
    $category=$_POST['category'];
    $pName=$_POST['pName'];
    $pPrice=$_POST['pPrice'];
    $pQuant=$_POST['pQuant'];
    $image=$_POST['image'];
    $pDesc=$_POST['pDesc'];

    $fileName=$_FILES['image']['name'];
    $dst="./upload-img/".$fileName;
    $dst1="upload-img/".$fileName;
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);


    $sql="insert into `product`(pID,category,pName,pPrice,pQuant,image,pDesc) values('$pID','$category','$pName','$pPrice','$pQuant','$dst1','$pDesc')";
    $result=mysqli_query($con,$sql);
    if($result){
      header('location:product_list.php');
    } else{
      die(mysqli_error($con));
      }
  }
 ?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="../style.css">
        <title>D.A.T. Grocery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <nav>
                <div id="brandLogo">
                    <h1> <a id="brandName" href ="../index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></h1>
                </div>
                <ul>
                    <li class="italic mt-2"> Your local online grocery </li>
                    <li> <a href ="login_page.php">Login/Sign Up</a></li>
                    <li> <a href ="../checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
            <div class="login">
                <?php
                    if (isset($errorMessage)):
                    ?>
                        <p class="errorMessage"><?= $errorMessage ?></p>
                    <?php
                        endif;
                ?>
                <h2>Add Product </h2>
                <form action="" id="loginForum" method="post" enctype="multipart/form-data">
                    <!-- Username & password fields -->
                    <label> Product ID<br />
                        <input type="text" name = "pID" size = "25" placeholder="ex: 001" id="pID" required/> </label>
                    <br />
                    <label> Category<br />
                        <input type="text" name = "category" size = "25" placeholder="ex: Baked Goods" id="category" required/> </label>
                    <br />
                    <label> Product Name: <br/>
                        <input type="text" name = "pName" size = "25" id="pName" placeholder="ex: Bread" required/> </label>
                    <br />
                    <label> Product Price: <br/>
                        <input type="number" name = "pPrice" size = "25" id="pPrice" placeholder="ex: 4.99" step=0.01 required/> </label>
                    <br />
                    <label> Quantity per Product: <br/>
                        <input type="text" name = "pQuant" size = "25" id="pQuant" placeholder="ex: 1" required/> </label>
                    <br />
                    <label> Image: <br/>
                        <input type="file" name = "image" size = "25" id="image"  required/> </label>
                    <br />
                    <label> Description: <br/>
                        <input type="text" name = "pDesc" size = "25" id="pDesc" required/> </label>
                    <br />
                    <p>
                      <a>
                        <input type = "submit" value = "Add Product" name="ok" class="myBtn logBtn"/>
                      </a>
                    </p>
                </form>
            </div>
        </div>

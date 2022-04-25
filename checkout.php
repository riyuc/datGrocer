<!DOCTYPE html>
<html>
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

                    <li> <a href ="../checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </nav>

            <div class ="product-box">
                <a>
                    <img class="product-image" src="img/bread.png" alt="bread-img" >
                </a>
                <form>
                    <input type="text" id="breadQnty" value="1"/>
                    <input type="button" onclick="incrementValue('breadQnty', 'Bread'), calculateItemTotal()" value="Add" class="myBtn"/>
                    <input type="button" onclick="decreaseValue('breadQnty', 'Bread'), calculateItemTotal()" value="Remove" class="myBtn"/>
                </form>
            </div>

            <div class ="product-box">
                <a>
                    <img class="product-image" src="img/milk.png" alt="milk-img">
                </a>
                <form>
                    <input type="text" id="milkQnty" value="1"/>
                    <input type="button" onclick="incrementValue('milkQnty', 'Milk'), calculateItemTotal()" value="Add" class="myBtn"/>
                    <input type="button" onclick="decreaseValue('milkQnty', 'Milk'), calculateItemTotal()" value="Remove" class="myBtn"/>
                </form>
            </div>

            <div class ="product-box">
                <a>
                    <img class="product-image" src="img/flour.png" alt="flour-img" >
                </a>
                <form>
                    <input type="text" id="flourQnty" value="1"/>
                    <input type="button" onclick="incrementValue('flourQnty', 'Flour'), calculateItemTotal()" value="Add" class="myBtn"/>
                    <input type="button" onclick="decreaseValue('flourQnty', 'Flour'), calculateItemTotal()" value="Remove" class="myBtn"/>
                </form>
            </div>
            <div class="login">
                <h2>Order Summary</h2>
                <p id="Bread"></p>
                <p id="Milk"></p>
                <p id="Flour"></p>
                <p id="total"></p>
                <p id="GST"></p>
                <p id="QST"></p>
                <p id="ckTotal"></p>
            </div>
        </div>

        <script>
            calculateItemTotal();

            document.getElementById('Bread').innerHTML = ("Bread x " + (document.getElementById('breadQnty').value)
                    + " = $" + (document.getElementById('breadQnty').value * 4.29).toFixed(2));
            document.getElementById('Milk').innerHTML = ("Milk x " + document.getElementById('milkQnty').value
                    + " = $" + (document.getElementById('milkQnty').value * 4.10).toFixed(2));
            document.getElementById('Flour').innerHTML = ("Flour x " + document.getElementById('flourQnty').value
                    + " = $" + (document.getElementById('flourQnty').value * 7.49).toFixed(2));

            function incrementValue(product, productCk){
                var value = parseInt(document.getElementById(product).value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById(product).value = value;
                document.getElementById(productCk).innerHTML = ((productCk + " x " + value)
                        + " = $" + (document.getElementById(product).value * 4.10).toFixed(2));
            }

            function decreaseValue(product, productCk){
                var value = parseInt(document.getElementById(product).value, 10);
                value = isNaN(value) ? 0 : value;
                if(value === 0){

                }else{
                    value--;
                }
                document.getElementById(product).value = value;
                document.getElementById(productCk).innerHTML = (productCk + " x " + value
                        + " = $" + (document.getElementById(product).value * 4.10).toFixed(2));
            }

            function calculateItemTotal(){
                var breadQnty = parseInt(document.getElementById('breadQnty').value, 10);
                var milkQnty = parseInt(document.getElementById('milkQnty').value, 10);
                var flourQnty = parseInt(document.getElementById('flourQnty').value, 10);

                var total = (4.29 * breadQnty) + (4.10 * milkQnty) + (7.49 * flourQnty);
                document.getElementById('total').innerHTML = ("Items: $ " + total.toFixed(2));
                document.getElementById('GST').innerHTML = ("GST: $" + (total * 0.05).toFixed(2));
                document.getElementById('QST').innerHTML = ("QST: $" + (total * 0.1).toFixed(2));
                document.getElementById('ckTotal').innerHTML = ("Order Total: $" + (total + (total * 0.05) + (total * 0.1)).toFixed(2));
            }
        </script>
        <footer>
            <h4><i class="fa fa-leaf"></i></h4>
        </footer>
    </body>
</html>

<?php
    session_start();
    if (isset($_SESSION['onlineuser'])) {
        header("location:../index.php");
    }
    if (isset($_POST['logIn'])) {
        require_once("../components/connection.php");
        extract($_POST);
        $query = "SELECT * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($connection,$query);
        $countRow = mysqli_num_rows($result);
        if($countRow >= 1){
            $data = mysqli_fetch_assoc($result);
            $_SESSION['onlineuser'] = $data;
            header("location:../index.php");
        }else{
            $query = "SELECT * from users where email = '$username' and password = '$password'";
            $result = mysqli_query($connection,$query);
            $countRow = mysqli_num_rows($result);
            if($countRow >= 1){
                $data = mysqli_fetch_assoc($result);
                $_SESSION['onlineuser'] = $data;
                header("location:index.php");
            }else{
                $errorMessage = "Your email or password is wrong.";
            }
        }
    }
    if (isset($_SESSION['onlineadmin'])) {
        header("location:../admin");
    }
    if (isset($_POST['adminLogin'])) {
        require_once("../components/connection.php");
        extract($_POST);
        $query = "SELECT * from users where username = '$username' and password = '$password' and usertype = 0";
        $result = mysqli_query($connection,$query);
        $countRow = mysqli_num_rows($result);
        if($countRow >= 1){
            $data = mysqli_fetch_assoc($result);
            $_SESSION['onlineadmin'] = $data;
            header("location:../admin");
        }else{
            $query = "SELECT * from users where email = '$username' and password = '$password' and usertype = 0";
            $result = mysqli_query($connection,$query);
            $countRow = mysqli_num_rows($result);
            if($countRow >= 1){
                $data = mysqli_fetch_assoc($result);
                $_SESSION['onlineadmin'] = $data;
                header("location:../admin");
            }else{
                $errorMessage = "Your email or password is wrong.";
            }
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
                <h2>Log into your account: </h2>
                <form action = "" id="loginForum" method="post">
                    <!-- Username & password fields -->
                    <label> Username/Email: 
                        <input type="text" name = "username" size = "25" placeholder="ex: 123Andrew76" id="userName" required/> </label>
                    <br />
                    <label> Password: <br/>
                        <input type="password" name = "password" size = "25" id="userPass" required/> </label>
                    <br />
                    <!-- Submit & reset button -->
                    <p>
                        <input type="hidden" name="logIn" value="1" required>
                        <input type = "submit" value = "Login" class="myBtn logBtn" onclick="login()"/>
                    </p> 
                    <p> 
                        <input type = "reset" value = "Reset" class="myBtn logBtn"/>
                    </p>  
                </form>
                <!-- Forgot password & sign-up button -->
                <p> 
                    <a href = "forgot_password.html">
                        <input type="submit" value = "Forgot Password?" class="myBtn logBtn"/>
                    </a>
                </p> <br/>
                <h2>Don't have an account?</h2>
                <p> <a href = "sign_up.php">
                        <input type = "submit" value = "Sign up" class="myBtn logBtn"/>
                    </a></p><br />
                <br/>
            </div>
            <div class="login">
                <h2>Admin Login:</h2>
                <form action = "" id="forumLogin" method="post">
                    <!-- Username & password fields -->
                    <label> Admin Username: &nbsp;
                        <input type="text" name = "username" size = "25" placeholder="ex: 123Andrew76" id="adminUser" required/> </label>
                    <br /> <br />
                    <label> Admin Password: &nbsp;
                        <input type="password" name = "password" size = "25" id="adminPass" required/> </label>
                    <br /> <br />
                    <!-- Submit & reset button -->
                <!-- Login button -->
                <p>
                    <input type="hidden" name="adminLogin" value="1" required>
                    <input type="submit" value = "Login" class="myBtn logBtn" id="adminLogin" onclick="adminLogin()"/>
                </p>
                </form>
            </div>
        </div>
        <?php
            $userFile = fopen("user_info.txt", "r") or die("Unable to open file!");
            // var 
        ?>
        <!-- <script>
            function login() {
                var user = document.getElementById('userName');
                var pass = document.getElementById('userPass');
                createCookie(user, pass);
            }
            
            function adminLogin() {
                var adminUser = document.getElementById('adminUser').value;
                var adminPass = document.getElementById('adminPass').value;
                if(adminUser ===("GreatFarmer") && adminPass ===("datOwner123")){
                    window.alert("Login success!");
                    window.open("../back_end/back_store.html");
                }else{
                    window.alert("Invalid admin username or password");
                }
            }
            
            function createCookie(name, pwds){
                let userNam = document.getElementById('userName');
                let userPas = document.getElementById('userPass');
                
                today = new Date();
                var expire = new Date();
                expire.setTime(today.getTime() + 3600000*24*15);
                
                document.cookie = "name=" + userNam.value+ ";path=/" + ";expires=" + expire.toUTCString();
                document.cookie = "password=" + encodeURI(pwd.value)+"'path=/" + ";expires=" + expire.toUTCString();
            }
            
        </script> -->
        <footer>
            <h4><i class="fa fa-leaf"></i></h4>
        </footer>
    </body>
</html>
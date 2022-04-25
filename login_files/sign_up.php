<?php
    if ($_POST) {
        require_once("../components/connection.php");
        extract($_POST);
        if (!isset($email_notification)) {
            $email_notification = 0;
        }
        $query = "INSERT into users values(NULL,'$first_name','$last_name','$email','$password','$username','$address','$postcode','$email_notification',1    )";
        if(mysqli_query($connection,$query) >= 1){
            $successMessage = "Your account added successfully. Click here to <a href='login_page.php'>Login</a>";
        }else{
            $errorMessage = "Your email is already register. Please! click here to <a href='login_page.php'>Login</a>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
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
                    <h1> <a id="brandName" href ="../index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></h1>
                </div>
                <ul>
                    <li class="italic mt-2"> Your local online grocery </li>
                    <li> <a href ="login_page.php">Login/Sign Up</a></li>
                    <li> <a href ="../checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
            <div class = "login">
                <?php
                    if (isset($errorMessage)):
                    ?>
                        <p class="errorMessage"><?= $errorMessage ?></p>
                    <?php
                        endif;
                        if (isset($successMessage)):
                            ?>
                                <p class="successMessage"><?= $successMessage ?></p>
                            <?php
                                endif;
                ?>
                <form action = "" method="post" id="signUpForm">
                    <h2>Sign up today!</h2><br/>
                    <!-- Personal information fields -->
                    <label> Enter Username: &nbsp;
                    <input type="text" name = "username" size = "25" placeholder="ex: 123Andrew76" required/> </label>
                    <br />
                    <label> First Name: &nbsp;
                    <input type="text" name = "first_name" size = "25" placeholder="Your first name" required/> </label>
                    <br />
                    <label> Last Name: &nbsp;
                    <input type="text" name = "last_name" size = "25" placeholder="Your last name" required/> </label>
                    <br />
                    <label> Enter Email: &nbsp;
                    <input type="email" name = "email" size = "25" placeholder="ex: andrew76@gmail.com" required/> </label>
                    <br />
                    <label> Address: &nbsp; <br/>
                    <input type="text" name = "address" size = "25" placeholder="ex: 123 Baker Street" required/> </label>
                    <br />
                    <label> Postal Code: &nbsp;
                    <input type="text" name = "postcode" size = "25" placeholder="ex: A1B 2C3" required/> </label>
                    <br />
                    <label> Create Password: &nbsp;
                    <input type="password" name = "password" id="pass" size = "25" required/> </label>
                    <br />
                    <label> Confirm Password: &nbsp;
                    <input type="password" name = "password" id="re_pass" size = "25" required/> </label>
                    <br />
                    <label> Receive email notifications &nbsp;
                    <input type="radio" name = "email_notification" value = "1"/> </label>
                    <br />
                    <!-- Submit button -->
                    <p>
                        <input type = "submit" value = "Sign up" class="myBtn logBtn"/>
                    </p> 
                    <p id="pass_error"></p>
                </form>
            </div>
        </div>
        <footer>
            <h4><i class="fa fa-leaf"></i></h4>
        </footer>
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script>
            $("#signUpForm").on("submit",function(event){
            $pass = $("#pass").val();
            $re_pass = $("#re_pass").val();
            if ($pass !== $re_pass) {
                event.preventDefault();
                $("#pass_error").html("Your password does not match with repeat password.")            }
            })
        </script>
    </body>
</html>
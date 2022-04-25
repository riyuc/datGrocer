<?php
    if ($_POST) {
        require_once("../components/connection.php");
        extract($_POST);
        if (!isset($email_notification)) {
            $email_notification = 0;
        }
        $query = "INSERT into users values(NULL,'$first_name','$last_name','$email','$password','$username','$address','$postcode','$email_notification',1    )";
        if(mysqli_query($connection,$query) >= 1){
            header("location:user-list.php");
        }else{
            $errorMessage = "This email is already register.";
        }
    }
?>
<?php
    include('components/header.php');
?>
            <div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center"><div class="col-lg-12">
   <div class="white_card card_height_100 mb_30">
      <div class="white_card_header">
         <div class="box_header m-0">
            <div class="main-title">
               <h3 class="m-0">Add User 
                    <?php
                        if (isset($errorMessage)):
                        ?>
                            <span class="text-danger"><?= $errorMessage ?></p>
                        <?php
                            endif;
                    ?>
                </h3>
            </div>
         </div>
      </div>
      <div class="white_card_body">
         <div class="card-body">
            <form method="post" action="">
               <div class="row mb-3">
                  <div class="col-md-6">
                     <label class="form-label" for="inputEmail4">First Name</label>
                     <input type="text" name="first_name" class="form-control" id="inputEmail4" placeholder="First Name">
                  </div>
                  <div class=" col-md-6">
                     <label class="form-label" for="inputPassword4">Last Name</label>
                     <input type="text" name="last_name" class="form-control" id="inputPassword4" placeholder="Last Name">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <label class="form-label" for="inputEmail4">Username</label>
                     <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="Username">
                  </div>
                  <div class=" col-md-6">
                     <label class="form-label" for="inputPassword4">Postal Code</label>
                     <input type="text" name="postcode" class="form-control" id="inputPassword4" placeholder="Postal Code">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <label class="form-label" for="inputEmail4">Email</label>
                     <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                  </div>
                  <div class=" col-md-6">
                     <label class="form-label" for="inputPassword4">Password</label>
                     <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="inputAddress">Address</label>
                  <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address">
               </div>
               <div class="mb-3">
                  <div class="form-check">
                     <input class="form-check-input" name="email_notification" type="checkbox" id="gridCheck" value="1">
                     <label class="form-label form-check-label" for="gridCheck">
                        Receive email notifications
                     </label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Add User</button>
            </form>
         </div>
      </div>
   </div>
</div>
      </div>
   </div>
</div>
<?php
    include('components/footer.php');
?>
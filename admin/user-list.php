<?php
    include('components/header.php');
?>
            <div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
               <div class="white_card_header">
                  <!-- <div class="box_header m-0">
                     <div class="main-title">
                        <h3 class="m-0">User List</h3>
                     </div>
                  </div> -->
               </div>
               <div class="white_card_body">
                  <div class="QA_section">
                     <div class="white_box_tittle list_header">
                        <h4>User List</h4>
                        <div class="box_right d-flex lms_block">
                           <div class="add_button ms-2">
                              <a href="add-user.php"  class="btn_1">Add New</a>
                           </div>
                        </div>
                     </div>
                     <div class="QA_table mb_30">
                        <table class="table lms_table_active3 ">
                           <thead>
                              <tr>
                                 <th scope="col">Name</th>
                                 <th scope="col">Username</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Operation</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php
                                    require_once("../components/connection.php");
                                    $query = "SELECT * from users where usertype=1";
                                    $result = mysqli_query($connection,$query);
                                    $countRow = mysqli_num_rows($result);
                                    if($countRow >= 1):
                                        for ($i=0; $i < $countRow ; $i++):
                                            $data = mysqli_fetch_assoc($result);
                                ?>
                                <tr>
                                    <th scope="row"> <?= $data['first_name'] . " " . $data['last_name'] ?></th>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td>
                                        <a href="edit-user.php?id=<?=$data['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete-user.php?id=<?=$data['id']?>" onclick="return confirm('Are you sure you want to Delete.')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                        endfor;
                                    endif;
                                ?>
                           </tbody>
                        </table>
                     </div>
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
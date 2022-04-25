<?php
    include('components/header.php');
    include('../components/connection.php');
?>



    <div class="QA_section">
       <div class="white_box_tittle list_header">
          <h4>User List</h4>
          <div class="box_right d-flex lms_block">
             <div class="add_button ms-2">
                <a href="create.php"  class="btn_1">Add New</a>
             </div>
          </div>
       </div>
            <div class= "product-container">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID #</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity per Product</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Operation</th>
                  </tr>
                </thead>
                  <tbody>
                <?php
                include '../components/connection.php';
                  $sql="Select * from `product`";
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
                      <tr>
                        <th scope="row">'.$pID.'</th>
                        <td>'.$category.'</td>
                        <td>'.$pName.'</td>
                        <td>'.$pPrice.'</td>
                        <td>'.$pQuant.'</td>
                        <td>
                          <img src="../back_end/'.$image.'" width="125", height="125" />
                          <td>
                        <td>'.$pDesc.'</td>
                        <td>
                            <a href="update.php?updateid='.$pID.'" class="btn btn-primary btn-sm">
                              Update
                            </a>
                        </td>
                        <td>
                            <a href="delete.php?deleteid='.$pID.'" class="btn btn-primary btn-sm">
                              Delete
                            </a>
                        </td>
                      </tr>
                    ';
                  }
                 ?>
                </tbody>
              </table>
            </div>
<?php
    include('components/footer.php');
?>

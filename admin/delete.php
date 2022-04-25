
<?php
  include('../components/connection.php');
  if(isset($_GET['deleteid'])){
    $pID=$_GET['deleteid'];

    $sql="delete from `product` where pID=$pID";
    $result=mysqli_query($con,$sql);
    if($result){
      header('location:product_list.php');
    }
    else{
      die(mysqli_error($con));
    }
  }
?>

<?php
    include('components/header.php');
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
    } else{
      die(mysqli_error($con));
      }
  }
 ?>
 <div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center"><div class="col-lg-12">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">
 <div class="main-title">
    <h3 class="m-0">Add Product
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
 <form method="post" enctype="multipart/form-data" action="">
    <div class="row mb-3">
       <div class="col-md-6">
          <label class="form-label">Product ID</label>
          <input type="text" name="pID" class="form-control" placeholder="Ex: 001">
       </div>
       <div class=" col-md-6">
          <label class="form-label" >Category</label>
          <input type="text" name="category" class="form-control" placeholder="Ex: Refrigerated Goods">
       </div>
    </div>
    <div class="row mb-3">
       <div class="col-md-6">
          <label class="form-label">Product Name</label>
          <input type="text" name="pName" class="form-control"placeholder="Ex: Bread">
       </div>
       <div class=" col-md-6">
          <label class="form-label">Product Price</label>
          <input type="text" name="pPrice" class="form-control"  placeholder="Ex: 4.99">
       </div>
    </div>
    <div class="row mb-3">
       <div class="col-md-6">
          <label class="form-label">Quantity Per Product</label>
          <input type="text" name="pQuant" class="form-control" placeholder="Ex: 1">
       </div>
       <div class=" col-md-6">
          <label class="form-label">Image</label>
          <input type="file" name="image" class="form-control" placeholder="Image Link">
       </div>
    </div>
    <div class="mb-3">
       <label class="form-label" >Product Description</label>
       <input type="text" name="pDesc" class="form-control" placeholder="Description">
    </div>
    <button type="submit" name="ok" class="btn btn-primary">Add Product</button>
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

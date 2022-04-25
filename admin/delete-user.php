<?php
    require_once("../components/connection.php");
    $id = $_GET['id'];
    $query = "DELETE from users where id='$id'";
    mysqli_query($connection,$query);
    header("location:user-list.php");
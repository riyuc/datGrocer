<?php

      $con = mysqli_connect("localhost","root","","newdat_product");
     $connection = mysqli_connect("localhost","root","","newDat");

     if(!$connection){
       die(mysqli_error($connection));
     }
          if(!$con){
            die(mysqli_error($con));
          }

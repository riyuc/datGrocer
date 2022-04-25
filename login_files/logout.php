<?php

    session_start();
    if (isset($_SESSION['onlineuser'])) {
        unset($_SESSION["onlineuser"]);
        header("location:../index.php");
    }
    if (isset($_SESSION['onlineadmin'])) {
        unset($_SESSION["onlineadmin"]);
        header("location:../index.php");
    }
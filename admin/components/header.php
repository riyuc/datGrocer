<?php
    session_start();
    if (isset($_SESSION['onlineadmin'])):
        $full_name = $_SESSION['onlineadmin']['first_name'] ." " . $_SESSION['onlineadmin']['last_name'];
        $username = $_SESSION['onlineadmin']['username'];
    else:
        header("location:../index.php");
    endif;
?>
<!DOCTYPE html>
<html lang="zxx">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>D.A.T. Grocer</title>
      <link rel="icon" type="image/" href="img/favicon.svg">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="css/bootstrap1.min.css" />
      <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
      <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
      <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
      <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
      <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />
      <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
      <link rel="stylesheet" href="css/metisMenu.css">
      <link rel="stylesheet" href="css/style1.css" />
      <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
   </head>
   <body class="crm_body_bg">
        <nav class="sidebar dark_sidebar">
            <div class="logo d-flex justify-content-between" style="font-size: 30px;">
                <a class="large_logo text-white" href="index.php"><i class="fa fa-leaf"></i> <i>D.A.T.</i> Grocer</a></a>
                <a class="small_logo text-white" href="index.php"><i class="fa fa-leaf"></i></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="">
                    <a class="" href="index.php" aria-expanded="false">
                        <div class="nav_icon_small">
                            <img src="img/menu-icon/1.svg" alt="">
                        </div>
                        <div class="nav_title">
                            <span>Dashboard </span>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="user-list.php" aria-expanded="false">
                        <div class="nav_icon_small">
                            <img src="img/menu-icon/4.svg" alt="">
                        </div>
                        <div class="nav_title">
                            <span>User List</span>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="product_list.php" aria-expanded="false">
                        <div class="nav_icon_small">
                            <img src="img/menu-icon/1.svg" alt="">
                        </div>
                        <div class="nav_title">
                            <span>Product List</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="main_content dashboard_part large_header_bg">
            <div class="container-fluid g-0">
                <div class="row">
                    <div class="col-lg-12 p-0 ">
                        <div class="header_iner d-flex justify-content-between align-items-center">
                            <div class="sidebar_icon d-lg-none">
                                <i class="ti-menu"></i>
                            </div>
                            <div class="line_icon open_miniSide d-none d-lg-block">
                                <img src="img/line_img.png" alt="">
                            </div>
                            <div class="header_right d-flex justify-content-between align-items-center">
                                <div class="profile_info d-flex align-items-center">
                                    <div class="author_name">
                                        <h4 class="f_s_15 f_w_500 mb-0"><?= $full_name ?></h4>
                                        <p class="f_s_12 f_w_400"><?= $username ?></p>
                                    </div>
                                    <div class="profile_info_iner">
                                        <div class="profile_author_name">
                                            <p><?= $username ?></p>
                                            <h5><?= $full_name ?></h5>
                                        </div>
                                        <div class="profile_info_details">
                                            <a href="../login_files/logout.php">Log Out </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

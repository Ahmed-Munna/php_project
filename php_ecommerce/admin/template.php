<?php 
    include("class/adminback.php");
    session_start();
    if($_SESSION["id"]==null && $_SESSION["email"]==null && $_SESSION["pass"]==null){
        header("location:index.php");
    }
    if(isset($_GET["admin_logout"])){
        $obj_adminback = new adminback();
        $obj_adminback->admin_logout();
    }
?>
<?php include("include/header.php") ?>
  <body>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- header_nav -->
            <?php include_once("include/header_nav.php") ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include_once("include/sidebar.php") ?>
                    <div class="pcoded-content" style="overflow-x: scroll;">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                           <?php 
                                                if($views){
                                                    if($views=='dashboard'){
                                                        include("views/dashboard_view.php");
                                                    }elseif($views=='add_catagory'){
                                                        include("views/add_catagory_view.php");
                                                    }elseif($views=='manage_catagory'){
                                                        include("views/manage_catagory_view.php");
                                                    }elseif($views=='add_product'){
                                                        include("views/add_product_view.php");
                                                    }elseif($views=='manage_prouct'){
                                                        include("views/manage_prouct_view.php");
                                                    }elseif($views=='edit_catecogy'){
                                                        include("views/edit_category_view.php");
                                                    }elseif($views=='edit_product'){
                                                        include("views/edit_product_view.php");
                                                    }
                                                }
                                           ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("include/footer.php") ?>

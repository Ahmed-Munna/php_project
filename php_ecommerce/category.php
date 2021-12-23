<?php 
    include("admin/class/adminback.php");
    $obj = new adminback();
    $ctg = $obj->display_category();
    $ctg_datas = array();
    while($data = mysqli_fetch_assoc($ctg)){
        $ctg_datas[]=$data;
    }
    if(isset($_GET["catView"])){
       $prodata = $obj->product_by_ctg($_GET);
       $pros = array();
       while($prodatas = mysqli_fetch_assoc($prodata)){
        $pros[]=$prodatas;
       }
    }
    include_once("includes/head.php");
?>
<body class="biolife-body">

    <?php include_once("includes/preloder.php");?>
    

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
     <?php include_once("includes/header_top.php");?>
     <?php include_once("includes/header_middle.php");?>
     <?php include_once("includes/header_bottom.php");?>
    </header>

            <!-- Page Contain -->
            <div class="page-contain">

                <!-- Main content -->
                <div id="main-content" class="main-content">
                            <!--Hero Section-->
                    <div class="hero-section hero-background">
                        <h1 class="page-title">
                                <?php
                                    if(isset($_GET["catView"])){
                                        echo $_GET["catView"];
                                    }
                                ?>
                        </h1>
                    </div>

                    <!--Navigation section-->
                    <div class="container">
                        <nav class="biolife-nav">
                            <ul>
                                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                                <li class="nav-item"><a href="#" class="permal-link"><?php
                                    if(isset($_GET["catView"])){
                                        echo $_GET["catView"];
                                    }  ?>
                            </a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="container">
                        <!-- Main content -->
                        <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-category grid-style">
                                <div class="row">
                                    <ul class="products-list">
                                            <?php
                                                foreach($pros as $pro){
                                                    
                                            ?>
                                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="single_product.php?single_product=<?= $pro["pdt_id"]?>" class="link-to-product">
                                                        <img src="admin/upload/<?= $pro["pdt_img"]?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <b class="categories"><?= $pro["pdt_cat"]?></b>
                                                    <h4 class="product-title"><a href="single_product.php?single_product=<?= $pro["pdt_id"]?>" class="pr-name"><?= $pro["pdt_name"]?></a></h4>
                                                    <div class="price">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?= $pro["pdt_price"]?></span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                    </div>
                                                    <div class="shipping-info">
                                                        <p class="shipping-day">3-Day Shipping</p>
                                                        <p class="for-today">Pree Pickup Today</p>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message"><?= $pro["pdt_des"]?></p>
                                                        <div class="buttons">
                                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                            <a href="single_product.php?single_product=<?= $pro["pdt_id"]?>" class="btn compare-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </div>
                                <div class="biolife-panigations-block">
                                    <ul class="panigation-contain">
                                        <li><span class="current-page">1</span></li>
                                        <li><a href="#" class="link-page">2</a></li>
                                        <li><a href="#" class="link-page">3</a></li>
                                        <li><span class="sep">....</span></li>
                                        <li><a href="#" class="link-page">20</a></li>
                                        <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>                                                    
        </div>
    </div>
    <!--Footer -->
    <?php include_once("includes/footer.php")?>

    <!--Footer For Mobile-->
    <?php include_once("includes/mobile_footer.php")?>

    <?php include_once("includes/mobile_global.php")?>

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php include_once("includes/script.php")?>
</body>

</html>
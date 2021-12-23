<?php 
    include("admin/class/adminback.php");
    $obj = new adminback();
    $ctg = $obj->display_category();
    $ctg_datas = array();
    while($data = mysqli_fetch_assoc($ctg)){
        $ctg_datas[]=$data;
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
            <br><br>
            <div class="page-contain">
                    <div class="container">
                        <!--Cart Table-->
                        <div class="shopping-cart-container">
                            <div class="row">
                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="box-title">Your cart items</h3>
                                    <form class="shopping-cart-form" action="#" method="post">
                                        <table class="shop_table cart-form">
                                            <thead>
                                            <tr>
                                                <th class="product-name">Product Name</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="cart_item">
                                                <td class="product-thumbnail" data-title="Product Name">
                                                    <a class="prd-thumb" href="#">
                                                        <figure><img width="113" height="113" src="assets/images/shippingcart/pr-01.jpg" alt="shipping cart"></figure>
                                                    </a>
                                                    <a class="prd-name" href="#">National Fresh Fruit</a>
                                                    <div class="action">
                                                        <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                    </div>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity-box type1">
                                                        <div class="qty-input">
                                                            <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                                                            <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                            <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="cart_item wrap-buttons">
                                                <td class="wrap-btn-control" colspan="4">
                                                    <a class="btn back-to-shop">Back to Shop</a>
                                                    <button class="btn btn-update" type="submit" disabled>update</button>
                                                    <button class="btn btn-clear" type="reset">clear all</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <div class="shpcart-subtotal-block">
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal <span class="sub">(2ittems)</span></b>
                                            <span class="stt-price">£170.00</span>
                                        </div>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">£0.00</span>
                                        </div>
                                        <div class="tax-fee">
                                            <p class="title">Est. Taxes & Fees</p>
                                            <p class="desc">Based on 56789</p>
                                        </div>
                                        <div class="btn-checkout">
                                            <a href="#" class="btn checkout">Check out</a>
                                        </div>
                                        <div class="biolife-progress-bar">
                                            <table>
                                                <tr>
                                                    <td class="first-position">
                                                        <span class="index">$0</span>
                                                    </td>
                                                    <td class="mid-position">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td class="last-position">
                                                        <span class="index">$99</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <br><br>
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
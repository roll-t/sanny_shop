<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/home/home.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/slide/slide-slip.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/product/view_product.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/product/list_product.css">

<style>
    .banner {
        margin-bottom: 100px;
    }
</style>
<div class="banner">

</div>

<div class="container-body">
    <?php
        $this->view('client/products/list',$data_product);
    ?>
</div>

<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/Product.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/show.js"></script> <!--1-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/color.js"></script> <!--2-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/size.js"></script><!--3-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/input.js"></script><!--4-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/function_card/sale.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/function_card/describe.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/show.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/color.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/size.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/input.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/slide.js"></script>
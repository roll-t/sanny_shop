<html>
    <head>
        <?php $this->view('client/blocks/head',$sub_content)?>
    </head>
    
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/app.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/cart.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/headline.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/product/view_product.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/footer.css">
    <script src="<?php echo _WEB_ROOT?>/public/client/js/slide/Slide.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/input/Input_1.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/method/Toggle.js"></script>
    <?php auto_import_css_client()?>
    <body>
        <?php 
        $this->view($content,$sub_content);
        ?>
    </body>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/header/search.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/header/header_sticky.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/cart/show.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/client/js/cart/add_cart.js"></script>
</html>


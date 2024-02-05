<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php $this->view('admin/blocks/head',$sub_content) ?>

<script src="<?php echo _WEB_ROOT . "/public/admin/js/app.js" ?>"></script> 

<?php auto_import_css()?>

<body class="g-sidenav-show  bg-gray-200">
    <?php $this->view('admin/blocks/sidebar') ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php $this->view('admin/blocks/navbar') ?>
        <div class="container-fluid py-4">
            <?php $this->view($content, $sub_content) ?>
        </div>
    </main>
    <?php $this->view('admin/blocks/footer')?>
</body>

<?php auto_import_js()?>

</html>
<? ob_end_flush() ?>
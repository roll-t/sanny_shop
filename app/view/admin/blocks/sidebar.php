<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="<?php echo _WEB_ROOT ?>/public/admin/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="<?php echo _WEB_ROOT;?>/admin/dashboard">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>  
      </li>
      <li class="nav-item">
        <div class="dropdown nav-link">
        <i class="material-icons opacity-10 me-2">receipt_long</i>
          <a class="text-white dropdown-toggle d-flex justify-content-between align-items-center w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/product">Create Product</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/product/management_product">Products Management</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/category">Category</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/material">Material</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/color">Color</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown nav-link">
        <i class="material-icons opacity-10 me-2">receipt_long</i>
          <a class="text-white dropdown-toggle d-flex justify-content-between align-items-center w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          Import products
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/ImportProduct">Import products</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT?>/admin/ImportProduct/history">Import history</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown nav-link">
        <i class="material-icons opacity-10 me-2">receipt_long</i>
          <a class="text-white dropdown-toggle d-flex justify-content-between align-items-center w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">List order</a></li>
            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT.'/admin/order/billing'?>">Billing</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="<?php echo _WEB_ROOT;?>/admin/notification">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">notifications</i>
          </div>
          <span class="nav-link-text ms-1">Notifications</span>
        </a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/profile.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/sign-in.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">login</i>
          </div>
          <span class="nav-link-text ms-1">Sign In</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/sign-up.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">assignment</i>
          </div>
          <span class="nav-link-text ms-1">Sign Up</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
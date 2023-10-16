<?php
include("SessionValidation.php");
?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TurfBooking : : Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../Assets/Templates/Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Assets/Templates/Admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><span>SPORTZIFY</span></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><span>SPORTZIFY</span></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../Assets/Templates/Admin/assets/images/faces/face28.png" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Administrator</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="../Assets/Templates/Admin/assets/images/faces/face28.png" alt="">
                </div>
                <div class="p-2">
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="Logout.php">
                    <span>Log Out</span>
                    <i class="mdi mdi-logout ml-1"></i>
                  </a>
                </div>
              </div>
            </li>
            
           
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="Homepage.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi mdi-gamepad menu-icon"></i></span>
                <span class="menu-title">Turf Manager</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="TurfVerification.php">New Turf</a></li>
                  <li class="nav-item"> <a class="nav-link" href="VerifiedTurf.php">Verified Turf</a></li>
                  <li class="nav-item"> <a class="nav-link" href="RejectedTurf.php">Rejected Turf</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#location" aria-expanded="false" aria-controls="location">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Location</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="location">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="place.php">Place</a></li>
                  <li class="nav-item"> <a class="nav-link" href="district.php">District</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="AddProduct.php">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="ViewProduct.php">View Products</a></li>
                  <li class="nav-item"> <a class="nav-link" href="ProductBooking.php">Product Booking</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Complaints.php">
                <span class="icon-bg"><i class="mdi mdi mdi-file-chart menu-icon"></i></span>
                <span class="menu-title">Complaint</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Logout.php">
                <span class="icon-bg"><i class="mdi mdi mdi-file-chart menu-icon"></i></span>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
    <title>Customers</title>
    <!-- CSS & JS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- Angular JS -->
    <script src="<?php echo base_url(); ?>js/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>js/angular-route.min.js"></script>
    <script src="<?php echo base_url(); ?>js/angular-animate.min.js"></script>
    <!-- Customer App -->
    <script src="<?php echo base_url(); ?>app/route.js"></script>
    <!-- App Controller, Filters -->
    <script src="<?php echo base_url(); ?>app/controllers/CustomerController.js"></script>
    <script src="<?php echo base_url(); ?>app/filter.js"></script>
    <!-- NG Table, Toaster -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ng-table.min.css">
    <script src="<?php echo base_url(); ?>js/ng-table.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/toaster.min.css">
    <script src="<?php echo base_url(); ?>js/toaster.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <script src="<?php echo base_url(); ?>js/mask.min.js"></script>
</head>
<body ng-app="cApp">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Customers</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#/customers">Customer</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <ng-view></ng-view>
</div>
</body>
</html>
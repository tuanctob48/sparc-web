<?php

/****************************************************************
File Name       : about.blade.php
Description     : Header of about page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
****************************************************************/
?>


<?php $__env->startSection('content'); ?>

<!-- Page Content -->
<div class="container">
    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">About Us
                <small>It's Nice to Meet You!</small>
            </h1>
            <p>Function Relationship Team</p>
        </div>
    </div>

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/user.png" style="height:200px;width:200px;" alt="">
            <h3>Bui Van Thai
                <small>Project Manager</small>
            </h3>
            <p>ThaiBV1</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/KhanhTH.jpg" style="height:200px;width:200px;" alt="">
            <h3>Tran Huy Khanh
                <small>Project Technical Leader</small>
            </h3>
            <p>KhanhTH</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/user.png" style="height:200px;width:200px;" alt="">
            <h3>Phan Dai Duong
                <small>Developer</small>
            </h3>
            <p>DuongPD1</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/user.png" style="height:200px;width:200px;" alt="">
            <h3>Nguyen Hoai Nam
                <small>Developer</small>
            </h3>
            <p>NamNH31</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/user.png" style="height:200px;width:200px;" alt="">
            <h3>Lu Van Cuong
                <small>Developer</small>
            </h3>
            <p>CuongLV11</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="img/user.png" style="height:200px;width:200px;" alt="">
            <h3>Dang Thai Giap
                <small>Developer</small>
            </h3>
            <p>GiapDT</p>
        </div>

    </div>
    <hr>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<div style="padding-top: 5%">
    <footer class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container-fluid text-center">
            <p>Copyright &copy; 2016 Function Relationship Team</p>
        </div>
    </footer>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
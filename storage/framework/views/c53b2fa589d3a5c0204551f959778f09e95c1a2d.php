<?php
/****************************************************************
File Name       : login.blade.php
Description     : Header of login page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
****************************************************************/
?>



<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center">Login to your account</h1>

            <?php
                if(!isset($_SESSION))
                {
                    session_start();
                }

                if(isset($_SESSION['status_retry']))
                {
                    if($_SESSION['status_retry']==RETRY_LOGIN)
                    {
            ?>
                        <p class="text-danger" style="padding-left: 2%">* Wrong EPOCH ID or Password.</p>
            <?php
                    }
                }
            ?>

            <div class="account-wall" style="padding-top: 5%">
                <form class="form-signin" method="POST" action="login" >
                    <div style="padding-left: 35%">
                        <img class="img-circle img-responsive img-center" src="img/user.png" style="height:100px;width:100px;" alt="">
                    </div>
                    <div style="padding-top: 5%">
                        <input type="text" id="username" class="form-control" name="username" placeholder="EPOCH ID" required autofocus>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div style="padding-top: 10%;padding-left: 35%;width: 200px;">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
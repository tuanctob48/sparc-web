<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center">Login</h2>

          <?php
                if(!isset($_SESSION))
                {
                    session_start();
                }
                // check user authen, if user has been authen then redirect to page home
                if(isset($_SESSION['status_authen']))
                {
                    if($_SESSION['status_authen']==1)
                    {
                        $homepage = url('/home');
                        header('Location:'.$homepage);

                        exit();  
                    }
                }
              // check user authen, if user has been authen successful then thr pages save state authen and redirect to page home
                if(count($authen)>1){
                    if($authen[0]==1){
                        $_SESSION['status_authen']= 1;
                        $_SESSION['status_name']= $authen[1];
                        $_SESSION['status_admin']= $authen[2];
                        echo "<script> alert('authen ok ".$authen[2]. "');</script>";
                        $homepage = url('/home');
                        header('Location:'.$homepage);

                        exit();  
                    }
                    else
                     {
                       $_SESSION['status_retry']= RETRY_LOGIN;
                     }   

                }
                // if the pages not login then the pages show interface login
                if(isset($_SESSION['status_retry']))
                {
                    // if password false then show message warning password false
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
                        <img class="img-circle img-responsive img-center" src="<?php echo e(url('img/phuong.jpg')); ?>" style="height:100px;width:100px;" alt="">
                    </div>
                    <div style="padding-top: 5%">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" id="username" class="form-control" name="username" placeholder="EPOCH ID" required autofocus>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div style="padding-top: 10%;padding-left: 35%;width: 200px">
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
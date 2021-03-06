<?php
/****************************************************************
File Name       : layout.blade.php
Description     : layout for all pages
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
 ****************************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tra cứu chất lượng nuôi tảo</title>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/font-awesome.min.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/default.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/style.css')); ?>"/>
</head>
<header>
    <div class="container">
         <div class="header_top row">
           <div class="col-7 logo">
             <h2>Welcome to SPARC LAB's' Website</h2>
             <p>
<!--
                <?php 
                $authen =1;
                 ?>
                <?php if($authen == 1): ?>
                  <?php echo e("Chào mừng đến với trang người dùng"); ?>

                <?php elseif($authen == 2): ?>
                  <?php echo e("Chào mừng đến với trang quản trị"); ?>

                <?php endif; ?>
-->

               </p>
           </div>
         </div>
         <nav>
             <ul><li><a href="<?php echo e(url('/home')); ?>">Trang chủ</a></li></ul>
             <ul><li><a href="<?php echo e(url('/report')); ?>">Tin tức</a></li></ul>
             <ul><li><a href="<?php echo e(url('/about')); ?>">Liên Hệ</a></li></ul>
                <?php 
                  if(!isset($_SESSION))
                  {
                      session_start();
                  }
                  $value_login=0;
                  // check user authen, if user has been authen then redirect to page home
                  if(isset($_SESSION['status_authen']))
                  {
                      if($_SESSION['status_authen']==1)
                      {
                        $value_login=1;
                      
                        
                      }
                     // else
                      //  echo @'<ul><li> <a href="{{url('/login')}}"> Đăng nhập </a></li></ul>'
                  }
                  if($value_login==1){
                  ?>
                    <ul><li> <a href="<?php echo e(url('/logout')); ?>">Chao </a></li></ul>

                  <?php
                  }
                  else
                  {
                    ?>
                     <ul><li> <a href="<?php echo e(url('/login')); ?>"> Đăng nhập </a></li></ul>
                    <?php
                  }

                  

                ?>


         </nav>
   </div>
</header>
 <body>

<?php echo $__env->yieldContent('content'); ?>

</body>


<?php echo $__env->yieldContent('footer'); ?>

</html>

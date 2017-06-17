<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
****************************************************************/
?>


<?php $__env->startSection('content'); ?>

<div class="clear"></div>
<!-- Page Content -->

<div class="container">
    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
                <center><h1>Team Development!</h1></center>
        </div>
    </div>
    

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <table style="width:100%">
        <tr>
	    	<th>   
		    	<div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/Nam.jpg')); ?>" style="height:200px;width:200px;" alt="">
		            <h3> Đặng Vũ Nam
		                <small>Project Technical Leader</small>
		            </h3>
		        </div>
	        </th> 
	        <th>
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/May1.jpg')); ?>" style="height:200px;width:200px;" alt="">
		            <h3> Trần Thị Mây -
		                <small> Biotechnlegy Leader</small>
		            </h3>
		        </div>
	        </th>
	    </tr>
	    <tr>
	    	<th>    
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/phuong.jpg')); ?>" style="height:200px;width:200px;" alt="">
		            <h3>Lê Anh Phương
		                <small>Member </small>
		            </h3>
		        </div>
		    </th>
		    <th>    
	        <div class="col-lg-4 col-sm-6 text-center">
	            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/tri.jpg')); ?>" style="height:200px;width:200px;" alt="">
	            <h3> Hồ Minh Trí
	                <small>Member</small>
	            </h3>
	        </div>
	        </th>
	    </tr>
	    <tr>
	    	<th>    
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/kim.png')); ?>" style="height:200px;width:200px;" alt="">
		            <h3> Nguyễn Hữu Kim
		                <small>Member</small>
		            </h3>
		        </div>
		    </th>
		    <th>    
	            <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/nhat.png')); ?>" style="height:200px;width:200px;" alt="">
		            <h3> Lê Xuân Nhất
		                <small>Member</small>
		            </h3>
		        </div>
		    </th>    
	     </tr> 
	     	    <tr>
	    	<th>    
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="<?php echo e(url('/img/vietanh.jpg')); ?>" style="height:200px;width:200px;" alt="">
		            <h3>Viet Anh
		                <small>Member</small>
		            </h3>
		        </div>
		    </th>   
	     </tr>  
        </table>
    </div>

</div>

<footer>
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by SPARC</p>
          </div>
</footer>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
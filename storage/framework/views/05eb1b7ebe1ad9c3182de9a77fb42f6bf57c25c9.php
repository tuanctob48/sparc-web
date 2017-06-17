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
<main>
    <div class="container">
         <div class="bieudo_bando row">
             <div class="col-8">

                <div class="bieudo">
                	<?php 
                     for($i=0;$i<100;$i++){
                    $link[$i][0]=" 1. ";
                    $link[$i][1]="http://";}
                    
                     
                    for($i=0;$i<99;$i++){
                      $haha="<br><a href=" ."\"".$link[$i][1]."\">".$link[$i][0]."</a>";
                      echo $haha; 
                    }

                  ?>

                </div>
             </div>
             <div class="col-4">
                
            </div>
             </div>
         </div>

    </div>
</main>
<footer>
    <div class="container row">
          <div class="col-4 chitiet_footer"></div>
          <div class="col-4 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
****************************************************************/
?>



<?php $__env->startSection('content'); ?>
<div class="container">
  <h2>Project List</h2>
  <p>List All Available Projects for Public Members</p>   

<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/css/demo.css">
    <style type="text/css" class="init">
    </style>
    <script type="text/javascript" language="javascript" src="/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" language="javascript" src="/js/demo.js">
    </script>
<?php
          if(!isset($_SESSION))
      {
        session_start();
      }
      if(($control==NOT_AUTHEN)||(count($getdata)==NO_DATA_IN_DATABASE)){      
          // do no thing
          }else{
  ?>
            <script type="text/javascript" language="javascript" class="init">
  <?php
                  // Connecting...
                   if(!isset($_SESSION))
            {
              session_start();
            }
                
                  $varcounter = 0;

                  $stringspecial='"';
                 // $row = mysqli_fetch_assoc($getdata)
                   while($varcounter<count($getdata)){

                          $arrayCategoriesHistory[$varcounter][0] =$getdata[$varcounter]->userid;            
                          $arrayCategoriesHistory[$varcounter][1] = $getdata[$varcounter]->projectid;
                          $arrayCategoriesHistory[$varcounter][2] = $getdata[$varcounter]->viewdate;
                          $varcounter++;

                    }
                      $finalArrhistory = json_encode($arrayCategoriesHistory);
             ?> 
                   var historyDaysRange = <?=$finalArrhistory?>;
                   // save data to show
                   var datastore="";


                 $(document).ready(function() {
                        $('#historyuserdata').DataTable( {
                            data: historyDaysRange,
                            columns: [
                                { title: "userid"},
                                { title: "projectid" },
                                { title: "viewdate" },
                            ]
                        } );

                      var table = $('#historyuserdata').DataTable();
                      

                      $('#historyuserdata tbody').on( 'click', 'td', function () {
                      var idx = table.cell( this ).index().column;
                      var title = table.column( idx ).header();
                      var data = table.row( this ).data();
                            datastore=data;
                            //alert( datastore );
                  
                      } );
                  } );

             </script>

            <section>
            <center>
              <h3 style="padding-left:2%"> History Project</h3>
            </section>
            <br>
                  <section>
                  <table id="historyuserdata" class="display" width="100%"></table>

                  </section>


  <?php
          }
          ?>


 </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
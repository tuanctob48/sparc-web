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

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
<style type="text/css" class="init"></style>
<script type="text/javascript" language="javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="/js/demo.js"></script>

<?php

    /********************************************************************
     * User History View
     * Author: FPT/CuongLV11
     * Reviewer: FPT/ThaiBV1
     ********************************************************************/

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(($control==NOT_AUTHEN)||(count($getdata)==NO_DATA_IN_DATABASE))
    {
        // do no thing
    }
    else
    {
?>

<script type="text/javascript" language="javascript" class="init">
    <?php
        // Connecting...
        if(!isset($_SESSION))
        {
            session_start();
        }
    ?>
</script>

<div class="container">
        <div style="padding-top:2%;" class="text-center">
            <h3 class="bg-primary"> History View Project</h3>
            <p class="text-danger">Display recent view project history of user</p>
        </div>
</div>
<br>

<center>
    <?php
        echo '<table class="table table-hover" style="width:90%" border="true"><thead><tr class="success">';
        $var=0;
        $tvar=0;
        $value_tile[0]='Project Name';
        $value_tile[1]='name project';
        $value_tile[2]='Create Date';
        $value_tile[3]='Version';
        $value_tile[4]='Title';
        $value_tile[5]='Status';
        $value_tile[6]='View Date';



        for($var=0;$var<7 ;$var++) {
            echo '<th> <center>'. $value_tile[$var].'</center></th>';
        }
        echo '</tr></thead><tbody>';

        if(count($getdata)>0)
        {
            for($var=0;$var<count($getdata) ;$var++) {
                echo '<tr>';
                echo '<td> <center>' .$var .' </center> </td>';

                echo '<td> <center><a href=' .'"' .'/folder/'. $getdata[$var][0] .'">' . $getdata[$var][1] .' </a></center> </td>';
                echo '<td> <center>' .$getdata[$var][2] .' </center> </td>';
                echo '<td> <center>' .$getdata[$var][3] .' </center> </td>';
                echo '<td> <center>' .$getdata[$var][4] .' </center> </td>';
                echo '<td> <center>' .$getdata[$var][5] .' </center> </td>';
                echo '<td> <center>' .$getdata[$var][6] .' </center> </td>';
                echo '</tr>';
            }
            
        }
        echo '</tbody></table>';
    ?>
</center>

<?php
    }
?>

<?php
    /********************************************************************
     * Project View
     * Author: FPT/NamNH31
     * Reviewer: FPT/ThaiBV1
    ********************************************************************/
?>

    <div class="container">
        <div style="padding-top:2%;padding-bottom: 2%" class="text-center">
            <h3 class="bg-primary">Project List</h3>
            <p class="text-danger">List all available projects for all members</p>
        </div>
            <script type="text/javascript" language="javascript" class="init">
                <?php
                     $result = $getarray;
                     $var = 0;
                     if(count($result)==0){
                           echo "Not found Database";
                     }else{
                           while($var < count($result)){
                                $arrayCategories[$var][0] = $result[$var] ->projectid;
                                $arrayCategories[$var][1] = "<a>" . $result[$var] ->projectname . "</a>";
                                $arrayCategories[$var][2] = $result[$var] ->createdate;
                                $arrayCategories[$var][3] = $result[$var] ->version	;
                                $arrayCategories[$var][4] = $result[$var] ->description;
                                $arrayCategories[$var][5] = $result[$var] ->userid;
                                $var++;
                           }
                     }
                ?>
                var disabledDaysRange = <?php echo json_encode($arrayCategories ); ?>;
                $(document).ready(function() {
                    $('#example').DataTable( {
                        data: disabledDaysRange,
                        columns: [
                            { title: "Number",  "width": "5%"},
                            { title: "Project Name"},
                            { title: "CreateDate" },
                            { title: "Version" },
                            { title: "Description" },
                            { title: "UserID" },
                        ]
                    } );


                    var table = $('#example').DataTable();

                    $('#example tbody').on( 'click', 'td', function () {
                        var idx = table.cell( this ).index().column;
                        var title = table.column( idx ).header();
                        var data = table.row( this).data();
                        var str = data[1];
                        str = str.substring(3,str.length - 4);

                        if($(title).html() == "Project Name")
                        {
                            //alert(str);
                            window.location.href = "/folder/"+data[0] ;
                        }
                    } );
                } );
            </script>
        <section style="padding-bottom: 5%">
            <table id="example" class="demo cell-border" width="100%"></table>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
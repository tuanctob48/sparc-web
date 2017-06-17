<?php

/****************************************************************
File Name       : folder.blade.php
Description     : Header of folder page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
****************************************************************/

?>


<?php $__env->startSection('content'); ?>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/css/demo.css">
    <style type="text/css" class="init"></style>
    <script type="text/javascript" language="javascript" src="/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="/js/demo.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/_styles.css" media="screen">
    <div style="padding-left: 10%; padding-right: 10%;">

        <div style="padding-top:2%;" class="text-left">
            <h3 class="text-success">Project Name:
                <?php
                    echo '<label class="text-danger">'.$projectname.'</label>';
                ?>
            </h3>
        </div>


        <div style="padding-top:1%;" class="text-center">
            <h3 class="bg-primary">Project Tree View</h3>
            <p class="text-danger">Display project folder source by tree form</p>
        </div>

        <div style="padding-top:2%;">
            <ul style="border: solid 1px blue; height: auto; width: auto;">
                <?php

                if(count($getarray)==0){
                    echo "Not found Database";
                }else{
                    $var = 0;
                    while($var < count($getarray)){
                        $arrayCategorie[$var+1]['FolderID'] = $getarray[$var] ->folderid;
                        $arrayCategorie[$var+1]['FolderName'] = $getarray[$var] ->foldername;
                        $arrayCategorie[$var+1]['ProjectID'] = $getarray[$var] ->projectid;
                        $arrayCategorie[$var+1]['ParentFolderID'] = $getarray[$var] ->parentfolderid;
                        $var++;
                    }
                }
               // print_r($arrayCategorie);
                function createTreeView($array, $currentParent ,$currLevel = 0, $prevLevel = -1) {
                    foreach ($array as $categoryId => $category) {
                        if ($currentParent == $category['ParentFolderID']) {

                            if ($currLevel > $prevLevel) echo " <ol class='tree'> ";
                            else{}
                            if ($currLevel < $prevLevel) echo '</li>' ;
                            echo '<li> <a id="'.$category['FolderID'].'" onclick="javascript:getID(this)"> <label for="var_value" id = "currLevel-1" >'.$category['FolderName'].'</label></a> <input id="$currLevel" type="checkbox" name="subfolder2" /> ';
                            if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
                            $currLevel++;
                            createTreeView ($array, $category['FolderID'], $currLevel, $prevLevel);
                            $currLevel--;
                        }
                    }
                    if ($currLevel == $prevLevel) echo " </li>  </ol> ";
                }
                ?>
                <div id="content" class="general-style1">
                    <?php
                    if(count($getarray) != 0)
                    {
                        createTreeView($arrayCategorie, 0);
                    }
                    ?>

                </div>
                <script>
                    function getID(_mid){
                        window.location.href = "/file/" + _mid.id;
                    }
                </script>
            </ul>
        </div>
        <div style="padding-top:1%;" class="text-center">
            <h3 class="bg-primary">Searching Folder</h3>
            <p class="text-danger">Any folder in project can be found in here</p>
        </div>
    </div>

    <div style="padding-top: 2%; padding-bottom: 5%">
        <script type="text/javascript" language="javascript" class="init">
                    <?php
                        // Connecting...
                        $arrayCategorie = null;
                        $arrayCategorietemp= null;
                        $var = 0;
                        if(count($getarray)==0){
                             echo "Not found Database";
                        }else{
                            while($var < count($getarray)){
                                $arrayCategorietemp[$var+1] = $getarray[$var] ->folderid;
                                $arrayCategorie[$var][0] =$var + 1;
                                $arrayCategorie[$var][1] = "<a>" . $getarray[$var] ->foldername . "</a>";
                                $var++;
                            }
                        }
                    ?>
                    var disabledDaysRange = <?php echo json_encode($arrayCategorie); ?>;
                    var folder_id = <?php echo json_encode($arrayCategorietemp ); ?>;
            $(document).ready(function() {
                $('#example').DataTable( {
                    data: disabledDaysRange,
                    columns: [
                        { title: "Number",  "width": "5%"},
                        { title: "Folder Name"},
                    ]
                } );


                var table = $('#example').DataTable();

                $('#example tbody').on( 'click', 'td', function () {
                    var idx = table.cell( this ).index().column;
                    var title = table.column( idx ).header();
                    var data = table.row( this).data();
                    var str = data[1];
                    str = str.substring(3,str.length - 4);

                    if($(title).html() == "Folder Name")
                    {
                        //alert(str);
                        window.location.href = "/file/"+folder_id[data[0]] ;
                    }
                } );
            } );
        </script>

        <div class="dt-example">
        <p id="demo"></p>
        <div class="container">
            <section>
                <table id="example" class="demo cell-border" width="100%"></table>
            </section>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
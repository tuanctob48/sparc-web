<?php
/****************************************************************
File Name       : generate.blade.php
Description     : Header of generate page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
 ****************************************************************/
?>



<?php $__env->startSection('content'); ?>
    <img src="img/logo.png" class="img-responsive" alt="Responsive image" height="auto" style="padding-left:27%;padding-top:10%;">
    <form class="form-inline" role="form" style="padding-left:31%;padding-top:4%;" method="POST" action="generatedatabases">
        <div class="form-group">
            <label>Input File:</label>
            <input type="file" id="browse" onchange="Handlechange();" style="display:none">
            <input class="text-center" type="text" id="filename"  name="filename"  readonly="true" style="width: 430px;height:40px;">
            <button type="button" id="BrowseButton" onclick="HandleBrowseClick()" style="width: 50px;height:40px;"><span class="glyphicon glyphicon-folder-open"></span></button>
        </div>
    

    <div id="button_body" style="padding-left:27%;padding-top:4%;">
    
        <button type="submit" class="btn btn-primary" style="width : 120px;height : 40px" >Generate</button>

    </div>

</form>
    <script language="JavaScript" type="text/javascript">

        function HandleBrowseClick()
        {
            var fileinput = document.getElementById("browse");
            fileinput.click();
        }


        function Handlechange()

        {
            var fileinput = document.getElementById("browse");
            var textinput = document.getElementById("filename");
            textinput.value = fileinput.value.replace("C:\\fakepath\\", "\\csvfile\\");

        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
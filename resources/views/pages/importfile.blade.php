<?php
/****************************************************************
File Name       : 
Description     : Header of import
Creation Date   : 22/6/2017
Author          : luvan cuong
Change History  :
 ****************************************************************/
?>

@extends('layouts.layout_member')

@section('content')
    <script type="text/javascript" language="javascript" src="{{url('/js/popup.js')}}"></script>   
    <link rel="stylesheet" type="text/css" href="{{url('/css/popup.css')}}" xmlns="http://www.w3.org/1999/html">
    <div id="overlay"></div>
    <form name="form" id="form" class="form-inline" role="form" style="padding-left:31%;padding-top:4%;" method="POST" action="uploadFile" enctype="multipart/form-data">
        <div class="form-group">
            <label>Input File:</label>
            <input type="file" name="file" id="browse" onchange="Handlechange();" style="display:none" accept=".*">
            <input class="text-center" type="text" id="filename"  name="filename"  readonly = "readonly" style="width: 430px;height:40px;">
            <button type="button" id="BrowseButton" onclick="HandleBrowseClick()" style="width: 50px;height:40px;"><span class="glyphicon glyphicon-folder-open"> file</span></button>
            <br>
            <label >Nhập dữ liệu</label>
            <center>
            <button id="PostButton" type="submit" onclick="generateAction()" style="width: 500px;height:80px;"><span class="glyphicon glyphicon-folder-open"> Upload now! </span> </button>
            </div>
<script>
   /*  call a view, this is where the magic occurs.
       Note: javascript can't build laravel URLs, so we have to embed them in 
       the button above */
   
</script>
            </center>
<?php
    header('Cache-Control: no cache'); 
    session_cache_limiter('private_no_expire'); 
    
   if(!isset($_SESSION))
    {
        session_start();
    }
?>
        </div>

    </form>
<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script language="JavaScript" type="text/javascript">
        var HAVEFILE = 0;
        var NOTHAVEFILE = 1;
        var fileSelect = null;
        var call_view = function(name)
        {           
          window.location = name;
        }
        $('#browse').bind("change", function () {
            var file = this.files[0];
            if (file) {
            } else {
                var textinput = document.getElementById("filename");
                textinput.value = "";
                document.form.generate.style.display = 'none';
            }
        });
        function callView(){
          window.location.replace('callView');
        }
        function HandleBrowseClick()
        {
            var fileinput = document.getElementById("browse");
            fileinput.click();
        }
        function Handlechange()
        {
            var filename =  document.getElementById("browse").files[0].name;
            var result = filename.split(".");
            var pos = result.length -1;
                var fileinput = document.getElementById("browse");
                fileSelect = fileinput;
                var textinput = document.getElementById("filename");
                var value_path = fileinput.value.split("\\");
                textinput.value = value_path[value_path.length-1];
               /* $.ajax({
                    type: 'get',
                    url: '{{URL::to('getfile')}}',
                    data: {
                        name: filename
                    },
                    success: function (data) {
                        if (data == HAVEFILE) {
                            showPopupConfirm('There is already a file the same name in this server!','Do you want to copy and replace');
                        }
                        else {
                            document.form.generate.style.display = 'block';
                        }
                    }
                });*/
        }
	function HandleBrowseClick1()
        {
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '{{URL::to('getfile')}}',
                    data: {
                        name: 'chu tran tuan',
                        type: 'chu tran tuan'
                    },
                    success: function (data) {
                         var textinput = document.getElementById("filename");
                       textinput.value =data[0]+data[1]+data[2];
                    }
                });
        }
				function PostButtonData(){
        }
        function generateAction()
        {
            var textinput = document.getElementById("filename");
            if(textinput.value)
            {
                //showProcessing("Generating...");
            }
        }
    </script>
@endsection

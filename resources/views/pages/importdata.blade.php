<?php
/****************************************************************
File Name       : 
Description     : Header of import
Creation Date   : 22/6/2017
Author          : luvan cuong
Change History  :
 ****************************************************************/
?>

@extends('layouts.layout')

@section('content')
    <script type="text/javascript" language="javascript" src="{{url('/js/popup.js')}}"></script>   
    <link rel="stylesheet" type="text/css" href="{{url('/css/popup.css')}}" xmlns="http://www.w3.org/1999/html">
    <div id="overlay"></div>
    <form name="form" id="form" class="form-inline" role="form" style="padding-left:31%;padding-top:4%;" method="POST" action="getdatabases" enctype="multipart/form-data">
        <div class="form-group">
            <label>Input File:</label>
            <input type="file" name="file" id="browse" onchange="Handlechange();" style="display:none" accept=".*">
            <input class="text-center" type="text" id="filename"  name="filename"  readonly = "readonly" style="width: 430px;height:40px;">
            <button type="button" id="BrowseButton" onclick="HandleBrowseClick()" style="width: 50px;height:40px;"><span class="glyphicon glyphicon-folder-open"> file</span></button>
            <br>
            <label>Preview Image:</label>
            <input type="file" name="img" id="img" onchange="HandlechangeImg();" style="display:none" accept=".*">
            <input class="text-center" type="text" id="imgname"  name="imgname"  readonly = "readonly" style="width: 430px;height:40px;">
            <button type="button" id="BrowseButton" onclick="HandleBrowseClickImg()" style="width: 50px;height:40px;"><span class="glyphicon glyphicon-folder-open"> file</span></button>
            <br>
            <center>
            <button id="PostButton" type="submit" onclick="generateAction()" style="width: 500px;height:80px;"><span class="glyphicon glyphicon-folder-open"> Upload now! </span> </button>
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

    <script language="JavaScript" type="text/javascript">
        var HAVEFILE = 0;
        var NOTHAVEFILE = 1;


        var fileSelect = null;

        $('#browse').bind("change", function () {
            var file = this.files[0];
            if (file) {
                // if file selected, do something
            } else {
                var textinput = document.getElementById("filename");
                textinput.value = "";
                document.form.generate.style.display = 'none';
            }
        });

        function HandleBrowseClick()
        {
            var fileinput = document.getElementById("browse");
            fileinput.click();
        }
        function HandleBrowseClickImg()
        {
            var fileinput = document.getElementById("img");
            fileinput.click();
        }
        function Handlechange()
        {
            var filename =  document.getElementById("browse").files[0].name;
            var result = filename.split(".");
            var pos = result.length -1;
            if((result[pos] == "doc")||(result[pos] == "docx")) {
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
            else {
                showWarning('Type of file is not correct!');
            }
        }
        function HandlechangeImg()
        {
            var filename =  document.getElementById("img").files[0].name;
            var result = filename.split(".");
            var pos = result.length -1;
            if((result[pos] == "jpg")||(result[pos] == "jpeg")) {
                var fileinput = document.getElementById("img");
                fileSelect = fileinput;
                var textinput = document.getElementById("imgname");
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
            else {
                showWarning('Type of file is not correct!');
            }
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
<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
****************************************************************/
?>
@extends('layouts.layout_member')

@section('content')

<div class="clear"></div>
<!-- Page Content -->

<div class="container">
  <?php
  require("phpMQTT.php");

  $host = "http://localhost"; 
  $port = 3306;
  $username = "username"; 
  $password = "password"; 
  $message = "Hello CloudMQTT!";

  //MQTT client id to use for the device. "" will generate a client id automatically
  $mqtt = new phpMQTT($host, $port, "ClientID".rand()); 

  if ($mqtt->connect(true,NULL,$username,$password)) {
    $mqtt->publish("topic",$message, 0);
    $mqtt->close();
  }else{
    echo "Fail or time out<br />";
  }

  ?>
</div>



@endsection

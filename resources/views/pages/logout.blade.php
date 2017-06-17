@extends('layouts.layout')
<?php

 	if(!isset($_SESSION))
	{
	    session_start();
	}
	// check user authen, if user has been authen then redirect to page home
	if(isset($_SESSION['status_authen']))
	{
	    if($_SESSION['status_authen']==1)
	    {
	    	$_SESSION['status_authen']=0;
	       
	    }
	}
	 $homepage = url('/home');
    header('Location:'.$homepage);

    exit();  
?>


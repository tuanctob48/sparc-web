<?php

?>

@extends('layouts.layout')

@section('content')
<div class="clear">


</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center">Login</h2>
            <h2 class="text-center">
                <?php
                    if($request!=null){
                        echo $request->username;
                   }

                ?>

            </h2>

            <div class="account-wall" style="padding-top: 5%">
                <form class="form-signin" method="POST" action="login" >
                    <div style="padding-left: 35%">
                        <img class="img-circle img-responsive img-center" src="{{url('img/user.png')}}" style="height:100px;width:100px;" alt="">
                    </div>
                    <div style="padding-top: 5%">
                        {{csrf_field() }}
                        <input type="text" id="username" class="form-control" name="username" placeholder="EPOCH ID" required autofocus>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div style="padding-top: 10%;padding-left: 35%;width: 200px">
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

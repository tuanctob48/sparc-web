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
  <div class = "main">

    <div class="abc">
      <img src="{{url('/img/thayDung.jpg')}}" alt="thầy Dũng pro" style="width:250px;height:250px;float: left">
      <ul class="thongTinCoBan">
        <li>Hàn Huy Dũng</li>
        <li>email: hanhuydung.hust@gmail.com</li>
      </ul>
      
    </div> 

    <div class="cv">
      <div class="BOX">
        <img src="{{url('/img/MachineLearning.png')}}" alt=""
         style="width:50px;
         height:50px; 
         float: left;
         padding-top: 20px;
         ">

        <div class="informations">
          <div class="name">
            <h2>Lecturer/ Researcher</h2>
          </div>
          <div class="sumary">

              <ul>
                <li style="height:30px">Company NameSchool of Electronics and Telecommunications, Hanoi University of Science and Technology</li>
                <li style="height:30px">May 2013 – Present | 4 yrs 3 mos</li>
                <li style="height:30px">1 Dai Co Viet</li>
              </ul>
          </div>
        </div>
      </div>

      <div class="BOX">
        <img src="{{url('/img/MachineLearning.png')}}" alt=""
         style="width:50px;
         height:50px; 
         float: left;
         padding-top: 20px;
         ">

        <div class="informations">
          <div class="name">
            <h2>Postdoctoral Research Associate</h2>
          </div>
          <div class="sumary">

              <ul>
                <li style="height:30px">Fujitsu Laboratories America</li>
                <li style="height:30px">Jan 2012 – Apr 2013 | yr 4 mos</li>
                <li style="height:30px">Conducted research on LTE-A, Device-to-Device communications.</li>
              </ul>
          </div>
        </div>
      </div>

      <div class="BOX">
        <img src="{{url('/img/MachineLearning.png')}}" alt=""
         style="width:50px;
         height:50px; 
         float: left;
         padding-top: 20px;
         ">

        <div class="informations">
          <div class="name">
            <h2>Research Assistant, Broadband Radio Access Technologies Laboratory</h2>
          </div>
          <div class="sumary">

              <ul>
                <li style="height:30px">UC Davis</li>
                <li style="height:30px">Sep 2007 – Jan 2012 | 4 yrs 5 mos</li>
                <li style="height:30px">Electrical and Computer Engineering, University of California, Davis</li>
              </ul>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<footer>
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by SPARC</p>
          </div>
</footer>

@endsection

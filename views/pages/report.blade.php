<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
****************************************************************/
?>
@extends('layouts.layout')

@section('content')

<div class="clear"></div>
<main>
    <div class="container">
         <div class="bieudo_bando row">
             <div class="col-6">

                <div class="bieudo">
                	<?php 
                    $link[0][0]=" 1. Hà Nội ô nhiễm không khí ở mức báo động: Bạn có thể làm gì?";
                    $link[0][1]="http://trithucvn.net/suc-khoe/ha-noi-o-nhiem-o-muc-bao-dong-ban-co-the-lam-gi.html";
                    $link[1][0]=" 2. Ô nhiễm không khí tại Hà Nội đang ở mức báo động đỏ";
                    $link[1][1]="http://vnexpress.net/tin-tuc/thoi-su/chu-tich-ha-noi-o-nhiem-khong-khi-o-muc-bao-dong-do-3543029.html";
                    $link[2][0]=" 3. Hà Nội công bố chỉ số chất lượng không khí hàng ngày?";
                    $link[2][1]="http://vnexpress.net/tin-tuc/thoi-su/ha-noi-cong-bo-chi-so-chat-luong-khong-khi-hang-ngay-3525546.html";
                    for($i=0;$i<3;$i++){
                      $haha="<br><a href=" ."\"".$link[$i][1]."\">".$link[$i][0]."</a>";
                      echo $haha; 
                    }

                  ?>

                </div>
             </div>
             <div class="col-6">
                 <div class="bando" id="map">
            </div>
                    <script>

      // This example creates a 2-pixel-wide red polyline showing the path of William
      // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
      // Brisbane, Australia.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 21.0051226, lng: 105.8464602},
          mapTypeId: 'terrain'
        });

        var flightPlanCoordinates = [
      {lat:21.004626, lng:105.844080},
{lat:21.004626, lng:105.844080},
{lat:20.9995283333333, lng:105.84563}

        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj14rLlxqILhTSfmj4PZxpIPs9LHKULGQ&callback=initMap">
    </script>
             </div>
         </div>

    </div>
</main>
<footer>
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>

@endsection

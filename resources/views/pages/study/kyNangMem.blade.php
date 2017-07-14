@extends('layouts.layout_member')
@section('content')
<div class="clear"></div>
<div class="container" >
      <?php
            foreach($data as $row){
                  foreach($row as $key=>$value){
                        if($key == "link")
                              echo "<a href=\"http://localhost/laravel_iot/public/training/".$value."\">Down load</a>";
                              // echo $key.":".$value;
                        else{
                              echo $key.":".$value;
                              echo "<br>";                        
                        }

                  }
                  echo "<br><br><br><br>";
            }
            
      ?>

</div>
<footer style="clear: left;">
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Sparc</p>
          </div>
</footer>

@endsection
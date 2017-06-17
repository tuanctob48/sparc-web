<?php

/****************************************************************
File Name       : settings.blade.php
Description     : Header of settings page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
 ****************************************************************/

?>



<?php $__env->startSection('content'); ?>

	<h1 style="padding-left:2%">Setting Generate Databases</h1>

	<form action="#" method="post" class="radioform" id="radioform" style="padding-left:3%">
		<fieldset>
			<div class="radio">
			  <label><input type="radio" name="optradio" checked="true" value="manual" onclick="ManualClick()" >Manual</label>
			</div>
			<div class="radio">
			  <label><input type="radio" name="optradio" value="automatic" onclick="AutomaticClick()">Automatic</label>
			</div>  
		</fieldset>  
	</form>

	<form class="form-inline" id="config" role="form" style="padding-left:3%;padding-top:1%; display:none;">
		<div class="form-groupd">
			  <label for="inputFile" >Config File: </label>
			  <input type="file" id="browse" name="browse" style="display:none" onchange="Handlechange();">
			  <input type="text" id="filename" readonly="true" style="width: 430px;height:40px;">
			  <button type="button" id="BrowseButton" onclick="HandleBrowseClick()" style="width: 50px;height:40px;"><span class="glyphicon glyphicon-folder-open"></span></button>
		</div>
	</form>	 

	<form class="form-inline" id="timing" role="form" style="padding-left:3%;padding-top:1%; display:none">
		<div class="form-groupd">
			<label for="timing" >Timing: </label>

			<select style="width:120px;" onchange="DailyChange(this)">
				<option value="daily">Daily</option>
				<option value="weekly">Weekly</option>
			</select>	

			<label for="DayLabel" id="DayLabel" style="padding-left: 1%; display:none">Day: </label>

			<select id="Day" style="width:120px; display:none">
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
				<option value="Sunday">Sunday</option>
			</select>	

			<label for="At" style="padding-left:1%">At: </label>
			<select style="width:100px;">
				<option value="0AM">00:00 AM</option>
				<option value="1AM">01:00 AM</option>
				<option value="2AM">02:00 AM</option>
				<option value="3AM">03:00 AM</option>
				<option value="4AM">04:00 AM</option>
				<option value="5AM">05:00 AM</option>
				<option value="6AM">06:00 AM</option>
				<option value="7AM">07:00 AM</option>
				<option value="8AM">08:00 AM</option>
				<option value="9AM">09:00 AM</option>
				<option value="10AM">10:00 AM</option>
				<option value="11AM">11:00 AM</option>
				<option value="12AM">12:00 AM</option>
				<option value="1PM">1:00 PM</option>
				<option value="2PM">2:00 PM</option>
				<option value="3PM">3:00 PM</option>
				<option value="4PM">4:00 PM</option>
				<option value="5PM">5:00 PM</option>
				<option value="6PM">6:00 PM</option>
				<option value="7PM">7:00 PM</option>
				<option value="8PM">8:00 PM</option>
				<option value="9PM">9:00 PM</option>
				<option value="10PM">10:00 PM</option>
				<option value="11PM">11:00 PM</option>
			</select>					
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
		    textinput.value = '   ' + fileinput.value;
		}

		function ManualClick()
		{
			document.getElementById( 'config' ).style.display = 'none';
			document.getElementById( 'timing' ).style.display = 'none';
		}

		function AutomaticClick()
		{
			document.getElementById( 'config' ).style.display = 'inherit';
			document.getElementById( 'timing' ).style.display = 'inherit';
		}

		function DailyChange(el)
		{
			window["display_" + el.options[el.selectedIndex].value]();
		}

		function display_daily() {

		    document.getElementById( 'Day' ).style.display = 'none';
		    document.getElementById( 'DayLabel' ).style.display = 'none';
		}

		function display_weekly() {

		    document.getElementById( 'Day' ).style.display = 'initial';
		    document.getElementById( 'DayLabel' ).style.display = 'initial';
		}				

	</script>

	<script type="text/javascript">


	</script>
 <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/css/demo.css">
    <style type="text/css" class="init">
    </style>
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" language="javascript" src="/js/demo.js">
    </script>
	 <?php
	        if(!isset($_SESSION))
			{
				session_start();
			}
			
			if(($control==NOT_AUTHEN)||(count($getdata)==NO_DATA_IN_DATABASE)){

	?>


				<section>
	   				<h1 style="padding-left:2%">
	<?php
					if($control!=NOT_AUTHEN){
	   						echo 'You do not have database, please check system database';
	   						}
	   						else
	   						{
	   						echo $mesage;
	   						}	
	?>
	   				</h1>
	  			 </section>
<?php
					}else{
	?>
						<script type="text/javascript" language="javascript" class="init">
	<?php
			            // Connecting...
			             if(!isset($_SESSION))
						{
							session_start();
						}
			        	
			            $var = 0;

			            $stringspecial='"';
			           // $row = mysqli_fetch_assoc($getdata)
			             while($var<count($getdata)){

			                    $arrayCategories[$var][0] =$getdata[$var]->userid;	          
			                    $arrayCategories[$var][1] = $getdata[$var]->permission;
			                    $arrayCategories[$var][2] = "<select   onchange=" .$stringspecial ."onChangeData(this);" .$stringspecial ."  > 
			                    		<option selected>" .$getdata[$var]->permission ."</option> <option >";
			                    if(strcmp($getdata[$var]->permission,ADMIN)==VALUE_EQUAL){
			                    	$arrayCategories[$var][2] .='member' ."</option>
									  </select>";
			                    }
			                    else
			                    {
			                    	$arrayCategories[$var][2] .='admin' ."</option>
									  </select>";
			                    }
									  	
			                    $var++;
			              }
			                $finalArr = json_encode($arrayCategories);
			       ?>	
	       					 var disabledDaysRange = <?=$finalArr?>;
	       					 // save data to show
	       					 var datastore="";
	       					 // array save data
	       					 var arraychangemanager = new Array(new Array());
	       					 // countter leng data and set point data in arraychangemanager
	       					 var counterdatachange=0;
	       					 arraychangemanager.push(["UNDEFINE","UNDEFINE"]);

						     $(document).ready(function() {
						            $('#example').DataTable( {
						                data: disabledDaysRange,
						                columns: [
						                    { title: "userid"},
						                    { title: "permision" },
						                    { title: "permisionsetting" },
						                ]
						            } );

					            var table = $('#example').DataTable();
					            

					            $('#example tbody').on( 'click', 'td', function () {
					            var idx = table.cell( this ).index().column;
					            var title = table.column( idx ).header();
					            var data = table.row( this ).data();
				                		datastore=data;
				                		//alert( datastore );
									
					            } );
					        } );

						  function onChangeData(ele){
						  	var selected = ele.options[ele.selectedIndex].text;
						  	var matrixtext = datastore[0];
						  	// if nothing to insert data before
						  	if (matrixtext.length != 0) {
								if(counterdatachange==0){
							  			arraychangemanager[0][1]=selected;
							  			arraychangemanager[0][0]=matrixtext;
							  			arraychangemanager.push(["UNDEFINE","UNDEFINE"]);
							  			counterdatachange=1;
							  	}
							  	else
							  	{
							  		var addelement=1;
							  		for(var i=0;i<(counterdatachange+1);i++){
							  				// check name in matrix, if name has been exist in arraychangemanager then update data
							  			if(i!=counterdatachange){
							  				if(arraychangemanager[i][0]==matrixtext){
							  					arraychangemanager[0][1]=selected;
							  					addelement=0;
							  					break;
							  				}
							  			}
							  			else
							  			{
							  				// if name id is not exist in arraychangemanager then update data in last data
							  				arraychangemanager[counterdatachange][1]=selected;
							  				arraychangemanager[counterdatachange][0]=matrixtext;
							  				arraychangemanager.push(["UNDEFINE","UNDEFINE"]);
							  			}

							  		}
							  		if(addelement)
							  		counterdatachange++;
							  	}
						  	}
						  	var getshowdata=selected+ " " + matrixtext;
						  	for(var k=0;k<(counterdatachange+1);k++){
						  		getshowdata+=" " +arraychangemanager[k][0]+ " " + arraychangemanager[k][1];
						  	}
						   //	alert( getshowdata );
						   }

						   function getAllDataChange(){
						   	 	var form = document.createElement('form');
						   	 	var specialchar='"';
							    form.setAttribute('method', 'post');
							    form.setAttribute('action', 'savesetting');
							    form.style.display = 'hidden';
							    document.body.appendChild(form);
							    for(var i=0;i<counterdatachange;i++){
									//my_tb1.setAttribute("id", "arraychangemanager[0][0]");
									//my_tb1.setAttribute("name", "arraychangemanager[0][0]");
								    var element1 = document.createElement("INPUT");         
	    							element1.name='arraychangemanager['+i.toString()+'][0]';
	    							element1.id='arraychangemanager['+i.toString()+'][0]';
	    							element1.value = arraychangemanager[i][0];
	    							element1.type = 'hidden';
								   	form.appendChild(element1);
								    var element2 = document.createElement("INPUT");         
	    							element2.name='arraychangemanager['+i.toString()+'][1]';
	    							element2.id='arraychangemanager['+i.toString()+'][1]';
	    							element2.value = arraychangemanager[i][1];
	    							element2.type = 'hidden';
								   	form.appendChild(element2);	
							   	}						   	
							    form.submit();

						   }
						   function notChangeData(){
						   	 	var form = document.createElement('form');
						   	 	var specialchar='"';
							    form.setAttribute('method', 'post');
							    form.setAttribute('action', 'donotsavesetting');
							    form.style.display = 'hidden';
							    document.body.appendChild(form);					   	
							    form.submit();
						   }

						 </script>

						<section>
						<center>
							<h2 style="padding-left:2%"> Databases Manager</h2>
						</section>
						<br>
			            <section>
			            <table id="example" class="display" width="100%"></table>
			            <center>
			            <button type="button" onclick="getAllDataChange();">Save data base</button> 
			            <button type="button" onclick="notChangeData();">Cancel</button> 
			            </center>
			            </section>


	<?php
					}
	        ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
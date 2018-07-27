<!DOCTYPE html>
  <html>
    <head>
      <title>Live train tracker</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
	  <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html">
      <meta name="description" content="Train tracker" />
      <meta name="keywords" content="Train tracker">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
      <script src="js/myTrain_core.js"></script><!--  Core Train JS-->  
	  <script src="js/changeStyleTheme.js"></script><!--  change wallpapers,changeStyleTheme JS-->
	 
      <link rel="stylesheet" type="text/css" media="all" href="css/myTrainStyle.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Icon lib-->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- GOOGLE Icon lib-->
	  
	  <!-- DatePicker Library-->
	  <link rel="stylesheet" type="text/css" href="datePicker/datepicker.min.css">  
	  <script src="datePicker/datepicker.min.js"></script>
	  <!-- DatePicker Library-->
	  
	  <!-- Mine processor for DatePicker -->
     <script src="datePicker/datePicker_MineProcessor.js"></script>
	  
	  <!--Favicon-->
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

  </head>
  <body>
  
  
  
  
  
  
  
  
  
  
  
  
  
   <div id="headX" class=" text-center  colorAnimate head-style"> <!--#2ba6cb;   myShadow-->
	   
         <h1 id="h1Text">
             <img id ="wLogo" class="shrink-large" src="">	 
		     <span id="textChange" class="textShadow">Live train tracker</span> 
			 <i class="material-icons " style="font-size:66px; color:;position:relative; top:20px;margin-left:1%;">train</i>
		     
			 <img id ="wLogo2" src="" style="width:44%;"/>
			 <br>
			 <?php date_default_timezone_set("Europe/Kyiv"); ?>
			 
			 
		 </h1> 
		   
           <!--<p class="header_p">All cities weather processor</p>-->  <!--generates random lists, ramdomizes integers, etc--> <!--<span class="glyphicon glyphicon-duplicate"></span>-->  
	   </div>
	   
	 



         <br>
		 <!--<div class="item contact padding-top-0 padding-bottom-0" id="contact1">-->
         <div class="wrapper grey">
    	     <div class="container">
		   
		   
		   
		         <div class="col-sm-12 col-xs-12  mainX head-style" style="background-color:;">  <!-- myShadow -->
				     <i class="	fa fa-dollar" style="font-size:40px"></i>&nbsp;&nbsp;<i class="fa fa-toggle-on" style="font-size:40px"></i>
				 
				 
				 
			         <form class="form-inline" action="">
                          <div class="form-group">
						       <!-- DatePicker-->
                               <input type="text" id="myDateInput" value="" size="18"/></br></br> <!-- will dispaly the date-->
		                       <input type="button" value="<<" id="prevDay"/> 
		                       <input type="button" value=" Calendar" id="calendarPick"/>  <!-- Core button to get calendar-->
		                       <input type="button" value=">>" id="nextDay"/>
							   <!-- DatePicker-->
                          </div>
						  
                         
						 <div class="form-group" id="train_dropdown1"><!-- Currency 1 dropdown (from), generated in js/currenciesList.js with function {generateSelectOption(selectedOption, i, spanID, textR)}--> 
                             <label for="sel1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From: </label>
                             <select class="form-control" id="sel1">
                             <option value="2200001">Киев</option>
                             <option value="2208001">Одесса</option>
                             <option value="2200120">Бердичев</option>
                             <option value="220020">Винница</option>
							 <option value="2200400">Житомир</option>
                             </select>
						 </div>
						  
						  <div class="form-group" id="train_dropdown2"> 
						      <label for="sel1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To: </label>
                             <select class="form-control" id="sel1">
                             <option value="2200001">Киев</option>
                             <option value="2208001" selected>Одесса</option>
                             <option value="2200120">Бердичев</option>
                             <option value="220020">Винница</option>
							 <option value="2200400">Житомир</option>
                             </select>
                          </div>
						  
                          <input id ="getTrain" type="button" class="btn btn-default fa fa-cc-visa" style="font-size:20px" value="OK">
						  
						  <br><br><br>
                      </form>
				   
			     </div> <!--END  <div class="col-sm-4 col-xs-12 myShadow mainX-->
				
				 
				 
				 <!-- JUST train image-->
				 <div class="col-sm-12 col-xs-12" id="">
				      <center>
				      <img src="images/train.jpg" style="width:50%;" alt="img"/>
					  </center>
				 </div>
				  
				  
				  
				  
				  <!----TRAIN Core result---->
				  <!-- This div accept the JS html result--><!--style='word-wrap: break-word;'--> 
				  <div class="col-sm-12 col-xs-12 myShadow" id="trainResult" > <!-- div calc exchange-->
				      <?php
					  
					       //$data_url = 'https://booking.uz.gov.ua/?from=2200120&to=2208001&date=2018-08-06&time=00%3A00&url=train-list';  //ukr
						     $data_url = 'https://booking.uz.gov.ua/en/?from=2200120&to=2208001&date=2018-07-27&time=00%3A00&url=train-list';  //eng
							 //$data_url = 'https://booking.uz.gov.ua/en/?from=2200001&to=2208001&date=2018-07-28&time=00%3A00&url=train-list';
						   //
						   // CURL // works on local, does not work on zzz.com
                           $curl = curl_init();
                           curl_setopt($curl, CURLOPT_URL, $data_url);
                           curl_setopt($curl, CURLOPT_POST, 1);
                           curl_setopt($curl, CURLOPT_POSTFIELDS, 0);    //problem was here // curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)))
                           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					
                           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                           $result = curl_exec($curl);
                           curl_close($curl);
                           $tokenInfo = json_decode($result, true);
	                       echo "<h2> train </h2>" . $result ;  //. " token" . $token
						   
						   //
						   // file_get_contents works on ZZZ, does not work on LOCAL
						    if (!$json = file_get_contents($data_url)) {
		                         echo "<br>Train php Error</br>";
	                        } else {
								echo $json;
							}
							
							
							
							
							
					  ?>
				  </div> <!-- END class="row trainResult">-->
				  <!----TRAIN Core result---->
				  
				  
				            <?php
				            //<div.*class=.search-error.*[\n]+.*?<\/div>
							echo "<br><br><h2> Preg match <h2>";
							if (preg_match_all( '/But/',  $result,   $response)) {  //'#^<div class="x-ic test">|</div>$#'  //  "/results/i"    //search-error
								echo "<h2> Tickets are OFF<h2>";
							} else {
								echo "<h2> Tickets are available<h2>";
							}
							
							
							echo "<br>Preg match response is " ;
							var_dump($response);
							
							//type of var 
							echo "<br><br>Curl result type==> ".gettype($result);
							echo "<br><br>file_get_contents result type==> ".gettype($result);
							
							
							// 
							echo "<br>TEST ".stripos($json, "No places in this direction");

							if (strpos($json, 'this direction') !== false) {
                             
                                echo "<h2> STPOS FOUND<h2>";
                             } else {
								 echo "<h2> NO STRPOS FOUND<h2>";
							 }
							 
							 
							
							//$json = file_get_contents($data_url);
							//echo "<script type='text/javascript'>alert('{$json}');</script>";
				            ?>
				  
				  
				  
				 
				 <!--<br><br><br><br><br><br><br><br><br><br><br>-->
				 <!-------------------------------FACEBOOK SHARE--------------------------------------->
				 <!-- my custom FB share-->
				 <!--
				 <div class="col-sm-12 col-xs-12 facebook>
				     
					 <center>
                         <a class="fb-share-button large" href="https://www.facebook.com/sharer/sharer.php?u=http://waze.zzz.com.ua/store_locator" target="_blank"><input type="button" value="MyShare" style="background:blue;padding:5px 20px 5px 20px;color:white;border-radius:20px;"/></a>
				    
					     <div class="fb-share-button large" 
                             data-href="=https://www.facebook.com/sharer/sharer.php?u=http://waze.zzz.com.ua/store_locator" 
                             data-layout="button_count">
                         </div>
					</center>
				 </div>--><!-- END <div class="col-sm-4 col-xs-12 facebook>-->
				 
                 <!-----------------------------END FACEBOOK SHARE--------------------------------------->                  
     
    	     </div><!-- /.container -->			  		
    	 </div><!-- /.wrapper -->
      <!--</div>-->   <!-- /.item -->
	  
	     <div style="height:277px;"></div><!-- just to press footer-->
                

       
		<!---------PAGE LOADER SPINNER START, visible while the page is loading, uses js/main_layout.js, css is in yii2_mine.css--------------->
	    <div id="overlay" class="col-sm-12 col-xs-12 myShadow">
		    <center>
		        <img src="images/spinner.gif" alt="" style="width:33%;"/>
			</center>
        </div>
        <!---------END PAGE LOADER SPINNER------------------------------------------------------------------------------------------------------>
	
	
	
		
		
		  <!-----Footer ---->
		        
				<div class="footer navbar-fixed-bottom "> <!--navbar-fixed-bottom  fixxes bootom problem-->
				    <!--Contact: --> <strong>dimmm931@gmail.com</strong><br>
					<?php  echo date("Y"); ?>
				</div>
		<!--END Footer ---->  
		
		
		
	
		
		
  
  
  
  
  
  
  
  
  
       <!-----------------  Button to change Style theme------------------------->
	   <input type="button" class="btn" value=">>" id="changeStyle" style="position:absolute;top:0px;left:0px;" title="click to change theme"/>
	   <!-----------------  Button to change Style theme------------------------->
  
      
	   <!-----------------  Button with info------------------------------------>
	   <!--data-toggle="modal" data-target="#myModalZ" is a Bootstrap trigger---->
	   <button data-toggle="modal" data-target="#myModalZ" class="btn" style="font-size:17px; position:absolute;top:0px;right:0px;" title="click to see info">
	       &nbsp;<i class="fa fa-info-circle"></i>&nbsp;
	   </button>    
	   <!-----------------  Button with info------------------------------------>
  
  
  
  
  
  
      <!-----------------  Modal window with info------------------------------>
      <div id="myModalZ" class="modal fade" role="dialog">
          <div class="modal-dialog">
          <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">About the Train tracker </h4>
                  </div>
                  <div class="modal-body">
				      <center>
				      <img src="http://www.thameslinkprogramme.co.uk/wp-content/uploads/2018/02/thameslink-class-700.jpg" style="width:90%;" alt="img"/><br><br><br>
                      <p>
					     Uses www.uz.gov.ua
					  </p>
					  </center>
                  </div>
                  <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>

         </div>
     </div>
      <!-----------------  END Modal window with info---------------------------->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
 <!----------------------- FB API  share---------------------->
 <center><br><br>
  
 <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<!--
  <div class="fb-share-button large" 
    data-href="=http://waze.zzz.com.ua/store_locator/" 
    data-layout="button_count">
  </div>
  -->
  <!----------------------- END FB API  share---------------------->

 <br>
 
 
 

 

</body>
</html>
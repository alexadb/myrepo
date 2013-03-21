
<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d4imdcvrvsso7n host=ec2-107-21-101-4.compute-1.amazonaws.com port=5432 user=awwcahtklxtuzy password=2A_Y4JoOaVtHqOL1tMeS6AgIHU sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
   echo "Database connection error."
   exit;
}
 
$result = pg_query($db, "SELECT statement goes here");
?>


<!DOCTYPE html>

<html lang="en">
	<head>
    	<title>TopChic: Daily Celebrity Fashion</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
    	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="css/bootstrap-responsive.css"/>
    	
    	<style>
    		body {
    			background-color:black;
    		}
    		
    		.addthis {
    			width: 68%;
    			margin: 0 auto;
    		}
    		
    		.heartbutton {
    			aligh: left;
    		}
    	</style>

    	 <!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="../assets/ico/favicon.png">
		
		<link rel="apple-touch-icon" href="upload/Mash-Photato-Icon.png" />
		<link rel="apple-touch-startup-image" href="upload/WelcomeScreen.png">
    	
    	<!-- ajax/jquery? -->
    	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    	<!-- firebase -->
    	<script src='https://cdn.firebase.com/v0/firebase.js'></script>
    	
    	
    	<!-- click counter -->
    	<!--Love/Hate buttons 
<br><span id="CountedLoves">0 Loves</span><br>
<button onclick="AddLoves()">Love</button>

<br><span id="CountedHates">0 Hates</span><br>
<button onclick="AddHates()">Hate</button> 
-->


    	<script>
			var myDataRef = new Firebase('https://sylvie-firebase.firebaseio.com/');
    		var lovesChildRef = new Firebase('https://sylvie-firebase.firebaseio.com/loves');
    		var hatesChildRef = new Firebase('https://sylvie-firebase.firebaseio.com/hates');
			
			function AddLoves(){
				myDataRef.once('value', function(snapshot) {
				var lovetotal = snapshot.val().loves;
				var hatetotal = snapshot.val().hates;
		  		lovetotal = lovetotal + 1;
		  		lovepercentage = parseInt(lovetotal/(lovetotal + hatetotal) * 100);
		  		hatepercentage = 100 - lovepercentage;
				document.getElementById('CountedLoves').innerHTML = lovepercentage + '%';
				lovesChildRef.set(lovetotal); 
				document.getElementById('CountedHates').innerHTML = hatepercentage + '%';
				});			
			}
			
			function AddHates(){
				myDataRef.once('value', function(snapshot) {
				var lovetotal = snapshot.val().loves;
				var hatetotal = snapshot.val().hates;
				hatetotal = hatetotal + 1;
				lovepercentage = parseInt(lovetotal/(lovetotal + hatetotal) * 100);
		  		hatepercentage = 100 - lovepercentage;
				document.getElementById('CountedHates').innerHTML = hatepercentage + '%';
				hatesChildRef.set(hatetotal);
				document.getElementById('CountedLoves').innerHTML = lovepercentage + '%';
				});	
			}
		</script>

<!-- need to add the numbers....store as number 
			function AddHates(){
				myDataRef.once('value', function(snapshot) {
				var hatetotal = snapshot.val().hates;
				hatetotal = hatetotal + 1;
				document.getElementById('CountedHates').innerHTML = hatetotal + ' Hates';
				hatesChildRef.set(hatetotal);
				
				var lovetotal = snapshot.val().loves;
				document.getElementById('CountedLoves').innerHTML = lovetotal + ' Loves';
				});	

->
		<!--	
				document.getElementById('CountedLoves').innerHTML = Loves + ' Loves';
 
			var lovesChildChildRef = lovesChildRef.push();
		newPushRef.set({loves: Loves});
		lovesChildRef.once('value', function(snapshot) {
			document.getElementById('CountedLoves').innerHTML = snapshot.val() + ' Loves';
			});  -->

<!--no need to do clicks + 1, instead add the click to another row, under column love (not hate in the database, add the rows together to get total loves or hates, divide by total number of rows to get percentage -->

    </head>
    
    <body>    
    	<div class="container-fluid">
    	<div class="row-fluid">
    	<div class="span12">
    		<img src="img/Kate-Middleton-Love-Hate-without-buttons.png" class="img-rounded" alt="Kate" usemap="#kate">
    		
    		<map name="kate">
    			<area shape="rect" coords="431, 630, 556, 730" href="http://www.amazon.com/Lilly-Pulitzer-Harmony-Sweater-Pointelle/dp/B007FO1E18/ref=sr_1_18?s=apparel&ie=UTF8&qid=1362276274&sr=1-18&keywords=navy+pointelle" alt="dress" title="navy dress" id="DRESS" class="mapping">
	    		<area shape="rect" coords="460, 945, 580, 1045" href="http://www.amazon.com/Vintage-Necklace-Yellow-Chain-Strand/dp/B00A7C4E7Q/ref=sr_1_55?ie=UTF8&qid=1362277051&sr=8-55&keywords=strand+bead+gold+necklace" alt="necklace" title="gold necklace" id="NECKLACE" class="mapping">
	    		<area shape="rect" coords="430, 1143, 550, 1243" href="http://www.amazon.com/American-Apparel-Skinny-Patent-Medium-Navy/dp/B007AW92JQ/ref=sr_1_18?ie=UTF8&qid=1362277292&sr=8-18&keywords=skinny+navy+belt" alt="belt" title="navy skinny belt" id="BELT" class="mapping">
				<area shape="rect" coords="629, 1427, 749, 1527" href="http://www.amazon.com/Bling-Jewelry-Princess-Middleton-Engagement/dp/B004IA6T4O/ref=sr_1_9?ie=UTF8&qid=1362277416&sr=8-9&keywords=kate+middleton+ring" alt="ring" title="ring" id="RING" class="mapping">
    		</map>

    	</div> <!--span12 -->
    	
    	<div class="row-fluid"> 
    	<div class="span12">
    	<div class="row-fluid">
			<div class="span3" style="text-align:center;vertical-align:middle">
			<input type = "image" img src="img/Heart-button.png" style="max-width:100%" onclick="AddLoves()">
			<br><span id="CountedLoves"></span><br>
			</div>
			
			<div class="span6"><img src="img/TopChicTitleCrop.png" style="vertical-align:middle"></div>
			
			<div class="span3" style="text-align:center; vertical-align:middle"> 
			<input type = "image" img src="img/Skull-button.png" style="max-width:100%" onclick="AddHates()">
			<br><span id="CountedHates" font-size="20"></span><br></div>
			
		</div><!--row-fluid -->
		</div><!--span12 -->
		</div><!--row-fluid -->
    	
    	</div> <!--row-fluid -->
     	</div> <!-- container-fluid -->
    <!-- <p><button class="btn btn-large btn-info" type="button"><img="img/29-heart@2x.png"></button></p> -->
	<!-- <i class="icon-search icon-thumbs-down"></i> -->



<!--	
style="vertical-align:middle
	<input type = "image" img src="img/Skull-button.png" border="2" style="border:2px solid black;max-width:100%;" onclick="AddHates()">

<form name="heartform" action="http://www.mydomain.com/myformhandler.cgi" method="POST">
	<div class="heartbutton">
	<input type="image" src="img/29-heart@2x.png" name="heart" id="heart" placeholder="Heart" width="60" height="60">
	</div>
	</form>
-->	
	

 <div class="addthis">
 <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5125e5f96cf3cbc7"></script>
<!-- AddThis Button END -->
 </div>
 
    	<script src="http://code.jquery.com/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    
    <!-- for responsive image mapping -->	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script src="jQuery-rwdImageMaps-master/jquery.rwdImageMaps.min.js"></script>
	<script>
		$(document).ready(function(e) {
			$('img[usemap]').rwdImageMaps();
			
			$('area').on('click', function() {
				alert($(this).attr('alt') + ' clicked');
			});
		});
	</script>
	
	<!--for popovers upon mouse click on the image maps -->
	<script>
	$('.mapping').mouseover(function() {
  	alert($(this).attr('id'));
	}).mouseout(function(){

	});  
	</script>
	
	<!--  
 alert('Mouseout....');   
	
	Hover over popup?
	$("td").hover(
  function () {
    $(this).addClass("hover");
  },
  function () {
    $(this).removeClass("hover");
  }
);
	 -->
  	
	</body>
</html>

 


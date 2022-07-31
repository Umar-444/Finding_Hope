<?php

require("functions/initi.php");

if (userloggedIn()) {

  $myUser ="";

if (isset($_SESSION['U_Email'])) {
     $myUser = $_SESSION['U_Email'];
       
}else {
   $myUser = $_COOKIE['U_Email'];
}

$sqlUser = "SELECT * FROM users WHERE U_Email = '{$myUser}' ";
$userResult = myQuery($sqlUser);
$userRow = myFetchArray($userResult); 

	
}
?> 

<!DOCTYPE html>
<html>

<?php  require("include/header.php"); ?> 

<body>


	<?php

require("include/menu.php");

?>

<!-- Header Box Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">CONTACT US</h1>
		</div>
		<div class="separator_auto"></div>

		
	</div>
</div>
<!-- Header Box End -->



<!-- Body Box Start -->

<?php

require("include/contactUs.php");


?>


<!-- Body Box End -->



<?php

require("include/footer.php");

require("include/jqueryLabs.php");
?>
	     <script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
  <script src="js/gmaps.min.js"></script>
  <script>
    var myMap = new GMaps({
                el: '.mape',
                lat: 34.0151,
                lng: 71.5249,
                scrollwheel: false,
                zoom: 15,
                zoomControl: true,
                panControl: true,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false,
                clickable: false,
                styles: [{'stylers': [{'hue': 'gray'}, {saturation: 0},
                            {gamma: 0.60}]}]
    });



    $('#messageForm').submit(function(evt) {
    	evt.preventDefault();
    	var messageData = $(this).serialize();

    	if (confirm("Are You Sure!")) {
    	$.post('process.php', messageData, function(getMessage){
    		alert(getMessage);
    		$('#messageForm')[0].reset();
    	});
    }

    });
  </script>


</body>
</html>
<?php  require("functions/initi.php"); 

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

<!-- Title Box -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto">
		<div>
			<h1 class="myHeaderTitle">our gallery</h1>
		</div>
		<div class="separator_auto"></div>
	</div>
</div>
<!-- Totle Box End -->


<div id="myBody">

	<div class="container">
		<h2 class="bodyTitle">Letest <span class="myColor">Uploads</span></h2>
		<div class="separator_leftColor"></div>
	</div>




	<?php
require("include/galleryAlbums.php");
?>



</div>



	<?php
require("include/footer.php");
require("include/jqueryLabs.php");

?>

</body>
</html>
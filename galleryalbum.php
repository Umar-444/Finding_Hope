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
			<h1 class="myHeaderTitle"><?php

if (isset($_GET['albumName'])) {
	echo $_GET['albumName'];
}
			?></h1>
		</div>
		<div class="separator_auto"></div>
	</div>
</div>
<!-- Totle Box End -->


<div id="myBody">

	<div class="container">
		<h2 class="bodyTitle">Album <span class="myColor">Image</span></h2>
		<div class="separator_leftColor"></div>
	</div>






	<div class="container" id="gallery">
		<div class="row">


				<?php

if (isset($_GET['albumId'])) {
	$albumId = $_GET['albumId'];
}
                	$myImages = getAlbumImages($albumId);

                	if (sizeof($myImages) > 0) {
                		
                		foreach ($myImages as $key => $row) {

                			?>
                       		

                       		<div class="col-md-4 ">
								
									<img src="admin/<?php echo $row['Img_ImgLoc']; ?>" class="img-fluid">

							
							</div>   
                                          
                                            
                                 
						<?php }}else {
							echo "Album Currently Empty";
						} ?>

                   
			
		</div>
	</div>


</div>




<div id="footer"> 
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center" id="followUs">
					<h2 class="footerTitle">Finding Hope</h2>
						<div class="separator_auto"></div>
						<div class="social-clicks">
			            <a href=""><i class="fa fa-facebook"></i></a>
			            <a href=""><i class="fa fa-twitter"></i></a>
			            <a href=""><i class="fa fa-instagram"></i></a>
			            <a href=""><i class="fa fa-google-plus"></i></a>
			            </div>
				</div>
				<div class="col-md-6 text-center" id="contactUs">
					<h2 class="footerTitle">Contact Us</h2>
						<div class="separator_auto"></div>
						<p>Monday-Sunday: 24/7 Report and Respond service | No Clossing</p>
						<p>CONTACT ME: 0315-2471993 / 091-2323060</p>
				</div>
			</div>
			<div class="text-center footerBorder">
				<h2 class="footerTitle">FindingHope.com</h2>
				<p>© Copyright All Rights Reserved</p>
			</div>
		</div>
</div>


	<?php
require("include/footer.php");
require("include/jqueryLabs.php");

?>

</body>
</html>
<?php require("functions/initi.php"); 

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

<?php require("include/menu.php"); ?>

<!-- Search BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">news</h1>
		</div>
		<div class="separator_auto"></div>

		
	</div>
</div>
<!-- Search BOx End -->

<div id="myBody">

	<div class="container">
		<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">View <span class="myColor">News</span></h2>
		<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
	</div>
			<div class="container newsBox" style="margin-top: 70px;">
			<div class="row">

			<div class="col-lg-12 mx-auto">
				<div class="row">
		                	<?php

		                	

		                    if(isset($_GET['news'])){
		                        $newsId = $_GET['news'];
		                    }
		                   
		                   $myNews = getNewsbyId($newsId);

		                	if (sizeof($myNews) > 0) {
		                		
		                		foreach ($myNews as $key => $row) {?>

									<div class="col-md-12 wow fadeInUp" data-wow-delay="1.0s" style="margin-bottom: 20px;">
						                <div class="blog-contents">
						                  <div class="case-details mx-auto">
						                  	 	<h2><?php echo $row['N_Title']; ?></h2>
						                  	 	<div class="separator_left"></div>
						                    <p class="case-text">Content: <em><?php echo $row['N_Content']; ?></em></p>
						                    <ol class="breadcrumb">
											 <li><p class="case-text">Date: <?php echo $row['N_Date']; ?></p></li>/
											 <li><p class="case-text">BY: Finding Hope</p></li>/
						                     </ol> 

<!-- 						                     <div class="text-center">
												<a href="watchNews.php?news=<?php echo $row['N_Id']; ?>" class="btn caseBtn hvr-bob">Read More!</a>
											</div> -->
						                  </div>

						                </div>
						            </div>
								<?php }}?>


				</div>
      
			</div>
		  </div>
		</div>

</div>







<?php

require("/footer.php");

require("include/jqueryLabs.php");
?>
</body>
</html>
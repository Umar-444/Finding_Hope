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

<!-- Header BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">OUR BLOG</h1>
		</div>
		<div class="separator_auto"></div>
	</div>
</div>
<!-- Header BOx End -->

<div id="myBody">

	<div class="container">
		<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">View Blog<span class="myColor"> Post</span></h2>
		<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
	</div>
</div>


<div class="container blogBox">
	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="row">
                	<?php

                	

                    if(isset($_GET['post'])){
                        $postId = $_GET['post'];
                    }


                	$myPost = getBlogPostbyId($postId);

                	if (sizeof($myPost) > 0) {
                		
                		foreach ($myPost as $key => $row) {?>

							<div class="col-md-12 wow fadeInUp" data-wow-delay="1.0s">
				                <div class="blog-contents">
				                  <div class="blog-img text-center">
				                    <img src="admin/<?php echo $row['B_FImage']; ?>" class="img-fluid">
				                  </div>
				                  <div class="case-details mx-auto">
				                  	 	<h2><?php echo $row['B_Title']; ?></h2>
				                  	 	<div class="separator_left"></div>
				                     <ol class="breadcrumb">

				                     	 <?php 
				                     	  $sql="SELECT AU_Name,AU_Email FROM admin_user WHERE AU_Id = '{$row['AU_Id']}'";
                                        $result = myQuery($sql);
                                        while ($myRow = myFetchArray($result)) {
                                            

                                             echo "<li><p class='case-text'>Written By: {$myRow['AU_Name']}</p></li>/";
                                              echo "<li><p class='case-text' style='text-transform:none;'>Email: {$myRow['AU_Email']}</p></li>/";
                                          
                                          
                                            
                                        }?>

				                        <li><p class="case-text">Date: <?php echo $row['B_Date']; ?></p></li>/
				                     </ol> 
				                    <p class="case-text">Content: <em><?php echo $row['B_Content']; ?></em></p>
<!-- 				                     <div class="text-center">
										<a href="watchPost.php?post=<?php echo $row['B_Id']; ?>" class="btn caseBtn hvr-bob">Read More!</a>
									</div> -->
				                  </div>

				                </div>
				            </div>
						<?php }} ?>

		</div>
       
  
	</div>
  </div>
</div>



<?php

require("include/footer.php");

require("include/jqueryLabs.php");
?>

</body>
</html>



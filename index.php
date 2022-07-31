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

<?php require("include/menu.php"); ?>

<!-- Search BOx Start -->
<?php require("include/searchBar.php"); ?>
<!-- Search BOx End -->


<div class="container dataBox">
	<div class="row">
	<div class="col-md-8">
			<div>
				<h2 class="bodyTitle">Current <span class="myColor">Cases</span></h2>
				<div class="separator_leftColor"></div>
			</div>
			<br>
		<div class="row">

                	<?php

                	$pre_page = 4;

                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = "";
                    }

                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }
                    else{
                        $page_1 = ($page * 4) - 4;
                    }

                    $caseCount = totalCases();
                    $caseCount = ceil($caseCount / $pre_page);


                	$myCases = getMissingCases($page_1, $pre_page);

                	if (sizeof($myCases) > 0) {
                		
                		foreach ($myCases as $key => $row) {?>


             <div class="col-md-12 wow fadeInUp" id="cases">
                <div class="case-contents">
                  <div class="case-img">
                    <img src="<?php echo $row['MC_ImageLoc']; ?>" class="img-fluid">
                  </div>
                  <div class="case-details wow">
                  	 	<h2><?php echo $row['MC_Name']; ?></h2>
                  	 	<div class="separator_left"></div>
                     <ol class="breadcrumb">
                        <li><p class="case-text">Age: <?php echo $row['MC_Age']; ?></p></li>/
                        <li><p class="case-text">Eye Color: <?php echo $row['MC_EyeColor']; ?></p></li>/
                        <li><p class="case-text">Hair Color: <?php echo $row['MC_HairColor']; ?></p></li>/
                        <li><p class="case-text">Mental Condition: <?php echo $row['MC_MHealth']; ?></p></li>/
                        <li><p class="case-text">Disability: <?php echo $row['MC_Disability']; ?></p></li>/
                        <li><p class="case-text">Identification Mark: <?php echo $row['MC_IdenMark']; ?></p></li>/
                        <li><p class="case-text">Province: <?php echo $row['P_Name']; ?></p></li>/
                        <li><p class="case-text">City: <?php echo $row['C_Name']; ?></p></li>/
                        <li><p class="case-text">District: <?php echo $row['D_Name']; ?></p></li>/
                        <li><p class="case-text">Currently: <?php echo $row['MC_CurrentStatus']; ?></p></li>/

                        <li><p class="case-text">Phone: <?php echo $row['MC_RPhone']; ?></p></li>/
 
                     </ol> 
                     <div class="row"> 
                     <div class="col-md-6"><p class="case-text"> Address 1: <?php echo $row['MC_RAddress1']; ?></em></p></div>
                     <div class="col-md-6"><p class="case-text"> Address 2: <?php echo $row['MC_RAddress2']; ?></em></p></div>
                     </div>

                    <p class="case-text">Other Info: <?php echo $row['MC_RCInfo'];?></em></p>
                    <p class="case-text">Submit By: x.imran99@yahoo.com</p>
                     <div class="text-center">
						<a href="viewCase.php?caseId=<?php echo $row['MC_Id']; ?>" class="hvr-bob btn caseBtn">View</a>
						<a href="finder.php?caseId=<?php echo $row['MC_Id']; ?>" class="hvr-bob btn caseBtn">Find/Seen</a>
					</div>
                  </div>

                </div>
            </div>

          	<?php }} ?>
		</div>

			
  				<ul class="pagination pagination-sm justify-content-center">
  	        <?php
            for ($i=1; $i <= $caseCount ; $i++) { 
                if ($i == $page) {
                	echo "<li class='page-item'><a class='page-link' style='padding:10px; background:#32CD32; color:#FFF; text-decoration:none;' href='index.php?page={$i}'>{$i}</a></li>";
                }else{
                echo "<li class='page-item'><a class'page-link' style='padding:10px; background: #333; color:#FFF; text-decoration:none;' href='index.php?page={$i}'>{$i}</a></li>";
                }
          	  }
			?>
			
  				</ul>        
        </ul>
	</div>

	<div class="col-md-4 newsBox">
			<div class="text-center">
				<h2 class="bodyTitle">Letest <span class="myColor">Announcement</span></h2>
				<div class="separator_autoColor"></div>
			</div>
			<br>
		<div class="announcment img-thumbnail col-sm-12" style="padding:20px;">
			<marquee direction='up' onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="2.5" style="">
			<?php
				$myNews = getNewsHeading();

		                	if (sizeof($myNews) > 0) {
		                		$sn=1;
		  		foreach ($myNews as $key => $row) {

		                echo "<a class='newsAn' href='watchNews.php?news={$row['N_Id']}'>$sn. {$row['N_Title']}.</a><br><br>";
		                $sn++;
		                	}
		                	
		                		}?>

		                	</marquee>
			
		</div>
		<br>
		<div class="col-sm-12">
<div class="fb-page" 
  data-tabs="timeline,events,messages"
  data-href="https://www.facebook.com/PakistanDefence"
  data-width="380" 
  data-hide-cover="false"></div>
		</div>
		
	</div>
</div>

</div>




<?php
require("include/footer.php");
require("include/jqueryLabs.php");
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>

</body>
</html>
<div class="container dataBox">
	<div class="row">
	<div class="col-md-12">
			<div>
				<h2 class="bodyTitle">Search <span class="myColor">Cases</span></h2>
				<div class="separator_leftColor"></div>
			</div>
			<br>
		<div class="row">

                	<?php

                        $name = "";
                        $age = "";
                        $city = "";
                        $province = "";

                    if(isset($_POST['searchCase'])){
                        $name = $_POST['searchName'];
                        $age = $_POST['searchAge'];
                        $city = $_POST['searchCity'];
                        $province = $_POST['searchPro'];
                    }
  


                	$myCases = getSearchCases($name, $age, $city, $province);

                	if (sizeof($myCases) > 0) {

                		
                		foreach ($myCases as $key => $row) {?>


             <div class="col-md-6 wow fadeInUp" id="cases" data-wow-delay='2.0s'>
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
                        <li><p class="case-text">Phone: <?php echo $row['MC_RPhone']; ?></p></li>/
 
                     </ol> 
                     <div class="row"> 
                     <div class="col-md-6"><p class="case-text"> Address 1: <?php echo $row['MC_RAddress1']; ?></em></p></div>
                     <div class="col-md-6"><p class="case-text"> Address 2: <?php echo $row['MC_RAddress2']; ?></em></p></div>
                     </div>

                    <p class="case-text">Other Info: <?php echo $row['MC_RCInfo'];?></em></p>
                    <p class="case-text">Submit By: x.imran99@yahoo.com</p>
                     <div class="text-center">
						<a href="#" class="hvr-bob btn caseBtn">View</a>
						<a href="finder.php?caseId=<?php echo $row['MC_Id']; ?>" class="hvr-bob btn caseBtn">Find/Seen</a>
					</div>
                  </div>

                </div>
            </div>

          	<?php }} ?>



		</div>

	
	</div>

</div>

</div>

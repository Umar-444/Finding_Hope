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

$myCaseId = 0;
if (isset($_GET['caseId'])) {
	$myCaseId = ($_GET['caseId']);
}
?>
<!-- Search BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto">
		<div>
			<h1 class="myHeaderTitle">Finder</h1>
		</div>
		<div class="separator_auto"></div>

		
	</div>
</div>
<!-- Search BOx End -->

<div id="myBody">
	<div class="container">
		<h2 class="bodyTitle">Enter <span class="myColor">Detail here</span></h2>
		<div class="separator_leftColor"></div>
<br>
		<div class="container">
			<form id="finderForm" action="process.php">
				<div class="row">
					<input type="hidden" name="insertFinder">
					<input type="hidden" name="mCaseId" id="mCaseId" value="<?php echo $myCaseId; ?>">
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Finder Name :</label>
    							<input type="text" class="form-control" name="finderName" placeholder="Enter Name">
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Finder Email:</label>
    							<input type="email" class="form-control" name="finderEmail"  placeholder="Enter Email">
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Finder Phone:</label>
    							<input type="text" class="form-control" name="finderPhone" placeholder="Enter Phone Number">
						  </div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
   							 <label>Region - Province :</label>
    							<select class="form-control" name="finderProvince">
    								<option value=''>Region - Province</option>
   							 	<?php
   							 	$sqlPro = "SELECT * FROM provinces";
   							 	$result = myQuery($sqlPro);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['P_Name']}'>{$row['P_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
						 
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>City :</label>
   							 <select class="form-control" name="finderCity">
   							 	<option value=''>City</option>
   							 	<?php
   							 	$sqlCity = "SELECT * FROM cities";
   							 	$result = myQuery($sqlCity);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['C_Name']}'>{$row['C_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>District :</label>
   							 <select class="form-control" name="finderDistrict">
   							 	<option value=''>District</option>
   							 	<?php
   							 	$sqlDis = "SELECT * FROM districts";
   							 	$result = myQuery($sqlDis);

   							 	while ($row = myFetchArray($result)) {
   							 		echo "<option value='{$row['D_Name']}'>{$row['D_Name']}</option>";
   							 	}

   							 	?>
   							 	
   							 </select>
						  </div>
						  
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Current Address:</label>
  								<textarea class="form-control" rows="2" name="finderAdd1"></textarea>
						 </div>	 
					</div>
					<div class="col-md-4">
						<div class="form-group">
   							 <label>Permenent Address:</label>
  								<textarea class="form-control" rows="2" name="finderAdd2"></textarea>
    							
						 </div>
					</div>
					<div class="col-md-12 mx-auto text-center">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-warning">Reset</button>
					</div>
				</div>
			</form>			
		</div>
	</div>
</div>





<?php
require("include/footer.php");
require("include/jqueryLabs.php");
?>
<script type="text/javascript">
             $(document).ready(function(){
          $("#finderForm").submit(function(evt){
                         evt.preventDefault();

                         var id = $("#mCaseId").val();
                         if (id != 0) {
                         	var url = $(this).attr('action');
                         	var finder = $(this).serialize();
                         	
                         	$.post(url, finder, function(finderData){
                         		if (!finderData.error) {
                         			alert(finderData);
                         			$('#finderForm')[0].reset();
                         			window.location = 'index.php';
                         		}
                         	});
                         }else{
                         	alert("Error Occured.")
                         }

               });
        });
</script>


</body>
</html>
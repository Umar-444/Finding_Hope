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

	
}else{
	redirect("login.php");
}

?> 

<!DOCTYPE html>
<html>
<?php  require("include/header.php"); ?> 

<body>


	<?php

require("include/menu.php");

?>
<!-- Search BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">User Cases</h1>
		</div>
		<div class="separator_auto"></div>

		
	</div>
</div>
<!-- Search BOx End -->

<div id="myBody">
	<div class="container">
		<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">User <span class="myColor">Cases</span></h2>
		<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
<br>
		<div class="col-lg-12">
 <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">S No</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Age</th>
      <th scope="col">Currently</th>
      <th scope="col">Reporter Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">If Found</th>
      <th scope="col">View</th>

    </tr>
  </thead>
  <tbody>
                  <?php

                  $myCases = getUserCases($userRow['U_Email']);

                  if (sizeof($myCases) > 0) {
                    
                    foreach ($myCases as $key => $row) {?>

    <tr>
     
       <td scope="col"><?php echo $row['MC_Id']; ?></td>
      <td scope="col"><?php echo $row['MC_Name']; ?></td>
      <td scope="col"><?php echo $row['MC_FName']; ?></td>
      <td scope="col"><?php echo $row['MC_Age']; ?></td>
      <td scope="col"><?php echo $row['MC_CurrentStatus']; ?></td>
      <td scope="col"><?php echo $row['MC_ReporterName']; ?></td>
      <td scope="col"><?php echo $row['MC_RPhone']; ?></td>
      <td scope="col"><?php echo $row['MC_CaseStatus']; ?></td>
      <td scope="col"><?php echo $row['MC_Date']; ?></td>
      <td class='text-center'>


        <?php 

        $cStatus = $row['MC_CurrentStatus'];
        if ($cStatus == 'Missing' ) {?>
       
                <Button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="if Found Then Click here" onclick='foundCase(<?php echo $row['MC_Id'];?>)'>Found</Button>
        
        <?php } else{ ?>
              <Button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="if Not Found Then Click Here." onclick='missCase(<?php echo $row['MC_Id'];?>)'>Missing</Button>

       <?php }  ?> 
          
           
</td>
 <td class='text-center'>
          <Button class="btn btn-info updateCase" data-toggle="modal" data-target="#myCaseUpdate" data-toggle="tooltip" data-placement="bottom" id="<?php echo $row['MC_Id'];?>" title="View & Update Case">View</Button>
         

</td>
    </tr>



            <?php }} ?>
  </tbody>
</table>		
		</div>
	</div>
</div>


  <!-- The Modal -->
  <div class="modal fade" id="myCaseUpdate">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Case Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="updateCaseForm" action="process.php" method="POST" enctype="multipart/form-data"> 
          <div class="form-group row">
            <label  class="col-sm-2 text-center col-form-label">Name:</label>
            <div class="col-sm-4">
              <input type="text" name="upCaseName" id="upCaseName" class="form-control"placeholder="Enter Name" required/>
            </div>

            <label  class="col-sm-2 text-center col-form-label">Father Name:</label>
            <div class="col-sm-4">
              <input type="text" name="upFName" id="upFName" class="form-control"placeholder="Enter Father" required/>
            </div>
          </div>
          <div class="form-group row">
                 <label class="col-sm-2 text-center col-form-label">Age :</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upAge" id="upAge" required/>
                  <option value=''>Age</option>
                  <?php 
                    for ($i=1; $i <=75 ; $i++) { 
                      echo "<option value='{$i}'>{$i}</option>";
                    }
                  ?>
                  
                 </select>
               </div>

                 <label class="col-sm-2 text-center col-form-label">Gender :</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upGender" id="upGender" required/>
                  
                  <option value=''>Gender</option>
                  <option value='Male'>Male</option>
                  <option value='Female'>Female</option>
                  
                 </select>
               </div>
              </div>

          <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Eye Color :</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upEyeColor" id="upEyeColor">
                  <option value=''>Eyes</option>
                  <option value='Blue'>Blue</option>
                  <option value='Hazal'>Hazal</option>
                  <option value='Green'>Green</option>
                  <option value='Brown'>Brown</option>
                  <option value='Black'>black</option>
                  
                 </select>
               </div>
                 <label class="col-sm-2 text-center col-form-label">Hair Color:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upHairColor" id="upHairColor">
                  <option value=''>Hair Color</option>
                  <option value='Dark Brown'>Dark Brown</option>
                  <option value='Brown'>Brown</option>
                  <option value='Blonde'>Blonde</option>
                  <option value='Black'>Black</option>
                  
                 </select>
               </div>
              </div>

             <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Mental Status:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upCaseMental" id="upCaseMental" required/>
                <option value=''>Mental Health</option>
                  <option value='Normal'>Normal</option>
                  <option value='Disturb'>Disturb</option>
                  
                 </select>
               </div>
                 <label class="col-sm-2 text-center col-form-label">Disablility:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upCaseDisability" id="upCaseDisability" required/>
                    <option value=''>Disability</option>
                  <option value='Yes'>Yes</option>
                  <option value='No'>No</option>
                  
                 </select>
               </div>
              </div>
              <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Mark (if any):</label>
                 <div class="col-sm-4">
  <input type="text" class="form-control" name="upCaseMark" id="upCaseMark" placeholder="Enter Mark (if Any)"> 
               </div>
                 <label class="col-sm-2 text-center col-form-label">Province:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upCasePro" id="upCasePro" required/>
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
              <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">City:</label>
                 <div class="col-sm-4">
                  <select class="form-control" name="upCaseCity" id="upCaseCity" required/>
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
                 <label class="col-sm-2 text-center col-form-label">District:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upCaseDis" id="upCaseDis" required>
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

            <div class="form-group row">
            <div class="col-sm-5 mx-auto">
              <img src="" id="currentCaseImg" class="img-fluid img-thumbnail">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-2 text-center col-form-label">New Image:</label>
            <div class="col-sm-10">
              <input type="file" name="upCaseImg" id="upCaseImg" class="form-control">
              <p id="imgError"></p>
            </div>
          </div>

          <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Reporter Name:</label>
                 <div class="col-sm-4">
                   <input type="text" name="upRepName" id="upRepName" class="form-control"placeholder="Reporter Name" required/>
  
               </div>
                 <label class="col-sm-2 text-center col-form-label">Relation:</label>
                 <div class="col-sm-4">
                 <select class="form-control" name="upRepRelation"  id="upRepRelation" required>
                  <option value=''>Relation</option>
                  <option value='Father'>Father</option>
                  <option value='Mother'>Mother</option>
                  <option value='Brother'>Brother</option>
                  <option value='Sister'>Sister</option>
                  <option value='Uncle'>Uncle</option>
                  <option value='Aunt'>Aunt</option>
                  <option value='Cousin'>Cousin</option>
                  <option value='Other'>Other</option>
                 </select>
               </div>
              </div>
          <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Phone:</label>
                 <div class="col-sm-4">
                   <input type="text" name="upRepPhone" id="upRepPhone" class="form-control"placeholder="Phone Number" required/>
  
               </div>
                 <label class="col-sm-2 text-center col-form-label">First Address:</label>
                 <div class="col-sm-4">
                    <textarea class="form-control" rows="2" name="upAdd1" id="upAdd1" placeholder="First Address"></textarea>
               </div>
              </div>

          <div class="form-group row">

                 <label class="col-sm-2 text-center col-form-label">Second Address:</label>
                 <div class="col-sm-4">
                    <textarea class="form-control" rows="2" name="upAdd2" id="upAdd2" placeholder="Second Address"></textarea>
  
               </div>
                 <label class="col-sm-2 text-center col-form-label">About Case:</label>
                 <div class="col-sm-4">
                    <textarea class="form-control" rows="2" name="upAboutCase" id="upAboutCase"></textarea>
               </div>
              </div>
                <input type="hidden" name="updateCase">
                <input type="hidden" name="upCaseId" id="upCaseId">
               <div class="form-group"> 
                   <div class="col-sm-12 text-center">
                       <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>

        </form>
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<?php
require("include/footer.php");

require("include/jqueryLabs.php");
?>
<script type="text/javascript" src="js/userCases.js"></script>

</body>
</html>
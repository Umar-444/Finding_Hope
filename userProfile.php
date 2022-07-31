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


	<?php  require("include/menu.php"); ?>


<!-- Search BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">User Profile</h1>
		</div>
		<div class="separator_auto"></div>

		
	</div>
</div>
<!-- Search BOx End -->

<div id="myBody">
	<div class="container">
		<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">User <span class="myColor">Profile</span></h2>
		<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
<br>
		<div class="container">
			<div class="col-lg-12">
                    <div class="row">
                      

                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-sm-6"><p><STRONG>Name:</STRONG> <?php echo $userRow['U_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Email:</STRONG> <?php echo $userRow['U_Email'];?></p></div>
                                <hr>
                                <div class="col-sm-6"><p><STRONG>Phone:</STRONG> <?php echo $userRow['U_Phone'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Province:</STRONG> <?php echo $userRow['P_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>City:</STRONG> <?php echo $userRow['C_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>District:</STRONG> <?php echo $userRow['D_Name'];?></p></div>
                                <div class="col-sm-12"><p><STRONG>Address:</STRONG> <?php echo $userRow['U_Address'];?></p></div>
                                
                                  <div class="col-sm-12 text-center">
                                    <br>
                                      <!-- Button to Open the Modal -->
                                       <button type="button" class="btn btn-success updateProfile" data-toggle="modal" data-target="#myProfileUpdate" id="<?php echo $userRow['User_Id'];?>">
                                        Edit Profile
                                      </button>
                                         <button type="button" class="btn btn-info changePassword" data-toggle="modal" data-target="#changePassword" id="<?php echo $userRow['User_Id'];?>">
                                        Change Password
                                      </button>
                                  </div>
                                  </div>
                                
                            </div>
                            <div class="col-md-5 thumbnail">
                              <img src="<?php echo $userRow['U_Image']; ?>" class="img-fluid img-thumbnail">
                            </div>
                            
                    
                    </div>
                </div>
		</div>
	</div>
</div>




 

  <!-- The Modal -->
  <div class="modal fade" id="myProfileUpdate">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="updateUserForm" action="process.php" method="POST" enctype="multipart/form-data"> 
          <div class="form-group row">
            <label  class="col-sm-2 text-center col-form-label">Name:</label>
            <div class="col-sm-4">
              <input type="text" name="upUserName" id="upUserName" class="form-control"placeholder="Enter Name" required/>
            </div>

            <label  class="col-sm-2 text-center col-form-label">Email:</label>
            <div class="col-sm-4">
              <input type="Email" name="upUserEmail" id="upUserEmail" class="form-control"placeholder="Enter Email" disabled required>
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-2 text-center col-form-label">Phone:</label>
            <div class="col-sm-4">
              <input type="text" name="upUserPhone" id="upUserPhone" class="form-control"placeholder="Enter Phone Number">
            </div>

            <label  class="col-sm-2 text-center col-form-label">Province:</label>
            <div class="col-sm-4">
              <select class="form-control" name="upUserPro" id="upUserPro">
                <option value="">Choose Province</option>
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
            <label  class="col-sm-2 text-center col-form-label">City:</label>
            <div class="col-sm-4">
            <select class="form-control" name="upUserCity" id="upUserCity">
                <option value="">Choose City</option>
             <?php
                  $sqlCity = "SELECT * FROM cities";
                  $result = myQuery($sqlCity);

                  while ($row = myFetchArray($result)) {
                    echo "<option value='{$row['C_Name']}'>{$row['C_Name']}</option>";
                  }

                  ?>
              </select>
            </div>

            <label  class="col-sm-2 text-center col-form-label">District:</label>
            <div class="col-sm-4">
           <select class="form-control" name="upUserDistrict" id="upUserDistrict">
                <option value="">Choose District</option>
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
            <label  class="col-sm-2 text-center col-form-label">Address:</label>
            <div class="col-sm-10">
              <textarea rows="1" class="form-control" name="upUserAdd" id="upUserAdd"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-5 mx-auto">
              <img src="" id="currentImg" class="img-fluid img-thumbnail">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-2 text-center col-form-label">New Image:</label>
            <div class="col-sm-10">
              <input type="file" name="upUserImg" id="upUserImg" class="form-control">
              <p id="imgError"></p>
            </div>
          </div>
 
          <div class="form-group row">
            <div class="col-sm-12 mx-auto text-center">
              <input type="hidden" name="userUpdate">

              <input type="hidden" name="updateGetId" id="updateGetId">
              <button type="Submit" class="btn btn-primary" id="updateButton" >Update</button>
            </div>
            <div class="col-sm-6" id="message">
              
            </div>
          </div>
        </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

  <!-- The Modal -->
  <div class="modal fade" id="changePassword">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="updateUserPassword" action="process.php" method="POST"> 
          <div class="form-group row">
            <label  class="col-sm-4 text-center col-form-label">Old Password:</label>
            <div class="col-sm-7">
              <input type="Password" name="oldPassword" id="oldPassword" class="form-control"placeholder="Old Password" required/>
            </div>
          </div>

         <div class="form-group row">
            <label  class="col-sm-4 text-center col-form-label">New Password:</label>
            <div class="col-sm-7">
              <input type="Password" name="newPassword" id="newPassword" class="form-control"placeholder="New Password" required/>
            </div>
          </div>
         <div class="form-group row">
            <label  class="col-sm-4 text-center col-form-label">Confirm Password:</label>
            <div class="col-sm-7">
              <input type="Password" name="newPasswordCon" id="newPasswordCon" class="form-control"placeholder="Confirm Password" required/>
            </div>
          </div>
    
 
          <div class="form-group row">
            <div class="col-sm-12 mx-auto text-center">
              <input type="hidden" name="passwordChange">

              <input type="hidden" name="updatePasswordId" value="<?php echo $userRow['User_Id'] ?>" ">
              <button type="Submit" class="btn btn-primary">Change Password</button>
            </div>
          </div>
        </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  





</div>


<?php
require("include/footer.php");

require("include/jqueryLabs.php");
?>
<script type="text/javascript" src="js/profile.js"></script>

</body>
</html>
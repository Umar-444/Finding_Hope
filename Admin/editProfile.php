<!DOCTYPE html>
<html lang="en">
<?php
require("include/head.php");

?>

<body>

    <div id="wrapper">

        <?php
        include("include/menu.php");
        ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Admin Profile
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Admin Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-12 ">
                            <div class="col-md-5 thumbnail">
                              <img src="<?php echo $adminRow['AU_Image']; ?>" class="img-responsive">

                            </div>
                            <div class="col-md-7">
                              <div class="col-md-12">
                                <h2>Admin Info</h2>
                              </div>
                                <div class="col-sm-6"><p><STRONG>Name:</STRONG> <?php echo $adminRow['AU_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Email:</STRONG> <?php echo $adminRow['AU_Email'];?></p></div>
                                <hr>
                                <div class="col-sm-6"><p><STRONG>Date of Birth:</STRONG> <?php echo $adminRow['AU_DOB'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Role:</STRONG> <?php echo $adminRow['AU_Role'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Provicne:</STRONG> <?php echo $adminRow['P_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>City:</STRONG> <?php echo $adminRow['C_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>District:</STRONG> <?php echo $adminRow['D_Name'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Address:</STRONG> <?php echo $adminRow['AU_Address'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Phone:</STRONG> <?php echo $adminRow['AU_Phone'];?></p></div>
                                <div class="col-sm-6"><p><STRONG>Account Status :</STRONG> <?php 


                                if($adminRow['AU_AcountStatus']== 1)
                                  {Echo "Active"; }
                                else{Echo "De-Active";}
                                  ?></p></div>

                                  <div class="col-sm-12 text-center">
                                     <button  class="btn btn-success updateProfile" id="<?php echo $adminRow['AU_Id']; ?>" data-toggle="modal" data-target="#editProfileModel" >Update</button>
                                      <button class="btn btn-warning" data-toggle="modal" data-target="#passModel">Change Password</button>
                                  </div>
                                
                            </div>
                            
                      </div>
                    </div>
                </div>


                          <div id="editProfileModel" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Profile</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="updateForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="updateMyAdmin">
                                        <input type="hidden" name="myUpdateId" value="<?php echo $adminRow['AU_Id']; ?>">
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Name:</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="adminName" name="adminName" placeholder="Enter Name" required/>
                                        </div>
                                        <label class="control-label col-sm-1">Email:</label>
                                        <div class="col-sm-4">
                                          <input type="email" class="form-control" id="adminEmail" name="adminEmail" disabled placeholder="Enter Email" required/>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">D/O/Birth:</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="adminDOB" name="adminDOB" placeholder="Enter Title" required/>
                                        </div>
                                        <label class="control-label col-sm-1">Phone:</label>
                                        <div class="col-sm-4">
                                          <input type="number" class="form-control" id="adminPhone" name="adminPhone" placeholder="Enter Title" required/>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Province:</label>
                                        <div class="col-sm-4"> 
                                          <select class="form-control" name="adminProvince" id="adminProvince">
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
                                        <label class="control-label col-sm-1">City :</label>
                                        <div class="col-sm-4"> 
                                          <select class="form-control" name="adminCity" id="adminCity">
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
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">District:</label>
                                        <div class="col-sm-4"> 
                                          <select class="form-control" name="adminDistrict" id="adminDistrict">
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
                                        <label class="control-label col-sm-1">Address:</label>
                                        <div class="col-sm-4"> 
                                          <textarea class="form-control " rows="2" id="adminAddress" name="adminAddress"></textarea>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">New Image:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control" id="adminImage" name="adminImage">
                                          
                                        </div>
                                        <label class="control-label col-sm-2">Current Image:</label>
                                        <div class="col-sm-3">
                                            <img src="" id="currentImg"  class="img-responsive thumbnail">
                                        </div>
                                      </div>
                                     
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                      </div>
                                    </form>                                 

                                    </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>


                            <div id="passModel" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Change Password</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="changePassword"  method="POST">
                                        <input type="hidden" name="myPass">
                                        <input type="hidden" name="changeId" value="<?php echo $adminRow['AU_Id']; ?>">
                                      <div class="form-group">
                                        <label class="control-label col-md-4">Old Password:</label>
                                        <div class="col-md-6">
                                          <input type="Password" class="form-control" name="oldPassword" placeholder="Old Password" required/> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-4">New Password:</label>
                                        <div class="col-sm-6">
                                          <input type="Password" class="form-control" name="newPassword" id="password1" placeholder="New Password" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-4">Confrom Password:</label>
                                        <div class="col-sm-6">
                                          <input type="Password" class="form-control" name="newPasswordConfirm" id="password2" placeholder="Confirm New Password" required/>
                                        </div>
                                      </div>

                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success">Change Password </button>
                                        </div>
                                      </div>
                                    </form>                                 
                                    </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/profile.js"></script>

  

</body>

</html>

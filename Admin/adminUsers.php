<!DOCTYPE html>
<html lang="en">

<?php
require("include/head.php");

if ($adminRow['AU_Role'] == 'Admin') {
  
  redirect('index.php');
}
?>

<body>

    <div id="wrapper">

        <?php
        require("include/menu.php");
        ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Manage Admins
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Admin Users
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12 text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px; "><i class="fa fa-pencil"></i> New User </button>
                        </div>
                        <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Admin User</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="newAdmin"  method="POST">
                                        <input type="hidden" name="createAdmin">
                                      <div class="form-group">
                                        <label class="control-label col-md-3">Name:</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control" name="adminName" placeholder="Enter Name" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Email:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="adminEmail" placeholder="Enter Email" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Password:</label>
                                        <div class="col-sm-8">
                                          <input type="Password" class="form-control" name="adminPassword1" id="password1" placeholder="Enter Password" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-md-3">Confirm-Password:</label>
                                        <div class="col-sm-8">
                                          <input type="Password" class="form-control" name="adminPassword2"
                                           placeholder="Confirm Password" id="password2" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-md-3">Phone</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="adminPhone"
                                           placeholder="Enter Phone" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">User Role:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" name="adminRole" required/>
                                              <option value="">Admin Role</option>
                                              <option value="Super Admin">Super Admin</option>
                                              <option value="Admin">Admin</option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success">Create</button>
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myCases" class="table table-bordered table-hover table-strip">
                                <thead>
                                    <tr>
                                        <th class="text-center">#No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Change Role</th>
                                        <th class="text-center" style="width:200px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="adminTable">


                                </tbody>
                            </table>
                        </div>
                    </div>
         <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/admin.js"></script>
      
  

</body>

</html>

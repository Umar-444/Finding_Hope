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

        <?php require("include/menu.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Themes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Themes
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="container text-center">
                        
                        
                        <div class="col-md-6" align="">
                             <div class="form">
                                  <form class="form-validate form-horizontal" id="themeForm" method="POST" action="process.php">
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-sm-4">Choose Theme <span class="required">*</span></label>
                                          <div class="col-sm-6">
                                          <select class="form-control" name="myTheme" id="myTheme">
                                          <option value="">Choose here</option>
                                                  <?php
                                                      $sql = "SELECT * FROM themes";
                                                      $result = myQuery($sql);
                                                      while ($row = myFetchArray($result)) {
                                                          $themeName = $row['T_Name'];
                                                          $themeFile = $row['T_File'];
                                                        ?>
                                                       <option value="<?php echo $themeFile;?>"><?php echo $themeName;?></option> 
                                                      <?php }
                                                  ?>
                                          </select>
                                          </div>
                                      </div>    
                                       <input type="hidden" name="changeTheme" />  
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                              <button class="btn btn-success" type="submit" name="changeTheme">Change</button>
                                              <button class="btn btn-default" type="reset">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
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
    <script src="js/main.js"></script>

</body>

</html>

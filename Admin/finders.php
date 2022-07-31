<!DOCTYPE html>
<html lang="en">
<?php
require("include/head.php");

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
                            Finders
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Finders
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

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
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center" style="width:200px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="finders">
    



                                </tbody>
                            </table>
                        </div>
                    </div>
         <!-- /.row -->
                    
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Case <em>(with details)</em></h4>
                          </div>
                          <div class="modal-body" id="viewCase">
                        
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
    <script src="js/main.js"></script>
    <script src="js/finder.js"></script>
</body>

</html>

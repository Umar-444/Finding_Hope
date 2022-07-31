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
                           News Section
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> News
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                        <div class="col-lg-12 text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px; ">New News</button>
                        </div>

                        <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Announce News</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" id="newsForm"  method="POST">
                                        <input type="hidden" name="insertNews">
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Title:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="newsTitle" placeholder="Enter Title" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" name="newsStatus" required>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Draft">Draft</option>
                                          </select>
                                         
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">News Content:</label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control " rows="5" name="newsContent" required></textarea>
                                          
                                        </div>
                                      </div>   
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success">Submit</button>
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
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Content</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center" style="width:150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="newsTable">
    



                                </tbody>
                            </table>
                        </div>
                    </div>
         <!-- /.row -->
  <div id="myModalUpdate" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update News</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" id="newsUpdateForm"  method="POST">
                                        <input type="hidden" name="newsUpdate">
                                        <input type="hidden" name="myUpdateId" id="myUpdateId">
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Title:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="myNewsTitle" name="newsUpTitle" placeholder="Enter Title" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" id="myNewsStatus" name="newsUpStatus" required>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Draft">Draft</option>
                                          </select>
                                         
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">News Content:</label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control " rows="5" name="newsUpContent" id="myNewsContent" required></textarea>
                                          
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
    <script src="js/news.js"></script>


  

</body>

</html>

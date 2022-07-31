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
                           Manage Blog
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Blog
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                        <div class="col-lg-12 text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px; "><i class="fa fa-pencil"></i> Create Post</button>
                        </div>

                         <!-- Blog Post Modal-->

                        <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Create Post</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="blogForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="postSubmit">
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Title:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="postTitle" placeholder="Enter Title" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" name="postStatus" required/>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Draft">Draft</option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Feature Image:</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="blogImg" name="postImg" required/>
                                          <p id="imgError"></p>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Post Content:</label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control " rows="5" name="postContent" required></textarea>
                                          
                                        </div>
                                      </div>

                                     
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success" >Create</button>
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

                            <!-- Blog Post Modal-->

                <div class="row">
                    <div class="col-lg-12">
                      <!-- Blog Data Table-->
                        <div class="table-responsive">
                            <table id="myCases" class="table table-bordered table-hover table-strip">
                                <thead>
                                    <tr>
                                        <th class="text-center">#No</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Content</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center" style="width:160px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="blogTable">


                                </tbody>
                            </table>
                        </div>
                        <!-- Blog Data Table-->
                    </div>
         <!-- /.row -->


                        <!-- Blog Post View and Update Modal-->
                        <div id="myModalUpdate" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">View & Update Post</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="blogUpdateForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="postUpdate">
                                        <input type="hidden" name="myUpdateId" id="myUpdateId">
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Title:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="myTitle" name="postUpTitle" placeholder="Enter Title" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" id="myStatus" name="postUpStatus" required/>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Draft">Draft</option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">Current Image:</label>
                                        <div class="col-sm-8">
                                          <img src="" id="currentImg" class="img-responsive thumbnail"> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2">New Image:</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="postUpImg" name="postUpImg">
                                          <p id="imgUpError"></p>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Post Content:</label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control" id="myContent" rows="5" name="postUpContent" required></textarea>
                                          
                                        </div>
                                      </div>

                                     
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="js/blog.js"></script>


  

</body>

</html>

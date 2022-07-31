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
                           Manage Gallery
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Gallery
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                        <div class="col-lg-12 text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px; "><i class="fa fa-pencil"></i> Create Album</button>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#myModalImage" style="margin-bottom:10px; "><i class="fa fa-picture-o"></i>  Add Image</button>


                        </div>


                     

                        <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Create Album</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="albumForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="albumCreate">
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Name:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="albumName" placeholder="Enter Album Name" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Sub-Heading:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="albumSub" placeholder="Enter Sub-Heading" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" name="albumStatus" required/>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Un-Published">Un-Published</option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Feature Image:</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="albumImg" name="albumImg" required/>
                                          <p id="imgError"></p>
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


                        <div id="myModalImage" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Album Image</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="albumImageForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="addImage">
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Choose Album:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" name="imageAlbum" required/>
                                              <option value="">Choose Album</option>
                                           <?php
                                             $sqlAlbum = "SELECT * FROM gallery_album";
                                              $result = myQuery($sqlAlbum);

                                              while ($row = myFetchArray($result)) {
                                                echo "<option value='{$row['GA_Id']}'>{$row['GA_Name']}</option>";
                                              }

                                             ?>
                                          </select>
                                        
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Select Image:</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="imgAlbum" name="imgAlbum" required/>
                                          <p id="imgAlbumError"></p>
                                        </div>
                                      </div>

                                     
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success" >Add Image</button>
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
                                        <th class="text-center">Total-Images</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                        
                                        <th class="text-center" style="width:200px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="galleryTable">


                                </tbody>
                            </table>
                        </div>
                    </div>
         <!-- /.row -->



                        <div id="myModalUpdate" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Album</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" action="process.php" id="updateAlbumForm"  method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="albumUpdate">
                                        <input type="hidden" name="albumUpdateId" id="albumUpdateId">
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Name:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="upAlbumName" id="upAlbumName" placeholder="Enter Album Name" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Sub-Heading:</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="upAlbumSub" name="upAlbumSub" placeholder="Enter Sub-Heading" required/>
                                          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Status:</label>
                                        <div class="col-sm-8"> 
                                          <select class="form-control" id="upAlbumStatus" name="upAlbumStatus" required/>
                                              <option value="">Choose Status</option>
                                              <option value="Published">Published</option>
                                              <option value="Un-Published">Un-Published</option>
                                          </select>
                                        
                                        </div>
                                      </div>
                                     <div class="form-group">
                                        <label class="control-label col-sm-3">Current Image:</label>
                                        <div class="col-sm-8">
                                         <img src="" id="currentAlbumImg" class="img-responsive">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3">Feature Image:</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="upAlbumImg" name="upAlbumImg">
                                          <p id="imgUpError"></p>
                                        </div>
                                      </div>

                                     
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success" >Update</button>
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
    <script src="js/gallery.js"></script>


  

</body>

</html>

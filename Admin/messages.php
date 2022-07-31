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
        include("include/menu.php");
        ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Messages Section
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Messages
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
                                        <th class="text-center">Sender</th>
                                        <th class="text-center">Sender Email</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Reply-Status</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center" style="width:100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="blogTable">


                                </tbody>
                            </table>
                        </div>
                    </div>
         <!-- /.row -->




                    
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Message <em>(With Details)</em></h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="col-sm-4">
                                    <label>Sender Name:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <p id="senderName"></p>
                                  </div>
                                </div>
                               <div class="col-md-12">
                                  <div class="col-sm-4">
                                    <label>Sender Email:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <p id="senderEmail"></p>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="col-sm-4">
                                    <label>Sender Subject:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <p id="subject"></p>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="col-sm-4">
                                    <label>Sender Message:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <p id="message"></p>
                                  </div>
                                </div>
                                <div class="col-md-12" id="replyText">
                                  <div class="col-sm-4">
                                    <label>Message Reply:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <p id="messageReply"></p>
                                  </div>
                                </div>
                               <div class="col-md-12" id="replyForm">
                                  <div class="col-sm-4">
                                    <label>Reply:</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <form id="messageReplyForm" method="POST">
                                       <div class="form-group">   
                                          <input type="hidden" name="myMessageReply">
                                          <input type="hidden" name="replyId" id="replyId">
                                          <textarea class="form-control " rows="3" name="replyMessage" required></textarea>
                                      </div>
                                      <div class="form-group"> 
                                        <div class="col-sm-12 text-center">
                                          <button type="submit" class="btn btn-success">Reply</button>
                                        </div>
                                      </div>
                                      </form>
                                  </div>
                                </div>
                            </div>
                        
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
    <!-- <script src="js/message.js"></script> -->

<script type="text/javascript">
  


        $('#messageReplyForm').submit(function(evt){
          evt.preventDefault();
              replyData = $(this).serialize();
              $.post("process.php", replyData, function(reply){
                alert(reply);
                $("#myModal").modal('toggle');
              });
        });



    setInterval(function(){
    fetchMessages();
   },1500);
    
        function fetchMessages(){
            $.ajax({
                    url: 'fetchMessages.php',

                    type: 'POST',

                    success:function(messageData){

                    if(!messageData.error) {

                    $('#blogTable').html(messageData);
                    }
                }
             });
            }

  
        function deleteMessage(id){

       var deleteMessage = 'deleteMessage';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteMessage: deleteMessage}, function(deleteReturn) {
            alert(deleteReturn);


        });

        }
      }



       $(document).ready(function() {

      
      $(document).on('click', '.getMessage', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchviewMessage.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
             $('#senderName').html(getData.S_Name);
               $('#senderEmail').html(getData.S_Email);
                $('#subject').html(getData.S_Subject);
                $('#message').html(getData.S_Message);
                
               

                if (getData.R_Status == "Un-Replied") {

                  $('#replyText').hide();
                  $('#replyForm').show();
                  $('#replyId').val(getData.M_Id);
                  
                }

                else if (getData.R_Status == "Replied") {
                  $('#replyForm').hide();
                  $('#replyText').show();
                   $('#messageReply').html(getData.M_Reply);
                }
              $('#myModal').modal('show');

            }
          });
      });
    });



</script>

  

</body>

</html>

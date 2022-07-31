


    setInterval(function(){
    fetchPost();
   },1500);
    
        function fetchPost(){
            $.ajax({
                    url: 'fetchBlog.php',

                    type: 'POST',

                    success:function(blogData){

                    if(!blogData.error) {

                    $('#blogTable').html(blogData);
                    }
                }
             });
            }

  

         $(document).ready(function(){

            $("#blogForm").submit(function(evt){
                    evt.preventDefault();

                    var status = false;
                    var img = $("#blogImg").val();
                  if (validate(img) == true) {
                      $("#imgError").html("<span>Accept Only JPG, Jpeg, Png</span>");
                      status = false;
                    }
                    else{
                      $("#imgError").html("<span></span>");
                      status = true;
                    }


if (status == true) {

                    var url = $(this).attr('action');
                     $.ajax({

                        url,
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data){
                        if (!data.error) {
                            alert(data);
                                $('#blogForm')[0].reset();
                                $("#myModal").modal('toggle');

                        }
                      }
                }); 
          }
            });




            $("#blogUpdateForm").submit(function(evt){
                    evt.preventDefault();

                    var status = false;
                    var upImg = $("#postUpImg").val();
                  
                    if (upImg.length == 0) {
                       $("#imgUpError").html("<span></span>");
                      status = true;
                    }
                  else if (validateUpdate(upImg) == true) {
                      $("#imgUpError").html("<span>Accept Only JPG, Jpeg, Png</span>");
                      status = false;
                    }
                    else{
                      $("#imgUpError").html("<span></span>");
                      status = true;
                    }


if (status == true) {

                    var url = $(this).attr('action');
                     $.ajax({

                        url,
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(updateData){
                        if (!updateData.error) {
                            alert(updateData);
                                 $("#postUpImg").val("");
$("#myModalUpdate").modal('toggle');
                        }
                      }
                }); 
          }
            });











        });




    function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#blogImg").val("");
        return true;
    }
  }



    function validateUpdate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#postUpImg").val("");
        return true;
    }
  }





        function publishedPost(id){

       var blogStatus = 'Published Post';
  if (confirm("Are you sure?")){
        $.post('process.php', {id: id, blogStatus: blogStatus}, function(publishedPost) {
            // $('').html(varifeid);
            alert(publishedPost);

        });

        }
      }



        function draftPost(id){


      var blogStatus = 'Draft Post';
  
     if(confirm("Are you sure?")){

        $.post('process.php', {id: id, blogStatus: blogStatus}, function(draftPost) {
            // $('').html(varifeid);
            alert(draftPost);

        });
      }

        }


        function deletePost(id){

       var deletePost = 'deletePost';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deletePost: deletePost}, function(deletePost) {
            // $('').html(varifeid);
            alert(deletePost);


        });

        }
      }



       $(document).ready(function() {

      
      $(document).on('click', '.getPost', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchBlogPost.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
              $('#myUpdateId').val(getData.B_Id)
             $('#myTitle').val(getData.B_Title);
               $('#myStatus').val(getData.B_Status);
               $('#currentImg').attr('src',getData.B_FImage);
                $('#myContent').val(getData.B_Content);
               
              $('$myModalUpdate').modal('show');

            }
          });
      });
    });










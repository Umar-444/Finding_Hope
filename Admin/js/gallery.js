

    setInterval(function(){
    fetchGallery();
   },1500);
    
        function fetchGallery(){
            $.ajax({
                    url: 'fetchAlbum.php',

                    type: 'POST',

                    success:function(galleryData){

                    if(!galleryData.error) {

                    $('#galleryTable').html(galleryData);
                    }
                }
             });
            }

  

         $(document).ready(function(){

            $("#albumForm").submit(function(evt){
                    evt.preventDefault();

                    var status = false;
                    var img = $("#albumImg").val();
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
                                $('#albumForm')[0].reset();
                        }
                      }
                }); 
          }
            });




            $("#albumImageForm").submit(function(evt){
                    evt.preventDefault();

                    var status = false;
                    var imgAlbum = $("#imgAlbum").val();

                  if (validateUpdate(imgAlbum) == true) {
                      $("#imgAlbumError").html("<span>Accept Only JPG, Jpeg, Png</span>");
                      status = false;
                    }
                    else{
                      $("#imgAlbumError").html("<span></span>");
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
                        success:function(addAlbumImage){
                        if (!addAlbumImage.error) {
                            alert(addAlbumImage);
                                 $("#imgAlbum").val("");
                          $("#myModalImage").modal('toggle');
                        }
                      }
                }); 
          }
            });




                      $("#updateAlbumForm").submit(function(evt){
                    evt.preventDefault();

                    var status = false;
                    var img = $("#upAlbumImg").val();
                 if (img == '') {
                      $("#imgUpError").html("<span></span>");
                      status = true;
                    }
                  else if (validateAlbum(img) == true) {
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
                        success:function(data){
                        if (!data.error) {
                            alert(data);
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
        $("#albumImg").val("");
        return true;
    }
  }



    function validateUpdate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#imgAlbum").val("");
        return true;
    }
  }

      function validateAlbum(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#upAlbumImg").val("");
        return true;
    }
  }






        function publishedAlbum(id){

       var albumStatus = 'Published Album';
  if (confirm("Are you sure?")){
        $.post('process.php', {id: id, albumStatus: albumStatus}, function(publishedAlbum) {
            // $('').html(varifeid);
            alert(publishedAlbum);

        });

        }
      }



        function unpublishedAlbum(id){


      var albumStatus = 'Un-Published Album';
  
      confirm("Are you sure?");

        $.post('process.php', {id: id, albumStatus: albumStatus}, function(UnPublishedAlbum) {
            // $('').html(varifeid);
            alert(UnPublishedAlbum);

        });

        }


        function deleteAlbum(id){

       var deleteAlbum = 'deleteAlbum';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteAlbum: deleteAlbum}, function(deleteAlbum) {
            // $('').html(varifeid);
            alert(deleteAlbum);


        });

        }
      }



       $(document).ready(function() {

      
      $(document).on('click', '.getAlbum', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchGalleryAlbum.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
              $('#albumUpdateId').val(getData.GA_Id)
             $('#upAlbumName').val(getData.GA_Name);
               $('#upAlbumSub').val(getData.GA_SubHeading);
               $('#upAlbumStatus').val(getData.GA_Status);
               $('#currentAlbumImg').attr('src',getData.GA_FImage);fvc
               
              $('$myModalUpdate').modal('show');

            }
          });
      });
    });



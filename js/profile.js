

    $("#updateUserPassword").submit(function(evt){
      evt.preventDefault();


      var url = $(this).attr('action');
      var pass1 = $('#newPassword').val();
      var pass2 = $('#newPasswordCon').val();
      if (pass1 == pass2) {
      var passData = $(this).serialize();

      $.post(url, passData, function(changePassword){

        if (!changePassword.error) {
          alert(changePassword);
          $('#updateUserPassword')[0].reset();
          $('#changePassword').modal('toggle');
        }

      });
    }else{
      alert("New Password Didn't Match With Confirm Password.");
    }
    });



    $(document).ready(function() {
      
      $(document).on('click', '.updateProfile', function(){
          var updateId = $(this).attr('id');
          $.ajax({
            url: 'fetchUserData.php',
            method: 'POST',
            data: {updateId:updateId},
            dataType: 'json',
            success:function(getData){
               $('#upUserName').val(getData.U_Name);
                $('#upUserEmail').val(getData.U_Email);
                $('#upUserPhone').val(getData.U_Phone);
                $('#upUserPro').val(getData.P_Name);
                $('#upUserCity').val(getData.C_Name);
                $('#upUserDistrict').val(getData.D_Name);
                $('#upUserAdd').val(getData.U_Address);
                $('#updateGetId').val(getData.User_Id);
                $('#currentImg').attr('src',getData.U_Image);
               $('#myProfileUpdate').modal('show');
            }
          });
      });
    });



    $('#updateUserForm').submit(function(evt){
      evt.preventDefault();

                    var status = false;
                    var upImg = $("#upUserImg").val();
                  
                    if (upImg.length == 0) {
                       $("#imgError").html("<span></span>");
                      status = true;
                    }
                  else if (validate(upImg) == true) {
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
                        success:function(updateData){
                        if (!updateData.error) {
                            alert(updateData);
                            $("#myProfileUpdate").modal('toggle');
                            
                             window.location ="userProfile.php";
                          
                        }
                      }
     }); 
  }
});




    function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#upUserImg").val("");
        return true;
    	}
	}
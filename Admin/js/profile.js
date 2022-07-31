
    $("#changePassword").submit(function(evt){
      evt.preventDefault();


      var url = $(this).attr('action');
      var pass1 = $('#password1').val();
      var pass2 = $('#password2').val();
      if (pass1 == pass2) {
      var passData = $(this).serialize();

      $.post(url, passData, function(changePassword){

        if (!changePassword.error) {
          alert(changePassword);
          $('#changePassword')[0].reset();
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
            url: 'fetchAdminData.php',
            method: 'POST',
            data: {updateId:updateId},
            dataType: 'json',
            success:function(getData){
               $('#adminName').val(getData.AU_Name);
                $('#adminEmail').val(getData.AU_Email);
                $('#adminDOB').val(getData.AU_DOB);
                $('#adminPhone').val(getData.AU_Phone);
                $('#adminProvince').val(getData.P_Name);
                $('#adminCity').val(getData.C_Name);
                $('#adminDistrict').val(getData.D_Name);
                $('#adminAddress').val(getData.AU_Address);
                $('#currentImg').attr('src',getData.AU_Image);
               $('#editProfileModel').modal('show');
            }
          });
      });
    });



$('#updateForm').submit(function(evt){
      evt.preventDefault();
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
                            $("#editProfileModel").modal('toggle');
                            
                             window.location ="editProfile.php";
                          
                        }
                      }
     }); 
});
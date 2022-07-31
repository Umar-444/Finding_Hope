


    $(document).ready(function() {
      
      $(document).on('click', '.updateCase', function(){
          var updateId = $(this).attr('id');
          $.ajax({
            url: 'fetchUserCases.php',
            method: 'POST',
            data: {updateId:updateId},
            dataType: 'json',
            success:function(getData){
               $('#upCaseName').val(getData.MC_Name);
                $('#upFName').val(getData.MC_FName);
                $('#upAge').val(getData.MC_Age);
                $('#upGender').val(getData.MC_Gender);
                $('#upEyeColor').val(getData.MC_EyeColor);
                $('#upHairColor').val(getData.MC_HairColor);
                $('#upCaseMental').val(getData.MC_MHealth);
                $('#upCaseDisability').val(getData.MC_Disability);
                $('#upCaseMark').val(getData.MC_IdenMark);
                $('#upCasePro').val(getData.P_Name);
                $('#upCaseCity').val(getData.C_Name);
                $('#upCaseDis').val(getData.D_Name);
               $('#upRepName').val(getData.MC_ReporterName);
                $('#upRepRelation').val(getData.MC_RRelation);
                $('#upRepPhone').val(getData.MC_RPhone);
                $('#upAdd1').val(getData.MC_RAddress1);
                $('#upAdd2').val(getData.MC_RAddress2);
                $('#upAboutCase').val(getData.MC_RCInfo);
                $('#upCaseId').val(getData.MC_Id);
                
                $('#currentCaseImg').attr('src',getData.MC_ImageLoc);
               $('#myCaseUpdate').modal('show');
            }
          });
      });
    });




  function foundCase(id) {
            

       var currentStatus = 'Found';
  
      if(confirm("Are you sure?")){
        $.post('process.php', {id: id, currentStatus: currentStatus}, function(found) {
            alert(found);
            window.location = 'userCases.php';

        });

    }
        

  }

    function missCase(id) {
            

       var currentStatus = 'Missing';
  
      if(confirm("Are you sure?")){
        $.post('process.php', {id: id, currentStatus: currentStatus}, function(missing) {
            alert(missing);
            window.location = 'userCases.php';

        });

    }
        

  }




    $('#updateCaseForm').submit(function(evt){
      evt.preventDefault();

                    var status = false;
                    var upImg = $("#upCaseImg").val();
                  
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
                            $("#updateUserCase").modal('toggle');
                            
                             window.location ="userCases.php";
                          
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
        $("#upCaseImg").val("");
        return true;
      }
  }


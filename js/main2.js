
     $(document).ready(function(){
         $("#loginForm").submit(function(evt){        
          evt.preventDefault();

          var loginUser  = "loginUser";
          var uEmail     = $("#userEmail").val();
          var uPassword  = $("#userPassword").val();
          var remMe      = "";
          var status = false
          
          if ($("#remMe").is(':checked')) {
                 remMe = "RemmemberMe";
            }

          
          if (uEmail == "") {
            
            $("#e_error").html("<span>Please enter the Email.</span>");
            status = false;
          }else{
           
            $("#e_error").html("<span></span>");
            status = true;
          }

          if (uPassword == "") {
         
            $("#p_error").html("<span>please enter the Password.</span>");
            status = false;
          }else{
            
            $("#p_error").html("<span></span>");
            status = true;
          }



           if (status == true) { 

            $.post("userCheck.php", {loginUser: loginUser, uEmail: uEmail, uPassword: uPassword, remMe: remMe}, function(userConfirmation){
                if (userConfirmation == 1) {
                   window.location ="reportcase.php";
                }else{
                    $('#error').html(userConfirmation);
                }

             
            });
        }
           
        });  
    });
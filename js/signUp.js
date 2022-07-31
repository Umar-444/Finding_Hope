		    $(document).ready(function(){
         $("#signUpForm").submit(function(evt){        
          evt.preventDefault();
          

          var userName         = $("#userName").val();
          var userEmail        = $("#userEmail").val();
          var userPassword     = $("#userPass").val();
          var userPasswordCon  = $("#userPass2").val();
          
          var status = false
 
          
          if (userName == "") {
            
            $("#n_error").html("<span>Please enter the Name.</span>");
            status = false;
          }else{
           
            $("#n_error").html("<span></span>");
            status = true;
          }

          if (userEmail == "") {
            
            $("#e_error").html("<span>Please enter the Email.</span>");
            status = false;
          }else{
           
            $("#e_error").html("<span></span>");
            status = true;
          }
          if (userPassword == "") {
         
            $("#p_error").html("<span>please enter the Password.</span>");
            status = false;
          }else{
            
            $("#p_error").html("<span></span>");
            status = true;
          }

           if (userPasswordCon == "") {
         
            $("#p_error2").html("<span>please enter the Confirm Password.</span>");
            status = false;
          }else{
            
            $("#p_error2").html("<span></span>");
            status = true;
          }

        if (status == true) { 
        		 var userSignUpData = $(this).serialize();
           		 $.post("signUpPro.php", userSignUpData, function(userConfirmation){
                if (!userConfirmation.error) {
                    alert(userConfirmation);
                   $('#signUpForm')[0].reset();
                   
                }
            });
        }
           
        });  
    });
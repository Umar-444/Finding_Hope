  $("#adminLoginForm").submit(function(evt){
            evt.preventDefault();
            var loginAdmin = "loginAdmin";
            var email = $("#adminEmail").val();
            var password = $("#adminPassword").val();
            var remMe    = "";
            var status  = false;


            if ($("#remMe").is(':checked')) {
                 remMe = "RemmemberMe";
            }else{
              remMe = "";
            }

               if (email == "") {
            
            $("#emailError").html("<span>Email Required!.</span>");
            status = false;
          }else{
           
            $("#emailError").html("<span></span>");
            status = true;
          }

          if (password == "") {
            
            $("#passError").html("<span>Password Required!.</span>");
            status = false;
          }else{
           
            $("#passError").html("<span></span>");
            status = true;
          }

if (status == true) {

    $.post("loginProcess.php", {loginAdmin: loginAdmin, email: email, password: password, remMe: remMe}, function(loginReturn){
      
            if (loginReturn == 1) {
                window.location = 'index.php';
            }else{

            $("#error").html(loginReturn);
        }
        

    });
}
        
        });
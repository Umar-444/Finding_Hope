<?php

include("functions/initi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Finding Hope | Admin Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <?php    

     $sql = "SELECT * FROM themes WHERE T_Status = 'Selected' ";
    $result = myQuery($sql);
    $row = myFetchArray($result);
    $themeCss = $row['T_File'];
    ?>
    <!-- Custom CSS -->
    <link href="css/<?php echo $themeCss; ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

</head>

<body>

    


            <div class="container">
                        <form class="adminLoginForm" id="adminLoginForm" method="POST">
                            <div>
                                <h3>Admin Login</h3>

                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter Email">
                                <div style="color: #fff; margin-top: 3px;" id="emailError"></div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter Password">
                               <div style="color: #fff; margin-top: 3px;" id="passError"></div>
                                
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" name="remMe" id="remMe">
                                <label>Remmember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn form-btn1" name="loginAdmin"><i class="fa fa-key"></i> Login</button>
                               
                            </div>

                            <div class="text-center" style="margin-top: 10px;">
                            <a href="forgotPassword.php">Forgot Password !</a>
                            </div>
                        </form>

                    
                </div>


<div class="container text-center">
  <div class="text-center" id="error">

</div></div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $("#adminLoginForm").submit(function(evt){
            evt.preventDefault();
            var loginAdmin  = "loginAdmin";
            var email = $("#adminEmail").val();
            var password = $("#adminPassword").val();
            var remMe    = "";
            var status  = false;


            if ($("#remMe").is(':checked')) {
                 remMe = "RemmemberMe";
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
        

    })
}
        
        });
    </script>

</body>
</html>

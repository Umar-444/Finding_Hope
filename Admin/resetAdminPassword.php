<?php

require("functions/initi.php");
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
                        <form class="adminLoginForm" id="resetPasswordForm" method="POST" action="recoveryProcess.php">
                            <div>
                                <h3>Reset Password</h3>

                            </div>

                            <div class="form-group">
                                <label>New Password:</label>
                                <input type="Password" class="form-control" id="myPassword1" name="myResetCode"
                             placeholder="Enter New Password" required>
                                
                                <input type="hidden" name="resetMyPassword">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="Password" class="form-control" id="myPassword2" name="myResetCode"
                             placeholder="Confirm Password" required>
                            <input type="hidden" name="token" id="myToken" value="<?php echo token_generator();?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn form-btn1"><i class="fa fa-key"></i>  Reset</button>
                            </div>
                            <div class="text-center" style="margin-top: 10px;">
                            </div>
                        </form>
                </div>

    <!-- jQuery  labs-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<script type="text/javascript">
    
    /*$('#resetPasswordForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var recoverPassword = "recoverPassword";
            var myEmail     = "<?php echo $_GET['email'];?>";
            var myCode      = "<?php echo $_GET['code']; ?>";
            var token       = $('#myToken').val();
            var newPass     = $('#myPassword1').val();
            var confirmPass = $('#myPassword2').val();

        

            if (newPass == confirmPass) {
            
                $.post(url, {recoverPassword: recoverPassword, myEmail: myEmail, myCode: myCode, token: token, newPass: newPass, confirmPass: confirmPass}, function(resetPasswordReturn){
                if (!resetPasswordReturn.error) {
                        alert(resetPasswordReturn);
                        window.location = 'login.php';
                    }
            });

        }
        else{
            alert("Password Didn't Match, Check your Password.");
        }
    });*/


    $("#resetPasswordForm").submit(function(o){o.preventDefault();var r=$(this).attr("action"),a=$("#myToken").val(),s=$("#myPassword1").val(),e=$("#myPassword2").val();s==e?$.post(r,{recoverPassword:"recoverPassword",myEmail:"<?php echo $_GET['email'];?>",myCode:"<?php echo $_GET['code']; ?>",token:a,newPass:s,confirmPass:e},function(o){o.error||(alert(o),window.location="login.php")}):alert("Password Didn't Match, Check your Password.")});

</script>
</body>

</html>

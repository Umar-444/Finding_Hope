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
                        <form class="adminLoginForm" id="forgotForm" method="POST" action="recoveryProcess.php">
                            <div>
                                <h3>Forgot Password.</h3>

                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="myAdminEmail"
                             placeholder="Enter Email" required>
                                <input type="hidden" name="token" value="<?php echo token_generator();?>">
                                <input type="hidden" name="forgotPassword">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn form-btn1"><i class="fa fa-key"></i> Get Code</button>
                               
                            </div>

                            <div class="text-center" style="margin-top: 10px;">
                            </div>
                        </form>

                        <div id="error"></div>
                </div>

    <!-- jQuery  labs-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<script type="text/javascript">


    $("#forgotForm").submit(function(t){t.preventDefault();var o=$(this).attr("action"),i=$(this).serialize();$.post(o,i,function(t){t.error||(alert(t),window.location="login.php")})});
   
   /* 
    $('#forgotForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var forgotData = $(this).serialize();


            $.post(url, forgotData, function(forgotReturn){
                if (!forgotReturn.error) {
                        alert(forgotReturn);
                        window.location = 'login.php';
                    }
            });
    });*/

</script>
</body>

</html>

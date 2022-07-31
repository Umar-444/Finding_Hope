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

    <!-- Custom CSS -->
    <link href="css/style3.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

</head>

<body>

    
            <div class="container">
                        <form class="adminLoginForm" id="codeForm" method="POST" action="recoveryProcess.php">
                            <div>
                                <h3>Reset Code</h3>

                            </div>

                            <div class="form-group">
                                <label>Code :</label>
                                <input type="text" class="form-control" id="myResetCode" name="myResetCode"
                             placeholder="Enter Reset Code" required>
                                
                                <input type="hidden" name="resetPassword">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn form-btn1"><i class="fa fa-key"></i>  Enter Code</button>
                            </div>
                            <div class="text-center" style="margin-top: 10px;">
                            </div>
                        </form>

                        
                </div>

    <!-- jQuery  labs-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<script type="text/javascript">
    
$("#codeForm").submit(function(e){e.preventDefault();var o=$(this).attr("action"),t=$("#myResetCode").val();$.post(o,{resetPassword:"resetPassword",aEmail:"<?php echo $_GET['email'];?>",aCode:"<?php echo $_GET['code']; ?>",enterCode:t},function(e){e.error||(0!=e?(alert("Congratulations, Code Varifeid."),window.location=e):0==e&&alert("Check Your Code Please."))})});
    
  /*  $('#codeForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var resetPassword = "resetPassword";
            var aEmail = "<?php echo $_GET['email'];?>";
            var aCode = "<?php echo $_GET['code']; ?>";
            var enterCode = $('#myResetCode').val();

            $.post(url, {resetPassword: resetPassword, aEmail: aEmail, aCode: aCode, enterCode: enterCode}, function(resetReturn){
                if (!resetReturn.error) {
                    if(resetReturn !=0 ){
                    alert("Congratulations, Code Varifeid.");
                    window.location = resetReturn;
                }

                else if(resetReturn == 0){
              alert("Check Your Code Please.");}
              }
            });
   });*/




</script>
</body>

</html>

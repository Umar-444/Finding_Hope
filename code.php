<?php

require("functions/initi.php");

?>

<!DOCTYPE html>
<html>

<?php  require("include/header.php"); ?> 
<body>

<?php

require("include/menu.php");

?>



<div id="myBody" style="margin-top: 150px;">
			
	
<?php


require("include/codeForm.php");



?>


			

	
</div>


<?php


require("include/footer.php");


require("include/jqueryLabs.php");
?>


	<script type="text/javascript">



/*
     $(document).ready(function(){
        $('#codeForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var resetPassword = "resetPassword";
            var uEmail = "<?php echo $_GET['email'];?>";
            var uCode = "<?php  echo $_GET['code']; ?>";
            var enterCode = $('#myUserCode').val();
            $.post(url, {resetPassword: resetPassword, uEmail: uEmail, uCode: uCode, enterCode: enterCode}, function(resetReturn){
                if (!resetReturn.error) {
                    if(resetReturn !=0 ){
                    	
                    alert("Congratulations, Code Varifeid.")
                    window.location = resetReturn;
                }

                else if(resetReturn == 0){
              alert("Check Your Code Please.");}
              }
            });
        });
    }); 
 */

 
// MINIFY CODE

     $(document).ready(function(){$("#codeForm").submit(function(e){e.preventDefault();var o=$(this).attr("action"),t=$("#myUserCode").val();$.post(o,{resetPassword:"resetPassword",uEmail:"<?php echo $_GET['email'];?>",uCode:"<?php  echo $_GET['code']; ?>",enterCode:t},function(e){e.error||(0!=e?(alert("Congratulations, Code Varifeid."),window.location=e):0==e&&alert("Check Your Code Please."))})})});
</script>

</body>
</html>
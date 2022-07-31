           
    setInterval(function(){
    fetchCases();
   },1500);
        function fetchCases(){
            $.ajax({
                    url: 'fetchCases.php',
                    type: 'POST',
                    success:function(caseData){
                    if(!caseData.error) {
                    $('#cases').html(caseData);
            }
      }
            });
        }
        





        function verifyCase(id){

       var verifyCase = 'verifyCase';
  
     if(confirm("Are you sure?")){
        $.post('process.php', {id: id, verifyCase: verifyCase}, function(verifeid) {
           
            alert(verifeid);

        });
    }
        }



        function unVerifyCase(id){

       var unVerifyCase = 'unVerifyCase';
  
    if(confirm("Are you sure?")){

        $.post('process.php', {id: id, unVerifyCase: unVerifyCase}, function(unVerifeid) {
            
            alert(unVerifeid);

        });
    }
        }


        function deleteCase(id){

       var deleteCase = 'deleteCase';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteCase: deleteCase}, function(deleteCase) {
           
            alert(deleteCase);
            });
            }
        }


 $(document).ready(function() {
      
      $(document).on('click', '.getCase', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchview.php',
            method: 'POST',
            data: {viewId:viewId},
            success:function(getData){
             $('#viewCase').html(getData);

            }
          });
      });
    });




        function verifyFinder(id){

       var finderVarification = 'Verify Finder';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id, finderVarification: finderVarification}, function(verifyFinder) {
            
            alert(verifyFinder);
        });
    }
}

        function unVerifyFinder(id){

        var finderVarification = 'Un-Verify Finder';
  
      if(confirm("Are you sure?")){
        
        $.post('process.php', {id: id, finderVarification: finderVarification}, function(unVerifyFinder) {
            alert(unVerifyFinder);
        });
    }

        }

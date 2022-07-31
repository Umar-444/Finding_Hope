



                
    setInterval(function(){
    fetchFinders();
   },1500);
        function fetchFinders(){
            $.ajax({
                    url: 'fetchFinders.php',
                    type: 'POST',
                    success:function(finderData){
                    if(!finderData.error) {
                    $('#finders').html(finderData);
            }
      }
            });
        }
        



    

            $(document).ready(function() {
      
      $(document).on('click', '.getFinder', function(){
          var viewFinderId = $(this).attr('id');
          $.ajax({
            url: 'fetchviewfinder.php',
            method: 'POST',
            data: {viewFinderId:viewFinderId},
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

            function deleteFinder(id){

       var deleteFinder = 'deleteFinder';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteFinder: deleteFinder}, function(deleteFinder) {
           
            alert(deleteFinder);
            });
            }
        }
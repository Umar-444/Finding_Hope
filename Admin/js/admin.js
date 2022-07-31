


        
            $("#newAdmin").submit(function(evt){
                    evt.preventDefault();
                    var url = $(this).attr('action');

                    var pass1 = $('#password1').val();
                    var pass2 = $('#password2').val();

                    if (pass1 == pass2) {
                        var adminCreateData = $(this).serialize();
                        // alert(adminCreateData);
                      $.post(url, adminCreateData, function(returnAdmin){
                        alert(returnAdmin);
                        $('#newAdmin')[0].reset();
                        $("#myModal").modal('toggle');
                      });
                    }else{
                  
                      alert("Password Didn't Matched.");
                    }

 
                }); 
              



    setInterval(function(){
    fetchAdmin();
   },1500);
    
        function fetchAdmin(){
            $.ajax({
                    url: 'fetchAdmin.php',
                    type: 'POST',
                    success:function(adminData){

                    if(!adminData.error) {

                    $('#adminTable').html(adminData);
                    }
                }
             });
            }

  








        function deActiveAdmin(id){

       var adminStatus = 'De-Active Admin';
      if (confirm("Are you sure?")){
        $.post('process.php', {id: id, adminStatus: adminStatus}, function(adminDeActive) {
            // $('').html(varifeid);
            alert(adminDeActive);

        });

        }
      }



        function activeAdmin(id){

       var adminStatus = 'Active Admin';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id,  adminStatus: adminStatus}, function(activeAdmin) {
            
            alert(activeAdmin);

            });
          }

        }


        function deleteAdmin(id){

       var deleteAdmin = 'deleteAdmin';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteAdmin: deleteAdmin}, function(deleteAdmin) {
            alert(deleteAdmin);
        });

        }
      }


        function makeAdmin(id){

          
       var myAdmin = 'Admin';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id, myAdmin: myAdmin}, function(promoteAdmin) {
            
            alert(promoteAdmin);

            });
          }

        }


        function makeSAdmin(id){

        
       var myAdmin = 'Super Admin';
  
      if(confirm("Are you sure?")){

        $.post('process.php', {id: id, myAdmin: myAdmin}, function(promoteSuperAdmin) {
            
            alert(promoteSuperAdmin);

            });
          }

        }

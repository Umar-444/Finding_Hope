        $(document).ready(function(){
        	

          $("#caseForm").submit(function(evt){
  					evt.preventDefault();


  					var status = false;

								var img = $('#caseImg').val();
						 if (img == "") {
					            $("#imgError").html("<span>Image Required.</span>");
					            status = false;
					          }
					         else if (validate(img) == true) {
					            $("#imgError").html("<span>Accept Only JPG, Jpeg, Png</span>");
					            status = false;
					          }
					          else{
					            
					            $("#imgError").html("<span></span>");
					            status = true;
					          }



if (status == true && confirm("Are You Sure! About the details.")) {


  					var url = $(this).attr('action');
  					 $.ajax({

  						url,
  						type: "POST",
             			data:  new FormData(this),
             			contentType: false,
             			cache: false,
              			processData:false,
              		    success:function(data){
                		if (!data.error) {
                	    	alert(data);
                	    		$('#caseForm')[0].reset();
                				}
              		  		}
  						});	
            
					}



          	});
        });



    function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $("#caseImg").val("");
        return true;
    	}
	}


        $('#messageReplyForm').submit(function(evt){
          evt.preventDefault();
              replyData = $(this).serialize();
              $.post("process.php", replyData, function(reply){
                alert(reply);
              });
        });



    setInterval(function(){
    fetchMessages();
   },1500);
    
        function fetchMessages(){
            $.ajax({
                    url: 'fetchMessages.php',

                    type: 'POST',

                    success:function(messageData){

                    if(!messageData.error) {

                    $('#blogTable').html(messageData);
                    }
                }
             });
            }

  
        function deleteMessage(id){

       var deleteMessage = 'deleteMessage';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteMessage: deleteMessage}, function(deleteReturn) {
            alert(deleteReturn);


        });

        }
      }



       $(document).ready(function() {

      
      $(document).on('click', '.getMessage', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchviewMessage.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
             $('#senderName').html(getData.S_Name);
               $('#senderEmail').html(getData.S_Email);
                $('#subject').html(getData.S_Subject);
                $('#message').html(getData.S_Message);
               

                if (getData.R_Status == "Un-Replied") {

                  $('#replyText').hide();
                  $('#replyForm').show();
                  $('#replyId').val(getData.M_Id);
                  
                }

                else if (getData.R_Status == "Replied") {
                  $('#replyForm').hide();
                  $('#replyText').show();
                   $('#messageReply').html(getData.M_Reply);
                }
              $('#myModal').modal('show');

            }
          });
      });
    });



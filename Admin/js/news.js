

    setInterval(function(){
    fetchNews();
   },1500);
    
        function fetchNews(){
            $.ajax({
                    url: 'fetchNews.php',

                    type: 'POST',

                    success:function(newsData){

                    if(!newsData.error) {

                    $('#newsTable').html(newsData);
                    }
                }
             });
            }


         // tinymce.init({ selector:'textarea' });


        



         $(document).ready(function(){
            $("#newsForm").submit(function(evt){
                    evt.preventDefault();

             var newsData = $(this).serialize();
               $.post("process.php", newsData, function(myNewsData){
                if (!myNewsData.error) {
                    alert(myNewsData);
                   $('#newsForm')[0].reset();
                   $("#myModal").modal('toggle');

                }
            });
            });
        });


         $(document).ready(function(){
            $("#newsUpdateForm").submit(function(evt){
                    evt.preventDefault();

             var newsUpdateData = $(this).serialize();
               $.post("process.php", newsUpdateData, function(myNewsUpdateData){
                if (!myNewsUpdateData.error) {
                    alert(myNewsUpdateData);
                    $("#myModalUpdate").modal('toggle');
                
                }
            });
            });
        });





        function publishedNews(id){

       var newsStatus = 'Published News';
  if (confirm("Are you sure?")){
        $.post('process.php', {id: id, newsStatus: newsStatus}, function(publishedNews) {
            
            alert(publishedNews);

        });

        }
      }



        function unPublished(id){

       var newsStatus = 'Draft News';
  
      confirm("Are you sure?");

        $.post('process.php', {id: id, newsStatus: newsStatus}, function(unPublished) {
  
            alert(unPublished);

        });

        }


        function deleteNews(id){

       var deleteNews = 'deleteNews';
  
      if (confirm("Are you sure?")){

        $.post('process.php', {id: id, deleteNews: deleteNews}, function(deleteNews) {
          
            alert(deleteNews);


        });

        }
      }

       $(document).ready(function() {

      
      $(document).on('click', '.getNews', function(){
          var viewId = $(this).attr('id');
          $.ajax({
            url: 'fetchviewNews.php',
            method: 'POST',
            data: {viewId:viewId},
            dataType: 'json',
            success:function(getData){
              $('#myUpdateId').val(getData.N_Id);
             $('#myNewsTitle').val(getData.N_Title);
               $('#myNewsStatus').val(getData.N_Status);
                $('#myNewsContent').val(getData.N_Content);
               
              $('#myModalUpdate').modal('show');

            }
          });
      });
    });

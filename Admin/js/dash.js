

setInterval(function(){
    fetchCasesCount();
    fetchFinderCount();
    fetchBlogCount();
    fetchNewsCount();
    fetchMsgCount();
    fetchAlbumCount();
    fetchAUserCount();
    fetchThemesCount()
   },1500);

        function fetchCasesCount(){
            $.ajax({
                    url: 'fetchCasesCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#casesCount').html(countData);
                }
             }
            });
        }

              function fetchFinderCount(){
            $.ajax({
                    url: 'fetchFinderCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#finderCount').html(countData);
                }
             }
            });
        }

              function fetchBlogCount(){
            $.ajax({
                    url: 'fetchBlogCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#blogCount').html(countData);
                }
             }
            });
        }

                     function fetchNewsCount(){
            $.ajax({
                    url: 'fetchNewsCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#newsCount').html(countData);
                }
             }
            });
        }
        

        function fetchAlbumCount(){
            $.ajax({
                    url: 'fetchAlbumCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#albumCount').html(countData);
                }
             }
            });
        }

        function fetchMsgCount(){
            $.ajax({
                    url: 'fetchMessageCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#msgCount').html(countData);
                }
             }
            });
        }

                function fetchAUserCount(){
            $.ajax({
                    url: 'fetchAUserCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#aUserCount').html(countData);
                }
             }
            });
        }

        function fetchThemesCount(){
            $.ajax({
                    url: 'fetchThemeCount.php',
                    type: 'POST',
                    success:function(countData){
                    if(!countData.error) {
                    $('#themeCount').html(countData);
                }
             }
            });
        }


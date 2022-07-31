        $(document).ready(function() {
            

            $('.logout').click(function(){
            
                var logout = 'logout';
                $.post('logout.php', {logout:logout}, function(logout) {
        
            if (logout == 0) { 
                  window.location ="login.php";
                }

             });
            });
        });


        
        $('#themeForm').submit(function(evt) {
            evt.preventDefault();

            var url = $(this).attr('action');


            if (confirm("Are You Sure?")) {
                var themeData = $(this).serialize();
                $.post(url, themeData, function(changeTheme){
                    if (!changeTheme.error) {
                        alert(changeTheme);
                        window.location = 'themes.php';
                    }
                });
            }
        });


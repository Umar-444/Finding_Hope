<?php

require("functions/initi.php");


if (loggedIn()){
insertNews();

delNews();
updateNews();
changeNewsStatus();


verifyCase();
unVerifyCase();
deleteCase();

insertBlogPost();
updateBlogPost();
changeBlogStatus();
deletePost();

changeAlbumStatus();
insertAlbum();
addAlbumImage();
updateAlbum();

deleteAlbum();

finderVarificationStatus();
delFinder();

delMessage();
messageReply();
changeMyTheme();
checkForgotEmail();

newAdminUser();
changeAdminStatus();
deleteAdmin();
changeAdminRole();
changePassword();
updateAdmin();


	
} else{

  redirect("login.php");
}




?>
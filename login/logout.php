<?php
	//destroy the session
    session_start();
    session_destroy();
	//return to favourites outside the login folder
    header("location:../favourites.php"); 
?>
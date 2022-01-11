<?php 
    include('../config/constants.php');
    //2. Redirect to login page
    session_start();
    session_destroy();
    
    header("location:".SITEURL."shared/login.php");
?>
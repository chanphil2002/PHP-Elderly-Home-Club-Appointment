<?php
    session_start();

    echo $_SESSION['user'];
    if(!isset($_SESSION['user']))
    {   
        $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div>";
        header("location:".SITEURL."shared/login.php");
    } 
?>
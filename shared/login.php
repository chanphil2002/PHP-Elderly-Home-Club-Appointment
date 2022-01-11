<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="partials.css" />
</head>

<body class="login_page">
<?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
    <div class="container" align="center">
        <br><br><br>
        <img class="logo" align="center" src="../image/Handyman.png" alt="Handyman_Logo" width="250px" height="250px">
        <div class="login_box">
            <form method="post" action="">
                <div>
                    <label for="UserID">UserID</label>
                    <br>
                    <input type="text" name="userid" placeholder="UserID" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <select name="user-type" required>
                        <option value="">Select User:</option>
                        <option value="senior">Senior</option>
                        <option value="handyman">Handyman</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <hr>
                <button type="submit" name="submit" value="login">Log In</button>
            </form>
        </div>
    </div>

</body>

</html>

<?php
    session_start();
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['userid'];
        $password = $_POST['password'];
        $user = $_POST['user-type'];

        //2. SQL to check whether the user with username and password exists or not
        if($user == "senior")
        {
            $sql = "SELECT * FROM tbl_senior WHERE IC='$username' AND password='$password'";
   
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
    
            if ($count==1) 
            {
                $_SESSION['login'] = "<div class='success'>Login Successful, Welcome $username.</div>";
                $_SESSION['user'] = $username;
                header("location:".SITEURL."1.senior/senior_homepage.php");
            }
            else 
            {
                $_SESSION['login'] = "<div class='success'>Login failed, please try again.</div>";
            }
        }

        if($user == "handyman")
        {
            $sql = "SELECT * FROM tbl_handyman WHERE IC='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
    
            if ($count==1) 
            {
                $_SESSION['login'] = "<div class='success'>Login Successful, Welcome $username.</div>";
                $_SESSION['user'] = $username;
                header("location:".SITEURL."2.handyman/handyman_profile.php");
            }
            else 
            {
                $_SESSION['login'] = "<div class='success'>Login failed, please try again.</div>";
            }
        }

        if($user == "admin")
        {
            $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
    
            if ($count==1) 
            {
                $_SESSION['login'] = "<div class='success'>Login Successful, Welcome $username.</div>";
                $_SESSION['user'] = $username;
                header("location:".SITEURL."3.admin/Handyman Registration Form.php");
            }
            else 
            {
                $_SESSION['login'] = "<div class='success'>Login failed, please try again.</div>";
            }
        }
	}
?>
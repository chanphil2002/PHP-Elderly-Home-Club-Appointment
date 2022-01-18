<?php include('../config/constants.php'); ?>

<?php
session_start();
session_destroy();
session_start();
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the Data from Login form
    $username = $_POST['userid'];
    $password = $_POST['password'];
    $user = $_POST['user-type'];

    //2. SQL to check whether the user with username and password exists or not
    if ($user == "senior") {
        $sql = "SELECT * FROM tbl_senior WHERE senior_IC='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($count == 1) {
            $fname = $row['fname'];
            $_SESSION['login'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Welcome Back <strong>$fname</strong> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";

            $_SESSION['seniorlogin'] = $username;
            unset($_SESSION['handymanlogin']);
            unset($_SESSION['adminlogin']);
            header("location:" . SITEURL . "1.senior/senior_homepage.php");
            exit;
        } else {
            $_SESSION['failed-login'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Invalid Credentials! 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }

    if ($user == "handyman") {
        $sql = "SELECT * FROM tbl_handyman WHERE handyman_IC='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($count == 1) {
            $fname = $row['fname'];
            $_SESSION['login'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Welcome Back <strong>$fname</strong> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";

            $_SESSION['handymanlogin'] = $username;
            unset($_SESSION['seniorlogin']);
            unset($_SESSION['adminlogin']);
            header("location:" . SITEURL . "2.handyman/handyman_profile.php");
            exit;
        } else {
            $_SESSION['failed-login'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Invalid Credentials! 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }

    if ($user == "admin") {
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['login'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Welcome Back, <strong>admin</strong> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";

            $_SESSION['adminlogin'] = $username;
            unset($_SESSION['seniorlogin']);
            unset($_SESSION['handymanlogin']);
            header("location:" . SITEURL . "3.admin/Handyman Registration Form.php");
            exit;
        } else {
            $_SESSION['failed-login'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Invalid Credentials! 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="partials.css" />
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
</head>

<body class="login_page">

    <div class="login-box" align="center">
        <img class="logo" align="center" src="../image/Handyman.png" alt="Handyman_Logo" width="250px" height="250px">
        <form method="post" action="">
            <h1>Wrenchman Login</h1>
            <div>
                <?php
                if (isset($_SESSION['failed-login'])) {
                    echo $_SESSION['failed-login'];
                    unset($_SESSION['failed-login']);
                }
                ?>
            </div>
            <form method="post">
                <div class="txt_field">
                    <input name="userid" type="text" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input name="password" type="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="select">
                    <select name="user-type" required>
                        <option value="">Login As:</option>
                        <option value="senior">Senior</option>
                        <option value="handyman">Handyman</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="submit" value="login">Log In</button>
            </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
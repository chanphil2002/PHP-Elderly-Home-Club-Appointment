<?php include('../shared/admin_navigation_bar.php'); ?>

<?php

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['gender'];
	$icNO = $_POST['icNO'];
	$number = $_POST['number'];
    $address = $_POST['address'];
	$skills = $_POST['skills'];
	$password = $_POST['password'];

    $sql = "SELECT * FROM tbl_handyman WHERE icNO='$icNO'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
    $sql = "INSERT INTO tbl_handyman  VALUES ('$first_name', 
            '$last_name','$gender', '$icNO', '$number', '$address','$skills', '$password')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Registration Complete'</script>";
            echo "<script> window.location.assign('LogIn.php'); </script>"; 
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
    }else{
        echo "<script>alert('Identity Card Number Already Exists, Please Try Again')</script>";
    }
          
// if ($password == $cpassword) {
		// $sql = "SELECT * FROM tbl_handyman WHERE icNO='$icNO'";
		// $result = mysqli_query($conn, $sql);
		// if (!$result->num_rows > 0) {
		// 	$sql = "INSERT INTO tbl_handyman (first_name, last_name, gender, icNO, number, address, skills, password)
		// 			VALUES ('$first_name', '$last_name', '$gender', '$icNO', '$number', '$address, '$skills', '$password')";
		// 	$result = mysqli_query($conn, $sql);
		// 	if ($result) {
		// 		echo "<script>alert('Wow! User Registration Completed.')</script>";
		// 		$first_name = "";
		// 		$last_name = "";
		// 		$gender = "";
		// 		$icNO = "";
        //         $number = "";
        //         $skills = "";
        //         $address = "";
		// 		$_POST['password'] = "";
		// 	} else {
		// 		echo "<script>alert('Woops! Something Wrong Went.')</script>";
		// 	}
		// } else {
		// 	echo "<script>alert('Email Already Exists, Retry Again')</script>";
		// }
		
	// } else {
	// 	echo "<script>alert('Password Not Matched.')</script>";
	// }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    
     <style>

        body {background-image: url('test.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin:0;}

        .navbar {
        overflow: hidden;
        background-color: #E63E6D;
        position: fixed;
        top: 0;
        width: 100%;
        height: 108.33px;
        }

        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
}

        .navbar a:hover {
        background: #ddd;
        color: black;
}
        .main {
        padding: 16px;
        margin-top: 5%;
        }

        .header {
        text-align: center; 
        /* margin-top: 130px; */
        }

        .left {
        margin-left: 650px;
        margin-top: 45px;
        }

        .orange{
            fill: solid;
            background-color: #FFDAC7;
        }

        .yellow{
            fill: solid;
            background-color: #FFEFBC
        }

        </style> 
</head>
<body>
    <div class="navbar">
        <a href="#home">Handler Dashboard</a>
        <a href="#timetable">Timetable</a>
        <a href="#servicestatus">Service Status</a>
        <a href="#incomingrequest">Incoming Request</a>
        <a href="#registration">Registration</a>
        <a href="#manageprofile">Manage Profile</a>
    </div> -->
    <div class="main">
        <div class="header">
    <h1>Handyman Account Registration Page </h1>
    <h2>Please fill in all * required field and double check before submitting the registration form<h2></div><hr>
    <form action="" method="post"><strong>
        <div class="left">
            <label for="fname" style="margin-right:320px; font-size: 20px">First Name *</label> 
            <label for="lname" style="font-size: 20px">Last Name *</label><br>
            <input type="text" style="margin-right:250px;" class="orange" id="first_name" name="first_name" required>
            <input type="text" class="orange" id="last_name" name="last_name" required><br><br>

            <label for="gender" style="margin-right:355px; font-size: 20px" >Gender *</label>
            <label for="icNO" style="font-size: 20px">Identity Card No. *</label><br>
            <select class="orange" style="margin-right:250px; height:30px" name="gender" id="gender" required>
                <option value="">Choose Your Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input class="orange" type="text" id="icNO" name="icNO" required ><br><br>

            <label for="number" style="margin-right:283px; font-size: 20px">Phone Number *</label>
            <label for="address" style="font-size: 20px">Address *</label><br>
            <input class="yellow" style="margin-right:252px;" type="text" id="number" name="number" required >
            <input class="yellow" type="text" id="address" name="address" required ><br><br>

            <label for="skills" style="margin-right: 265px; font-size: 20px" required>Specialized Skills *</label>
            <label for="password" style=" font-size: 20px">Password *</label><br>
            <select class="yellow" name="skills" id="skills" style="height:30px;  margin-right:252px">
                <option value="">Choose Your Skills &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="SkillA">SkillA</option>
                <option value="SkillB">SkillB</option>
                <option value="SkillC">SkillC</option>
            </select>
            <input class="password orange" type="password" id="password" name="password"  required>
            <br><br><br><br>
            <div>
    </div>
            <input style="margin-left:200px;" type="submit" name="submit">
            <input type="button" onclick="history.back()" value="Return to Previous Page">
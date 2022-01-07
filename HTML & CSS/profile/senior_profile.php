<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Profile Settings</title>
</head>

<body>
<?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "wdt";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = mysqli_query($conn, "SELECT first_name, last_name, gender, ic_no, address FROM tbl_senior WHERE id = '1'");
        $display = mysqli_fetch_array($result);
        $conn->close();
    ?>
    <div class="navbar">
        <a href="#home">Senior Dashboard</a>
        <a href="#timetable">Timetable</a>
        <a href="#servicestatus">Service Status</a>
        <a href="#incomingrequest">Incoming Request</a>
        <a href="#registration">Registration</a>
        <a href="#manageprofile">Manage Profile</a>
    </div>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="profile_pic.png">
                <h3>John Smith</h3>
            </div>
            <ul>
                <li>
                    <a href="senior_profile.php" class="active">My Profile</a>
                </li>
                <li>
                    <a href="senior_appointment.php">My Appointment</a>
                </li>
                <li>
                    <a href="senior_notification.php">Notifications</a>
                </li>
            </ul>
        </div>  
        <div class= "card_body">
            <div class="info">
                <h1>My Profile</h1>
                <div class="info_data">
                    <div class="data">
                        <h3>First Name</h3>
                        <p><?php echo $display['first_name'] ?></p>
                        <h3>Gender</h3>
                        <p><?php echo $display['gender'] ?></p>
                        <h3>Address</h3>
                        <p><span>Jalan SS26/6, Taman Ma</span></p>
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p><?php echo $display['last_name'] ?></p>
                        <h3>Identity Card No.</h3>
                        <p><?php echo $display['ic_no'] ?></p>                        
                    </div>
                </div>
            </div>
        </div>     
    </div>
    
    <script>
        var sidebar = document.querySelector(".sidebar");
        sidebar.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
    </script>
    
</body>
</html>
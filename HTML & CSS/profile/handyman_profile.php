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
    <div class="navbar">
        <a href="#home">Handler Dashboard</a>
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
                <h3>Lee Yu Wei</h3>
            </div>
            <ul>
                <li>
                    <a href="handyman_profile.php" class="active">My Profile</a>
                </li>
                <li>
                    <a href="handyman_timetable.php">My Timetable</a>
                </li>
                <li>
                    <a href="handyman_notification.php">Notifications</a>
                </li>
            </ul>
        </div>  
        <div class= "card_body">
            <div class="info">
                <h1>My Profile</h1>
                <div class="info_data">
                    <div class="data">
                        <h3>First Name</h3>
                        <p>Lee</p>
                        <h3>Gender</h3>
                        <p>Male</p>
                        <h3>Address</h3>
                        <p><span>Jalan SS26/6, Taman Mayang Jaya, 473044</span></p>
                        <h3>Specialized Skills</h3>
                        <p>Plumber</p>
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p>Wei</p>
                        <h3>Identity Card No.</h3>
                        <p>012345-78-9999</p>                        
                    </div>
                </div>
            </div>
        </div>     
    </div>
</body>
</html>
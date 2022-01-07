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
            </div>
            <ul>
                <li>
                    <a href="senior_profile.php">My Profile</a>
                </li>
                <li>
                    <a href="senior_appointment.php">My Appointment</a>
                </li>
                <li>
                    <a href="senior_notification.php" class="active">Notifications</a>
                </li>
            </ul>
        </div>  
        <div class= "card_body">
            <div class="info">
                <h1>Notifications</h1>
                <br><br>
                <div class="info_data">
                    <div class="data">
                        <h3>Appointment Reminder</h3>
                        <p>Notify me 20 minutes before the appointment</p>
                        <br>
                        <h3>New Appointment</h3>
                        <p>Notify me when a task is appointed to me</p>                        
                    </div>
                    <div class="data">
                        <h3>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </h3>
                        <br><br>       
                        <h3>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
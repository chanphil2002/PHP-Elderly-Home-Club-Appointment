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
                    <a href="handyman_profile.php">My Profile</a>
                </li>
                <li>
                    <a href="handyman_timetable.php" class="active">My Timetable</a>
                </li>
                <li>
                    <a href="handyman_notification.php">Notifications</a>
                </li>
            </ul>
        </div>  
        <div class= "card_body">
            <div class="info">
                <h1>Lee's Timetable</h1>
                <!-- poput content -->
                <div id="popup1" class="overlay">
                    <div class="popup">
                        <h2>Appointment Details</h2>
                        <a class="close" href="#">x</a>
                        <div class="data">
                            <h3>Name of Tenant</h3>
                            <p>Ligma</p>
                            <h3>Contact Number</h3>
                            <p>69420</p>
                            <h3>Type of Repair</h3>
                            <p>Mental Health</p>
                            <h3>Reminder for The Agent</h3>
                            <p style="line-height: 1.5em; height: 3em;">Love Me Dont Go</p>
                        </div>
                    </div>
                </div>
                <table>
                    <tr>
                        <th></th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>                    
                    <tr>
                        <th>0900-1000</th>
                        <td><a class="button" href="#popup1">Occupied</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    <tr>
                        <th>1000-1100</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1100-1200</th>
                        <td></td>
                        <td></td>
                        <td><a class="button" href="#popup1">Occupied</a></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1200-1300</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1300-1400</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1400-1500</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1500-1600</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>1600-1700</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>                  
                </table>
            </div>
        </div>     
    </div>            
</body>
</html>
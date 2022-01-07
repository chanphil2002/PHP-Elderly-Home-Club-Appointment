<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
                <h3>John Smith</h3>
            </div>
            <ul>
                <li>
                    <a href="senior_profile.php">My Profile</a>
                </li>
                <li>
                    <a href="senior_appointment.php" class="active">My Appointment</a>
                </li>
                <li>
                    <a href="senior_notification.php">Notifications</a>
                </li>
            </ul>
        </div>  
        <div class= "card_body">
            <div class="info">
                <h1>My Appointments</h1>
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'Pending')" id="defaultOpen">Pending</button>
                    <button class="tablinks" onclick="openTab(event, 'Approved')">Approved</button>
                    <button class="tablinks" onclick="openTab(event, 'Completed')">Completed</button>                    
                    <button class="tablinks" onclick="openTab(event, 'Cancelled')">Cancelled</button>
                </div>
                
                <div id="Pending" class="tabcontent">
                    <div class="a_info">
                        <h3>A001</h3>
                        <h4>Toilet Repair</h4>
                        <p><i class="far fa-calendar-alt fa-fw"></i>6th November 2021</p>
                        <p><i class="far fa-clock fa-fw"></i>10:00 a.m. (GMT+8)</p>
                        <h5><i class="far fa-id-badge fa-fw"></i>TBC</h5>                            
                    </div>            
                </div>
                  
                <div id="Approved" class="tabcontent">
                    <div class="a_info">
                        <h3>A001</h3>
                        <h4>Toilet Repair</h4>
                        <p><i class="far fa-calendar-alt fa-fw"></i>6th November 2021</p>
                        <p><i class="far fa-clock fa-fw"></i>10:00 a.m. (GMT+8)</p>
                        <h5><i class="far fa-id-badge fa-fw"></i>Alepiu</h5>                            
                    </div>
                    <div class="a_info">
                        <h3>A001</h3>
                        <h4>Toilet Repair</h4>
                        <p><i class="far fa-calendar-alt fa-fw"></i>6th November 2021</p>
                        <p><i class="far fa-clock fa-fw"></i>10:00 a.m. (GMT+8)</p>
                        <h5><i class="far fa-id-badge fa-fw"></i>Alepiu</h5>                            
                    </div><div class="a_info">
                        <h3>A001</h3>
                        <h4>Toilet Repair</h4>
                        <p><i class="far fa-calendar-alt fa-fw"></i>6th November 2021</p>
                        <p><i class="far fa-clock fa-fw"></i>10:00 a.m. (GMT+8)</p>
                        <h5><i class="far fa-id-badge fa-fw"></i>Alepiu</h5>                            
                    </div><div class="a_info">
                        <h3>A001</h3>
                        <h4>Toilet Repair</h4>
                        <p><i class="far fa-calendar-alt fa-fw"></i>6th November 2021</p>
                        <p><i class="far fa-clock fa-fw"></i>10:00 a.m. (GMT+8)</p>
                        <h5><i class="far fa-id-badge fa-fw"></i>Alepiu</h5>                            
                    </div>                                                                                          
                </div>
                  
                <div id="Completed" class="tabcontent">
                    
                </div>

                <div id="Cancelled" class="tabcontent">
                    
                </div>            
            </div>
        </div>
    </div>
    
    
    <script>        
        function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        
        document.getElementById("defaultOpen").click();
    </script>         
</body>
</html>
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
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "wdt";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            echo "not working";
            die("Connection failed: " . $conn->connect_error);
        }

        $approved = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'approved' GROUP BY time ORDER BY date");
        $approved_rows = mysqli_fetch_array($approved);

        $completed = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'completed' GROUP BY time ORDER BY date");
        $completed_rows = mysqli_fetch_array($completed);

        $cancelled = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'cancelled' GROUP BY time ORDER BY date");
        $cancelled_rows = mysqli_fetch_array($cancelled);
    ?>  
        <div class= "card_body">
            <div class="info">
                <h1>My Appointments</h1>
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'pending')" id="defaultOpen">Pending</button>
                    <button class="tablinks" onclick="openTab(event, 'approved')">Approved</button>
                    <button class="tablinks" onclick="openTab(event, 'completed')">Completed</button>                    
                    <button class="tablinks" onclick="openTab(event, 'cancelled')">Cancelled</button>
                </div>
                <div id="pending" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $pending = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'pending' GROUP BY time ORDER BY date");
                            while ($pending_rows = mysqli_fetch_array($pending)) 
                            {                               
                                echo "<h3>" . $pending_rows['appointment_id'] . "</h3>";
                                echo "<h4>" .$pending_rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $pending_rows['date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $pending_rows['time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $pending_rows['description']. "</h5><hr>";          
                            }?>
                    </div>
                </div>
                <div id="approved" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $approved = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'approved' GROUP BY time ORDER BY date");
                            while ($approved_rows = mysqli_fetch_array($approved)) 
                            {                               
                                echo "<h3>" . $approved_rows['appointment_id'] . "</h3>";
                                echo "<h4>" .$approved_rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $approved_rows['date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $approved_rows['time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $approved_rows['description']. "</h5><hr>";          
                            }?>                         
                    </div>                                                                        
                </div>                  
                <div id="completed" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $completed = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'completed' GROUP BY time ORDER BY date");
                            while ($completed_rows = mysqli_fetch_array($completed)) 
                            {                               
                                echo "<h3>" . $completed_rows['appointment_id'] . "</h3>";
                                echo "<h4>" .$completed_rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $completed_rows['date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $completed_rows['time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $completed_rows['description']. "</h5><hr>";          
                            }?>                         
                    </div>                    
                </div>
                <div id="cancelled" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $cancelled = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'cancelled' GROUP BY time ORDER BY date");
                            while ($cancelled_rows = mysqli_fetch_array($cancelled)) 
                            {                               
                                echo "<h3>" . $cancelled_rows['appointment_id'] . "</h3>";
                                echo "<h4>" .$cancelled_rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $cancelled_rows['date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $cancelled_rows['time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $cancelled_rows['description']. "</h5><hr>";          
                            }?>                         
                    </div>                    
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
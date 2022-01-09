<?php
        include 'connection.php';
?>
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
        <?php
            $page_id = '5';
            include 'sidebar.php';
             
            $result = mysqli_query($conn, "SELECT * FROM `tbl_appointments` WHERE status = 'approved' GROUP BY time ORDER BY date");
            
            $monday = array();
            $tuesday = array();
            $wednesday = array();
            $thursday = array();
            $friday = array();
            
            while ($rows = mysqli_fetch_array($result))
            {
                if (date('w', strtotime($rows['date'])) == 1){
                    $monday->append($rows);
                }
                elseif (date('w', strtotime($rows['date'])) == 2) {
                    $tuesday->append($rows);
                }
                elseif (date('w', strtotime($rows['date'])) == 3) {
                    $wednesday->append($rows);
                }
                elseif (date('w', strtotime($rows['date'])) == 4) {
                    $thursday->append($rows);
                }
                elseif (date('w', strtotime($rows['date'])) == 5) {
                    $friday->append($rows);
                }
            }
            $result->free()
        ?>
        <div class= "card_body">
            <div class="info">
                <h1>Lee's Timetable</h1>
                <!-- popup content -->
                <?php 
                function popup($rows) {
                    echo'<div id="m1" class="overlay">
                        <div class="popup">
                        <h2>Appointment Details</h2>
                        <a class="close" href="#">x</a>
                        <div class="data">
                        <h3>Name of Tenant</h3>
                        <p>' . $rows['appointment_id'] . '<p>
                        <h3> Type of Repair </h3>
                        <p>' . $rows['appointment_id'] . '</p>
                        <h3>Reminder for The Agent</h3>
                        <p style="line-height: 1.5em; height: 3em;">' . $rows['appointment_id'] . '</p>
                        </div>
                        </div>
                        </div>';
                }
                popup($rows);
                ?>
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
                            <td><a class="button" href="#m1">Occupied</a></td>
                            <td><a class="button" href="#m2">Occupied</a></td>
                            <td><a class="button" href="#m3">Occupied</a></td>
                            <td><a class="button" href="#m4">Occupied</a></td>
                            <td><a class="button" href="#m5">Occupied</a></td>
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
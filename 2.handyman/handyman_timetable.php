<?php include('../shared/handyman_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../shared/profile.css">
    <title>Profile Settings</title>
</head>

<body>
    <div class="wrapper">
        <?php
            $page_id = '4';
            include '../shared/sidebar.php';
            
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $result = $conn->query("SELECT * FROM `tbl_appointment` WHERE status = 'approved' ORDER BY a_date ASC, a_time ASC;");
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            //popup for appointment details
            function popup($value, $popup_id)
            {
                echo'<div id="'. $popup_id .'" class="overlay">
                    <div class="popup">
                    <h2>Appointment Details</h2>
                    <a class="close" href="#">x</a>
                    <div class="data">
                    <h3>Name of Tenant</h3>
                    <p>' . $value['appointment_id'] . '<p>
                    <h3> Type of Repair </h3>
                    <p>' . $value['appointment_id'] . '</p>
                    <h3>Reminder for The Agent</h3>
                    <p style="line-height: 1.5em; height: 3em;">' . $value['appointment_id'] . '</p>
                    </div>
                    </div>
                    </div>';
            }
            
            //function to determine appointment details for table cells
            function occupy($value, $time, $days)
            {
                $FirstDay = date("Y-m-d", strtotime('sunday last week'));
                $LastDay = date("Y-m-d", strtotime('sunday this week'));
                    if ($value['a_date'] > $FirstDay && $value['a_date'] < $LastDay)
                    {    
                        if (($value['a_time'] == $time) and (date('l', strtotime($value['a_date'])) == $days))
                        {
                            echo '<a class="button" href=#'.$days.$time.'>Occupied</a>';
                            popup($value, $days.$time);
                        }
                    }
        }
        ?>
        <div class= "card_body">
            <div class="info">
                <h1>Lee's Timetable</h1>        
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
                        <th>09:00-10:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>10:00-11:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>11:00-12:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>12:00-13:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>13:00-14:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>14:00-15:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>15:00-16:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>16:00-17:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Monday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Tuesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Wednesday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Thursday");
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Friday");
                            }                    
                        ?>
                        </td>
                    </tr>
                          
                </table>
            </div>
        </div>     
    </div>            
</body>
</html>
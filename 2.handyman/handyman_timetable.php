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
            while ($rows = mysqli_fetch_assoc($result))
            {
                $data[] = $rows;
            }
            $days_of_week = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

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
            function occupy($value, $popup_id, $time, $date)
            {
            if (isset($value['time']))
            {
                if (($value['time'] == $time) and (date('l', strtotime($value['date'])) == $date))
                {
                    echo '<td><a class="button" href=#'.$date.$popup_id.'>Occupied</a></td>';
                    popup($value, $date.$popup_id);
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
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days) 
                        {
                            occupy($row, "1", "09:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>10:00-11:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "2", "10:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>11:00-12:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "3", "11:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>12:00-13:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "4", "12:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>13:00-14:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "5", "13:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>14:00-15:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "6", "14:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>15:00-16:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "7", "15:00", $days);
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <th>16:00-17:00</th>
                    <?php
                    foreach ($data as $row)
                    {
                        foreach ($days_of_week as $days)
                        {
                            occupy($row, "8", "16:00", $days);
                        }
                    }
                    ?>  
                    </tr>        
                </table>
            </div>
        </div>     
    </div>            
</body>
</html>
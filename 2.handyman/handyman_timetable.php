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
            $handyman_IC = $_SESSION['handymanlogin'];
            $query = 
            "SELECT a.ID, a.service_type, a.a_time, a.a_date, a.description, a.image, s.senior_IC, s.fname, s.lname, s.address
            FROM tbl_appointment a LEFT JOIN tbl_senior s 
            ON a.senior_IC = s.senior_IC
            WHERE a.status = 'to be completed' AND a.handyman_IC = '$handyman_IC' ORDER BY a_date ASC, a_time ASC";
            $result = $conn->query($query);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $sql = "SELECT fname, lname FROM tbl_handyman WHERE handyman_IC = '$handyman_IC'";
            $result2 = $conn->query($sql);

            //popup for appointment details
            function popup($value, $popup_id)
            {
                echo'<div id="'. $popup_id .'" class="overlay">
                    <div class="popup">
                    <h2>Appointment Details(' .$value['ID'] . ')</h2>
                    <a class="close" href="#">x</a>
                    <br>
                    <div class="info_data">
                    <div class="data";">
                    <h3>Name of Tenant</h3>
                    <p>' . $value['fname'] .' '. $value['lname'] .'<p>
                    <h3> Type of Repair </h3>
                    <p>' . $value['service_type'] . '</p>   
                    <h3> Address </h3>
                    <p>' . $value['address'] . '</p>                 
                    <h3>Date</h3>
                    <p>' . $value['a_date'] .'<p>
                    <h3>Time</h3>
                    <p>' . $value['a_time'] .'<p>
                    <h3>Description</h3>
                    <p style="line-height: 1.5em; height: 3em;">' . $value['description'] . '</p>
                    </div>
                    <div class="data">
                    <img src="../img_upload/appointment/' . $value['image'] . '" alt = "Appointment Image">
                    </div>
                    </div>
                    </div>';
            }
            
            //function to determine appointment details for table cells
            function occupy($value, $time, $days, $requested_week)
            {                   
                switch($requested_week) {
                case "thisweek":
                    $FirstDay = date("Y-m-d", strtotime('sunday last week'));
                    $LastDay = date("Y-m-d", strtotime('sunday this week'));
                break;
                case "nextweek":
                    $FirstDay = date("Y-m-d", strtotime('sunday this week'));
                    $LastDay = date("Y-m-d", strtotime('sunday next week'));
                break;
                case "nextweekplus1":
                    $FirstDay = date("Y-m-d", strtotime('sunday next week'));
                    $LastDay = date("Y-m-d", strtotime('sunday next week +1 week'));
                break;
                default :
                    $FirstDay = date("Y-m-d", strtotime('sunday last week'));
                    $LastDay = date("Y-m-d", strtotime('sunday this week'));
                break;
                }
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
                <h1><?php while($rows2 = mysqli_fetch_array($result2))
                {
                    echo $rows2['fname'];
                } ?>'s Timetable</h1>
                <div class="for_dropdown">                    
                    <form method="post" action="" name="theForm" id="theForm">                        
                            <select form="theForm" name="selectedWeek" id="week" onchange='this.form.submit()'>
                                <li><option value="thisweek"
                                <?php if(isset($_POST['selectedWeek']) && $_POST['selectedWeek'] == 'thisweek') 
                                echo 'selected= "selected"'; ?>></li>
                                <?php echo date("dS F Y", strtotime('monday this week')); ?></option>
                                <option value="nextweek"
                                <?php if(isset($_POST['selectedWeek']) && $_POST['selectedWeek'] == 'nextweek') 
                                echo 'selected= "selected"'; ?>>
                                <?php echo date("dS F Y", strtotime('monday next week'));?></option>
                                <option value="nextweekplus1"
                                <?php if(isset($_POST['selectedWeek']) && $_POST['selectedWeek'] == 'nextweekplus1') 
                                echo 'selected= "selected"'; ?>>
                                <?php echo date("dS F Y", strtotime('monday next week +1 week'));?></option>
                            </select>
                            <?php 
                            if(isset($_POST['selectedWeek']))
                            {
                                $requested_week = $_POST['selectedWeek'];
                            }
                            else
                            {
                                $requested_week = 'thisweek';
                            }
                            ?>
                    </form>                   
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
                        <th>09:00-10:00</th>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Monday", $requested_week);  
                            }                
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "09:00:00", "Friday", $requested_week);
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
                            occupy($row, "10:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "10:00:00", "Friday", $requested_week);
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
                            occupy($row, "11:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "11:00:00", "Friday", $requested_week);
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
                            occupy($row, "12:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "12:00:00", "Friday", $requested_week);
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
                            occupy($row, "13:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "13:00:00", "Friday", $requested_week);
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
                            occupy($row, "14:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "14:00:00", "Friday", $requested_week);
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
                            occupy($row, "15:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "15:00:00", "Friday", $requested_week);
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
                            occupy($row, "16:00:00", "Monday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Tuesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Wednesday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Thursday", $requested_week);
                            }                    
                        ?>
                        </td>
                        <td>
                        <?php 
                            foreach ($rows as $row)
                            {
                            occupy($row, "16:00:00", "Friday", $requested_week);
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
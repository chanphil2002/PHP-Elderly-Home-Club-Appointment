<?php include('../shared/admin_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../shared/profile.css">
    <title>Document</title>
</head>
<body>
    <style>
        .search {
            padding: 12px 0;
            margin: 12px 25%;
            margin
            display: flex;
            align-items: center;
            box-shadow: 0 1px 1px 0 rgb(0 0 0 / 5%);
            color: #212121;
            background: #eaeaea;
            border-radius: 2px;
        }



        .search>input {
            flex: 1;
            width:100%;
            padding: 0 12px;
            font-size: 14px;
            line-height: 22px;
            border: 0;
            outline: none;
            background-color: inherit;
        }
    </style>
    <form class = "search" method="post">
            <input type="text" autocomplete="off" placeholder="Search Button" name="handyman_IC"/>
            <input type="submit" style="position: absolute; left: -9999px"/>
    </form>
    <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $handyman_IC = "111";
        if ($handyman_IC) 
        {
            if (isset($_POST['handyman_IC']))
            {
                $handyman_IC = $_POST['handyman_IC'];
            }
        }
        $query = 
        "SELECT a.ID, a.service_type, a.a_time, a.a_date, a.description, a.image, s.senior_IC, s.fname, s.lname
        FROM tbl_appointment a LEFT JOIN tbl_senior s 
        ON a.senior_IC = s.senior_IC
        WHERE a.status = 'to be completed' AND a.handyman_IC = '$handyman_IC' ORDER BY a_date ASC, a_time ASC";
        $result = $conn->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
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
                <h3>Date</h3>
                <p>' . $value['a_date'] .'<p>
                <h3>Time</h3>
                <p>' . $value['a_time'] .'<p>
                <h3>Description</h3>
                <p style="line-height: 1.5em; height: 3em;">' . $value['description'] . '</p>
                </div>
                <div class="data">
                <img src="../img_upload/appointment/' . $value['image'] . 'alt = "Appointment Image">
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
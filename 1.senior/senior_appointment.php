<?php include('../shared/senior_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../shared/profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Profile Settings</title>
</head>

<body>
    <div class="wrapper">
        <?php 
            $page_id = '2';
            include '../shared/sidebar.php';
        ?>  
        <div class= "card_body">
            <div class="info">
                <h1>My Appointments</h1>
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'pending')" id="defaultOpen">Pending</button>
                    <button class="tablinks" onclick="openTab(event, 'to be completed')">To Be Completed</button>
                    <button class="tablinks" onclick="openTab(event, 'completed')">Completed</button>                    
                    <button class="tablinks" onclick="openTab(event, 'rejected')">Rejected</button>
                </div>
                <div id="pending" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'pending' GROUP BY a_time ORDER BY a_date");
                            while ($rows = mysqli_fetch_array($result)) 
                            {                               
                                echo "<h3>" . $rows['ID'] . "</h3>";
                                echo "<h4>" .$rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $rows['a_date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $rows['a_time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $rows['handyman_IC']. "</h5><hr>";          
                            }
                            $result->free();  // free result set
                            ?>
                    </div>
                </div>
                <div id="to be completed" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'to be completed' GROUP BY a_time ORDER BY a_date");
                            while ($rows = mysqli_fetch_array($result)) 
                            {                               
                                echo "<h3>" . $rows['ID'] . "</h3>";
                                echo "<h4>" .$rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $rows['a_date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $rows['a_time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $rows['handyman_IC']. "</h5><hr>";          
                            }
                            $result->free();
                            ?>                         
                    </div>                                                                        
                </div>                  
                <div id="completed" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'completed' GROUP BY a_time ORDER BY a_date");
                            while ($rows = mysqli_fetch_array($result)) 
                            {                               
                                echo "<h3>" . $rows['ID'] . "</h3>";
                                echo "<h4>" .$rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $rows['a_date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $rows['a_time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $rows['handyman_IC']. "</h5><hr>";          
                            }
                            $result->free();
                            ?>                         
                    </div>                    
                </div>
                <div id="rejected" class="tabcontent">
                    <div class="a_info">
                        <?php 
                            $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'rejected' GROUP BY a_time ORDER BY a_date");
                            while ($rows = mysqli_fetch_array($result)) 
                            {                               
                                echo "<h3>" . $rows['ID'] . "</h3>";
                                echo "<h4>" .$rows['service_type'] . "</h4>";
                                echo "<p><i class='far fa-calendar-alt fa-fw'></i>" . $rows['a_date'] ."</p>";
                                echo "<p><i class='far fa-clock fa-fw'></i>" . $rows['a_time'] . "</p>";
                                echo "<h5><i class='far fa-id-badge fa-fw'></i>" . $rows['handyman_IC']. "</h5><hr>";          
                            }
                            $result->free();
                            ?>                         
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
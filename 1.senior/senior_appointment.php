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
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $senior_IC = $_SESSION['seniorlogin'];
        ?>
        <div class="card_body">
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
                        $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'pending' AND senior_IC = '$senior_IC' GROUP BY a_time ORDER BY a_date");
                        while ($rows = mysqli_fetch_array($result)) {
                            echo "<h3>Appointment ID - APP" . $rows['ID'] . "</h3>";
                            echo "<h4><i class='fas fa-tools fa-fw'></i>Service Type: " . $rows['service_type'] . "</h4>";
                            echo "<h4><i class='far fa-calendar-alt fa-fw'></i>Schedule Date Booked: " . $rows['a_date'] . "</h4>";
                            echo "<h4><i class='far fa-clock fa-fw'></i>Schedule Time Booked: " . $rows['a_time'] . "</h4>";
                            echo "<h5><i class='far fa-id-badge fa-fw'></i>Handyman Appointed:" . $rows['handyman_IC'] . "</h5><hr>";
                        }
                        $result->free();  // free result set
                        ?>
                    </div>
                </div>
                <div id="to be completed" class="tabcontent">
                    <div class="a_info">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'to be completed' AND senior_IC = '$senior_IC' GROUP BY a_time ORDER BY a_date");
                        while ($rows = mysqli_fetch_array($result)) {
                            echo "<h3>Appointment ID - APP" . $rows['ID'] . "</h3>";
                            echo "<h4><i class='fas fa-tools fa-fw'></i>Service Type: " . $rows['service_type'] . "</h4>";
                            echo "<h4><i class='far fa-calendar-alt fa-fw'></i>Schedule Date Booked: " . $rows['a_date'] . "</h4>";
                            echo "<h4><i class='far fa-clock fa-fw'></i>Schedule Time Booked: " . $rows['a_time'] . "</h4>";
                            echo "<h5><i class='far fa-id-badge fa-fw'></i>Handyman Appointed:" . $rows['handyman_IC'] . "</h5><hr>";
                        }
                        $result->free();
                        ?>
                    </div>
                </div>
                <div id="completed" class="tabcontent">
                    <div class="a_info">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'completed' AND senior_IC = '$senior_IC' GROUP BY a_time ORDER BY a_date");
                        while ($rows = mysqli_fetch_array($result)) {
                            echo "<h3>Appointment ID - APP" . $rows['ID'] . "</h3>";
                            echo "<h4><i class='fas fa-tools fa-fw'></i>Service Type: " . $rows['service_type'] . "</h4>";
                            echo "<h4><i class='far fa-calendar-alt fa-fw'></i>Schedule Date Booked: " . $rows['a_date'] . "</h4>";
                            echo "<h4><i class='far fa-clock fa-fw'></i>Schedule Time Booked: " . $rows['a_time'] . "</h4>";
                            echo "<h5><i class='far fa-id-badge fa-fw'></i>Handyman Appointed:" . $rows['handyman_IC'] . "</h5><hr>";
                        }
                        $result->free();
                        ?>
                    </div>
                </div>
                <div id="rejected" class="tabcontent">
                    <div class="a_info">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `tbl_appointment` WHERE status = 'rejected' AND senior_IC = '$senior_IC' GROUP BY a_time ORDER BY a_date");
                        while ($rows = mysqli_fetch_array($result)) {
                            echo "<h3>Appointment ID - APP" . $rows['ID'] . "</h3>";
                            echo "<h4><i class='fas fa-tools fa-fw'></i>Service Type: " . $rows['service_type'] . "</h4>";
                            echo "<h4><i class='far fa-calendar-alt fa-fw'></i>Schedule Date Booked: " . $rows['a_date'] . "</h4>";
                            echo "<h4><i class='far fa-clock fa-fw'></i>Schedule Time Booked: " . $rows['a_time'] . "</h4>";
                            echo "<h5><i class='far fa-id-badge fa-fw'></i>Handyman Appointed:" . $rows['handyman_IC'] . "</h5><hr>";
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
<?php include '../shared/admin_navigation_bar.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../shared/profile.css" />
</head>
<style>
    .tabcontent {
        height: 92%;
    }
</style>

<body>
    <br>
    <center>
        <h1>Display Appointment List</h1>
    </center>
    <div class="card_body" style="margin:10px 15% 0 15%; width:70%">
        <div class="info" style="height:600px;">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'all')" id="defaultOpen">All</button>
                <button class="tablinks" onclick="openTab(event, 'to be completed')">To Be Completed</button>
                <button class="tablinks" onclick="openTab(event, 'completed')">Completed</button>
                <button class="tablinks" onclick="openTab(event, 'rejected')">Rejected</button>
            </div>
            <div id="all" class="tabcontent">
                <div class="a_info">
                    <?php
                    $all = mysqli_query($conn, "SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment");
                    while ($all_rows = mysqli_fetch_array($all)) {
                        echo "<h3> Appointment ID : " . $all_rows['ID'] . "</h3>";
                        echo "<h4> Senior IC : " . $all_rows['senior_IC'] . "</h4>";
                        echo "<h4> Handyman IC : " . $all_rows['handyman_IC'] . "</h4>";
                        echo "<h4> Status : " . $all_rows['status'] . "</h4>";
                        echo "<h4> Description : " . $all_rows['description'] . "</h4>";
                        echo "<h4> Date : " . $all_rows['a_date'] . "</h4>";
                        echo "<h4> Time : " . $all_rows['a_time'] . "</h4>";
                        echo "<h4>" . $all_rows['image'] . "</h4><hr>";
                    }
                    ?>
                </div>
            </div>
            <div id="to be completed" class="tabcontent">
                <div class="a_info">
                    <?php
                    $tobecompleted = mysqli_query($conn, "SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'To Be Completed'");
                    while ($tobecompleted_rows = mysqli_fetch_array($tobecompleted)) {
                        echo "<h4> Appointment ID : " . $tobecompleted_rows['ID'] . "</h4>";
                        echo "<h4> Senior IC : " . $tobecompleted_rows['senior_IC'] . "</h4>";
                        echo "<h4> Handyman IC : " . $tobecompleted_rows['handyman_IC'] . "</h4>";
                        echo "<h4> Status : " . $tobecompleted_rows['status'] . "</h4>";
                        echo "<h4> Description : " . $tobecompleted_rows['description'] . "</h4>";
                        echo "<h4> Date : " . $tobecompleted_rows['a_date'] . "</h4>";
                        echo "<h4> Time : " . $tobecompleted_rows['a_time'] . "</h4>";
                        echo "<h4>" . $tobecompleted_rows['image'] . "</h4><hr>";
                    }
                    ?>
                </div>
            </div>
            <div id="completed" class="tabcontent">
                <div class="a_info">
                    <?php
                    $completed = mysqli_query($conn, "SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'Completed'");
                    while ($completed_rows = mysqli_fetch_array($completed)) {
                        echo "<h4> Appointment ID : " . $completed_rows['ID'] . "</h4>";
                        echo "<h4> Senior IC : " . $completed_rows['senior_IC'] . "</h4>";
                        echo "<h4> Handyman IC :" . $completed_rows['handyman_IC'] . "</h4>";
                        echo "<h4> Status : " . $completed_rows['status'] . "</h4>";
                        echo "<h4> Description: " . $completed_rows['description'] . "</h4>";
                        echo "<h4> Date : " . $completed_rows['a_date'] . "</h4>";
                        echo "<h4> Time : " . $completed_rows['a_time'] . "</h4>";
                        echo "<h4>" . $completed_rows['image'] . "</h4><hr>";
                    }
                    ?>
                </div>
            </div>
            <div id="rejected" class="tabcontent">
                <div class="a_info">
                    <?php
                    $rejected = mysqli_query($conn, "SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'Rejected'");
                    while ($rejected_rows = mysqli_fetch_array($rejected)) {
                        echo "<h4> Appointment ID : " . $rejected_rows['ID'] . "</h4>";
                        echo "<h4> Senior IC : " . $rejected_rows['senior_IC'] . "</h4>";
                        echo "<h4> Handyman IC : " . $rejected_rows['handyman_IC'] . "</h4>";
                        echo "<h4> Status : " . $rejected_rows['status'] . "</h4>";
                        echo "<h4> Description : " . $rejected_rows['description'] . "</h4>";
                        echo "<h4> Date : " . $rejected_rows['a_date'] . "</h4>";
                        echo "<h4> Time : " . $rejected_rows['a_time'] . "</h4>";
                        echo "<h4>" . $rejected_rows['image'] . "</h4><hr>";
                    }
                    ?>
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
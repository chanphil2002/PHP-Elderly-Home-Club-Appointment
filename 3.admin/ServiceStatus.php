<?php
        include 'constants.php';

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="ServiceStatus.css" />
</head>
<body>
    <h1>Display Appointment List</h1>
    <div class="_tabcontainer">
        <div class="_tabcontainer2 center">
            <div></div>
            <div class="tabs">
                <button class="_tabselection _text" onclick="openTab(event,'All')" id="defaultOpen">All</button>
                <button class="_tabselection _text" onclick="openTab(event,'Completed')">Completed</button>
                <button class="_tabselection _text" onclick="openTab(event,'To Be Completed')">To Be Completed</button>
                <button class="_tabselection _text" onclick="openTab(event,'Rejected')">Rejected</button>
            </div>
            <div></div>
            <div>
                <div class="_oneproductbox">
                    <div>
                        <div class="productdisplay">
                            <div class="product">
                                <div>
                                    <span class="productbox">
                                        <div class="finalproductbox">
                                            <div id="All" class="tabcontent">
                                                
                                                <?php
                                                    $all = mysqli_query($conn,"SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment");
                                                    while ($all_rows = mysqli_fetch_array($all))
                                                    {
                                                        echo "<h4> Appointment ID : ".$all_rows['ID'] . "</h4>";
                                                        echo "<h4> Senior IC : ".$all_rows['senior_IC'] . "</h4>";
                                                        echo "<h4> Handyman IC : " .$all_rows['handyman_IC'] . "</h4>";
                                                        echo "<h4> Status : " .$all_rows['status'] . "</h4>";
                                                        echo "<h4> Description : " .$all_rows['description'] . "</h4>";
                                                        echo "<h4> Date : " . $all_rows['a_date'] ."</h4>";
                                                        echo "<h4> Time : " . $all_rows['a_time'] . "</h4>";
                                                        echo "<h4>" .$all_rows['image'] . "</h4><hr>";

                                                    }
                                                 ?>
                                            </div>

                                            <div id="Completed" class="tabcontent">
                                                <?php
                                                    $completed = mysqli_query($conn,"SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'Completed'");
                                                    while ($completed_rows = mysqli_fetch_array($completed)) 
                                                    {                               
                                                        echo "<h4> Appointment ID : " .$completed_rows['ID'] . "</h4>";
                                                        echo "<h4> Senior IC : " .$completed_rows['senior_IC'] . "</h4>";
                                                        echo "<h4> Handyman IC :" .$completed_rows['handyman_IC'] . "</h4>";
                                                        echo "<h4> Status : " .$completed_rows['status'] . "</h4>";
                                                        echo "<h4> Description: " .$completed_rows['description'] . "</h4>";
                                                        echo "<h4> Date : " . $completed_rows['a_date'] ."</h4>";
                                                        echo "<h4> Time : " . $completed_rows['a_time'] . "</h4>";
                                                        echo "<h4>" .$completed_rows['image'] . "</h4><hr>";        
                                                    }
                                                ?>
                                            </div>

                                            <div id="To Be Completed" class="tabcontent">
                                                <?php
                                                    $tobecompleted = mysqli_query($conn,"SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'To Be Completed'");
                                                    while ($tobecompleted_rows = mysqli_fetch_array($tobecompleted)) 
                                                    {                               
                                                        echo "<h4> Appointment ID : " .$tobecompleted_rows['ID'] . "</h4>";
                                                        echo "<h4> Senior IC : " .$tobecompleted_rows['senior_IC'] . "</h4>";
                                                        echo "<h4> Handyman IC : " .$tobecompleted_rows['handyman_IC'] . "</h4>";
                                                        echo "<h4> Status : " .$tobecompleted_rows['status'] . "</h4>";
                                                        echo "<h4> Description : " .$tobecompleted_rows['description'] . "</h4>";
                                                        echo "<h4> Date : " . $tobecompleted_rows['a_date'] ."</h4>";
                                                        echo "<h4> Time : " . $tobecompleted_rows['a_time'] . "</h4>";
                                                        echo "<h4>" .$tobecompleted_rows['image'] . "</h4><hr>";    
                                                    }


                                                ?>
                                            </div>

                                            <div id="Rejected" class="tabcontent">
                                                <?php
                                                    $rejected = mysqli_query($conn,"SELECT ID, senior_IC, handyman_IC, a_time, a_date, status, description, image FROM tbl_appointment WHERE status = 'Rejected'");
                                                    while ($rejected_rows = mysqli_fetch_array($rejected)) 
                                                    {                               
                                                        echo "<h4> Appointment ID : " .$rejected_rows['ID'] . "</h4>";
                                                        echo "<h4> Senior IC : " .$rejected_rows['senior_IC'] . "</h4>";
                                                        echo "<h4> Handyman IC : " .$rejected_rows['handyman_IC'] . "</h4>";
                                                        echo "<h4> Status : " .$rejected_rows['status'] . "</h4>";
                                                        echo "<h4> Description : " .$rejected_rows['description'] . "</h4>";
                                                        echo "<h4> Date : " . $rejected_rows['a_date'] ."</h4>";
                                                        echo "<h4> Time : " . $rejected_rows['a_time'] . "</h4>";
                                                        echo "<h4>" .$rejected_rows['image'] . "</h4><hr>";            
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script>        
        function openTab(evt, tabName) {
        var i, tabcontent, _tabselection;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        _tabselection = document.getElementsByClassName("_tabselection");
        for (i = 0; i < _tabselection.length; i++) {
            _tabselection[i].className = _tabselection[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        
        document.getElementById("defaultOpen").click();
    </script>     
</body>
</html>
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
            
            
            
            
            
            
            
            
            
            
            
            
            
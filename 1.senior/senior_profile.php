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
        $page_id = '1';
        include '../shared/sidebar.php';
        $result = mysqli_query($conn, "SELECT first_name, last_name, gender, ic_no, address FROM tbl_senior WHERE senior_ic = '999'");
        $row = mysqli_fetch_array($result);
        $conn->close();
        ?> 
        <div class= "card_body">
            <div class="info">
                <h1>My Profile</h1>
                <div class="info_data">
                    <div class="data">
                        <h3>First Name</h3>
                        <p><?php echo $row['first_name'] ?></p>
                        <h3>Gender</h3>
                        <p><?php echo $row['gender'] ?></p>
                        <h3>Address</h3>
                        <p><span><?php echo $row['address'] ?></span></p>
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p><?php echo $row['last_name'] ?></p>
                        <h3>Identity Card No.</h3>
                        <p><?php echo $row['ic_no'] ?></p>                        
                    </div>
                </div>
            </div>
        </div>     
    </div>
    
    <script>
        var sidebar = document.querySelector(".sidebar");
        sidebar.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
    </script>
    
</body>
</html>
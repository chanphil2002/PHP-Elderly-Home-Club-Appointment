<?php include('../shared/handyman_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../shared/profile.css">
    <title>My Profile</title>
</head>

<body>
    <div class="wrapper">
        <?php
        $page_id = '3';
        include '../shared/sidebar.php';
        ?> 
        <div class= "card_body">
            <div class="info">
                <h1>My Profile</h1>
                <div class="info_data">
                <div class="data">
                        <h3>First Name</h3>
                        <p><?php echo $row['fname'] ?></p>
                        <h3>Gender</h3>
                        <p><?php echo $row['gender'] ?></p>
                        <h3>Address</h3>
                        <p><span><?php echo $row['address'] ?></span></p>
                        <br>
                        <h3>Specialised Skill</h3>                        
                        <p><?php echo $row['skills'] ?></p>  
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p><?php echo $row['lname'] ?></p>
                        <h3>Identity Card No.</h3>
                        <p><?php echo $row['handyman_IC'] ?></p>
                        <h3>Phone Number</h3>
                        <p><?php echo $row['phone_number'] ?></p>   
                    </div>
                </div>
            </div>
        </div>     
    </div>
</body>
</html>
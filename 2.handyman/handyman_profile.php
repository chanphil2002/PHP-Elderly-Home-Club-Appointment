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
        $page_id = '3';
        include '../shared/sidebar.php';
        $stmt = $conn->prepare("SELECT handyman_IC, fname, lname, gender, address, phone_number, skills FROM tbl_handyman WHERE handyman_IC = ?");
        $stmt->bind_param("s", $_SESSION['handymanlogin']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result); 
        ?> 
        <div class= "card_body">
            <div class="info">
                <h1>My Profile</h1>
                <div class="info_data">
                    <div class="data">
                        <h3>First Name</h3>
                        <p>Lee</p>
                        <h3>Gender</h3>
                        <p>Male</p>
                        <h3>Address</h3>
                        <p><span>Jalan SS26/6, Taman Mayang Jaya, 473044</span></p>
                        <h3>Specialized Skills</h3>
                        <p>Plumber</p>
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p>Wei</p>
                        <h3>Identity Card No.</h3>
                        <p>012345-78-9999</p>                        
                    </div>
                </div>
            </div>
        </div>     
    </div>
</body>
</html>
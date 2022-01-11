<?php include('../shared/senior_navigation_bar.php'); 
$_SESSION['user'] = $IC?>


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
        $result = mysqli_query($conn, "SELECT IC, fname, gender, address, phone_number, profile_picture FROM tbl_senior WHERE IC = content(IC)");
        $row = mysqli_fetch_array($result);        
        include '../shared/sidebar.php';
        $conn->close();
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
                    </div>
                    <div class="data">
                        <h3>Last Name</h3>
                        <p><?php echo $row['lname'] ?></p>
                        <h3>Identity Card No.</h3>
                        <p><?php echo $row['IC'] ?></p>                        
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
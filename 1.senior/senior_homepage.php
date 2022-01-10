<?php include('../partials/senior_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="senior-styles.css" />
</head>

<body>
<?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
    <div>


        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        
        <img src="../image/house-homepage.jpg" alt="house-image" width="500px" height="280px">
        <h2>Repair is along the way</h2>
        <p>Request a service and we will help repair your furniture just like a brand new ones.</p>
        <button><a href="request_service_page.html">Request a Service</a></button>
    </div>

    <div>
        <img src="../image/before-after-furniture.jpg" alt="">
        <h2>We repair with care and no fare.</h2>
        <p>In Handyman Senior Club, we highly prioritize your need of support. That is why we offer various types of
            services from different handyman specialists.</p>
        <button onclick="location.href='service_page.html'" type="button">View Available Services</button>
    </div>

    <div>
        <h2>Seniors' Reviews</h2>
        <p>"The home repair services I received from the Handyman Senior Club made me feel so satisfied that I had felt
            belong in a brand new home." - Mr John Welton</p>
        <img src="../image/old-man.jpg" alt="">
        <hr>
        <button><a href="request_service_page.html">Request a Service</a></button>
    </div>
</body>

</html>
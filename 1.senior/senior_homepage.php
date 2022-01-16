<?php include('../shared/senior_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Homepage</title>
    <link rel="stylesheet" type="text/css" href="senior.css" />
</head>

<body>
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['added']))
            {
                echo $_SESSION['added'];
                unset($_SESSION['added']);
            }
            if(isset($_SESSION['added']))
            {
                ;
            }
        ?>

    <section id="hero" class="d-flex align-items-center">

    <div class="container">
    <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Repair is along the way</h1>
            <h2>Request a service and we will help repair your furniture just like a brand new ones.</h2>
            <div class="mt-4">
                <button onclick="location.href='request_service_page.php'" type="button">Request a Service</button>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="../image/Handyman-photo.png" class="img-fluid" alt="">
        </div>
    </div>
    </div>

    </section><!-- End Hero -->
    
    <div class="view-service">
        <h2>We repair with care and no fare.</h2>
        <p>In Handyman Senior Club, we highly prioritize your need of support. That is why we offer various types of
            services from different handyman specialists.</p>
        <button onclick="location.href='service_page.php'" type="button">View Available Services</button>

    </div>
</body>

</html>
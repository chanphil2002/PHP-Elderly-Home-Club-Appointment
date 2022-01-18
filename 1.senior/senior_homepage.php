<?php include('../shared/senior_navigation_bar.php'); 

    $query_senior = "SELECT * FROM `tbl_senior`";
    $query_handyman = "SELECT * FROM `tbl_handyman`";
    $query_service = "SELECT * FROM `tbl_service`";
    $query_appointment = "SELECT * FROM `tbl_appointment`";
    $result1 = mysqli_query($conn, $query_senior);
    $result2 = mysqli_query($conn, $query_handyman);
    $result3 = mysqli_query($conn, $query_service);
    $result4 = mysqli_query($conn, $query_appointment);
    $senior_count = mysqli_num_rows($result1);
    $handyman_count = mysqli_num_rows($result2);
    $service_count = mysqli_num_rows($result3);
    $appointment_count = mysqli_num_rows($result4);
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Homepage</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">
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

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>What Handyman is all about</h3>
          <p>Handyman is a non-profit organization that provides free home repair services to all seniors in the Elderly Home Club. 
            Right now we have</p>
        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center">
            <span class="purecounter"><?php echo $senior_count;?></span>
            <p>Registered Seniors</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span class="purecounter"><?php echo $handyman_count;?></span>
            <p>Available Handyman</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span class="purecounter"><?php echo $service_count;?></span>
            <p>Available Service</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span class="purecounter"><?php echo $appointment_count;?></span>
            <p>Total Appointments Booked</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
</body>

</html>
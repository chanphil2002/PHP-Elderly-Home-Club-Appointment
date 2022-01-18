<?php include('../shared/senior_navigation_bar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Page</title>
  <link rel="stylesheet" type="text/css" href="senior.css" />
</head>

<body>
  <section id="service-list" class="service-list section-bg">
    <div class="container service-container">
      <div class="section-title">
        <h2>All Services</h2>
        <p>We have specialized services for you. There are more to come, but please stay tuned!!</p>
      </div>
      <div class="row justify-content-center mb-2">
        <?php
        $query = "SELECT * FROM `tbl_service`";
        $result = mysqli_query($conn, $query);
        $check_faculty = mysqli_num_rows($result) > 0;

        if ($check_faculty) {
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
              <div class="service">
                <div class="service-img">
                  <?php if ($row['image'] != NULL) {
                  ?>
                    <img src="../img_upload/service_type/<?php echo $row["image"]; ?>" class="img-fluid" alt="No image">
                  <?php
                  } else {
                  ?>
                    <img src="../image/default.jpg" class="img-fluid" alt="No image">
                  <?php
                  }
                  ?>
                </div>
                <div class="service-info">
                  <h4><?php echo $row['service_type']; ?></h4>
                  <span><?php echo $row['description']; ?></span>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="row justify-content-center">
        <div class="mt-2">
          <button onclick="location.href='request_service_page.php'" type="button">Request a Service</button>
        </div>
      </div>
  </section>


</body>

</html>
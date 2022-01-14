<?php include('../shared/senior_navigation_bar.php'); ?>

<?php
    $senior_IC = $_SESSION['seniorlogin'];
    $sql = "SELECT IC, CONCAT(fname, ' ',lname) AS `fullName`, gender, address, phone_number, profile_picture FROM tbl_senior WHERE IC = $senior_IC";
    $result = mysqli_query($conn, $sql);   
    $row = mysqli_fetch_array($result);

    if(isset($_POST['submit'])) 
    {
        $IC = $_POST['IC'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $service_type = $_POST['service-type'];
        $service_description = $_POST['service-description'];
        $req_image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $sql = "INSERT INTO `tbl_appointment`(`service_type`, `senior_IC`, `a_time`, `a_date`, `status`, `description`, `image`) VALUES
             ('$service_type', '$IC',900,90120,'pending','$service_description','$req_image')";

        echo $sql;
        $query = mysqli_query($conn, $sql);

        if($query)
        {
            echo "success";
            move_uploaded_file($tmp_name,"../image/request_service_image/$req_image");
        }
        else
        {
            echo "fail";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="senior.css" />
</head>

<body class="request-service-page">
    <h1>Request Service</h1>
    <p>Our services are dependable, trustworthy, and competent. Please complete the form to the best of your ability,
        and we will respond to you within two working days. On the call, we will discuss about the repairs and confirm
        the appointment schedule.</p>
    <hr>
    <div class="custom-container">
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <div class="custom-container">
            <form class="container" action="" method="post" id="request-service-form" enctype="multipart/form-data">

                    <div class="autofill-box col-auto">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['fullName']?>">
                        <label for="IC">Identity Card No.</label>
                        <input class="form-control" name="IC" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['IC']?>">
                        <label for="gender">Gender</label>
                        <input class="form-control" name="gender" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['gender']?>">
                        <label for="address">Address</label>
                        <input class="form-control" name="address" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['address']?>">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" name="phone" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['phone_number']?>">
                    </div>

                    <div class="input-box col-auto">
                        <label for="service-type">Service Type</label>
                        <select class="form-control" name="service-type" required>Please Select
                            <option value="">Service Type</option>
                            <option value="Bathroom Repair">Bathroom Repair</option>
                            <option value="Ceiling Fan Repair">Ceiling Fan Repair</option>
                            <option value="Deck and Patio Repair">Deck and Patio Repair</option>
                            <option value="Door Repair">Door Repair</option>
                            <option value="Furniture Repair">Furniture Repair</option>
                            <option value="Flooring Repair">Flooring Repair</option>
                            <option value="Gutter Repair">Gutter Repair</option>
                            <option value="Kitchen Repair">Kitchen Repair</option>
                            <option value="Wall Repair">Wall Repair</option>
                            <option value="Window Repair">Window Repair</option>
                        </select>
                    </div>
                    <div class="input-box col-auto">
                        <label for="date">Booking Date:</label>
                        <input type="date" name="date">
                    </div>
                    <div class="input-box col-auto">
                        <label for="appt">Select a time:</label>
                        <input type="time" id="appt" name="appt">
                    </div>
                    <div class="input-box col-auto">
                        <label for="service-description">Service Description</label>    
                        <textarea class="form-control" name="service-description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="input-box col-auto">
                        <label for="images">Upload Images Related to the Services (Up to Three)</label>
                        <input type="file" name="image">
                    </div>
                    <hr>
                    <div class="submit col-auto">
                        <button name="submit" type="submit" form="request-service-form" value="Submit">
                            <a href="senior_homepage.php">Request Service Now</a>
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>


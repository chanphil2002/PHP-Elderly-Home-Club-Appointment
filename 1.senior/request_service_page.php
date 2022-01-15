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
            $_SESSION['add'] = "added";
                                
            move_uploaded_file($tmp_name,"../image/request_service_image/$req_image");
            header("location:".SITEURL."1.senior/senior_homepage.php");
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
    <link rel="stylesheet" type="text/css" href="senior.css" />
</head>

<body class="req-form-page">
    <div class="title text-center">
        <h1>Request Service</h1>
        <p>Our services are dependable, trustworthy, and competent. <br>
           Please complete the form to the best of your ability, and we will respond to you within two working days. <br>
        </p>
    </div>
    <hr>

    <div class="custom-container">
        <form action="" method="post" id="request-service-form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="autofill-box col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['fullName']?>">
                </div>
                <div class="autofill-box col-md-6 mb-3">
                    <label for="IC">Identity Card No.</label>
                    <input class="form-control" name="IC" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['IC']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="autofill-box col-md-6 mb-3">
                    <label for="gender">Gender</label>
                    <input class="form-control" name="gender" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['gender']?>">
                </div>
                <div class="autofill-box col-md-6 mb-3">
                    <label for="phone">Phone Number</label>
                    <input class="form-control" name="phone" type="text" placeholder="Readonly input here…" readonly value="010-2162592">
                </div>
            </div>
            <div class="form-row">
                <div class="autofill-box col-md-12 mb-3">
                    <label for="address">Address</label>
                    <textarea cols="30" rows="3" class="form-control" name="address" type="text" 
                    placeholder="Readonly input here…" readonly value="<?php echo $row['address']?>">
                    </textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="input-box col-md-4 mb-3">
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
            </div>
            <div class="form-row">
                <div class="input-box col-md-4 mb-3">
                    <label for="date">Booking Date:</label>
                    <input type="date" name="date" required>
                </div>
                <div class="input-box col-md-4 mb-3">
                    <label for="appt">Select a time:</label>
                    <input type="time" id="appt" name="appt" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-box col-md-12 mb-3">
                    <label for="service-description">Service Description</label>    
                    <textarea class="form-control" name="service-description" id="" cols="30" rows="3" required></textarea>
                </div>
            </div>  
            <div class="form-row">
                <div class="input-box col-auto">
                    <label for="images">Upload Image Related to the Services</label>
                    <br>
                    <input class="hide_file" id="imagebtn" type="file" name="image">
                </div>
            </div>  
            <hr>
            <div class="form-row">
                <div class="submit col-auto">
                    <button name="submit" type="submit" form="request-service-form" value="Submit">
                        Request Service Now
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>


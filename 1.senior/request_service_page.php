<?php include('../shared/senior_navigation_bar.php'); ?>

<?php
    $senior_IC = $_SESSION['seniorlogin'];
    $sql = "SELECT senior_IC, CONCAT(fname, ' ',lname) AS `fullName`, gender, address, phone_number, profile_picture FROM tbl_senior WHERE senior_IC = $senior_IC";
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
        $date = $_POST['date'];
        $time = $_POST['time'];
        $service_description = $_POST['service-description'];
        $req_image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $sql = "INSERT INTO `tbl_appointment`(`service_type`, `senior_IC`, `a_time`, `a_date`, `status`, `description`, `image`) VALUES
             ('$service_type', '$IC','$time','$date','pending','$service_description','$req_image')";

        $query = mysqli_query($conn, $sql);

        if($query)
        {
            $_SESSION['added'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Request Service Submitted ! Please wait for our approval and always check your appointment in the "<strong>My Profile</strong>" section.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
                                
            move_uploaded_file($tmp_name,"../img_upload/appointment/$req_image");
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
    <title>Request Service</title>
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
                    <input class="form-control" name="IC" type="text" placeholder="Readonly input here…" readonly value="<?php echo $row['senior_IC']?>">
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
                        <?php
                            $query = "SELECT service_type FROM `tbl_service`";
                            $result = mysqli_query($conn, $query);
                            $check_faculty = mysqli_num_rows($result) > 0;

                            if($check_faculty) {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <option value="<?php echo $row['service_type']; ?>"><?php echo $row['service_type']; ?></option>
                                <?php
                            }
                            }
                        ?>
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
                    <input type="time" name="time" required>
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
</body>

</html>


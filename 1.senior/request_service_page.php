<?php include('../partials/senior_navigation_bar.php'); ?>

<?php
    if(isset($_POST['submit'])) 
    {
        $service_type = $_POST['service-type'];
        $service_description = $_POST['service-description'];

        $sql = "INSERT INTO `products`(`name`) VALUES
             ('[$service_type]')";

        $query = mysqli_query($conn, $sql);

        if($query)
        {
            echo "success";
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

<body class="request-page">
    <h1>Request Service</h1>
    <p>Our services are dependable, trustworthy, and competent. Please complete the form to the best of your ability,
        and we will respond to you within two working days. On the call, we will discuss about the repairs and confirm
        the appointment schedule.</p>
    <hr>
    <div class="request-form">
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br><br>
        <form class="container" action="" method="post" id="request-service-form">
            <div class="autofill-box">
                <label for="name">Name</label>
                <input type="text" name="name" id="">
                <label for="IC">Identity Card No.</label>
                <input type="text" name="IC" id="">
            </div>
            <div class="autofill-box">
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="">
                <label for="address">Address</label>
                <textarea name="address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="autofill-box">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="">
            </div>
            <div class="input-box">
                <label for="service-type">Service Type</label>
                <select name="service-type" required>Please Select
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
            <div class="input-box">
                <label for="service-description">Service Description</label>
                <textarea name="service-description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input-box">
                <label for="images">Upload Images Related to the Services (Up to Three)</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="input-box">
                <input type="submit" value="Upload Image" name="submit">
            </div>
            <hr>
            <div class="submit">
                <button type="submit" form="request-service-form" value="Submit">Request Service Now</button>
            </div>
        </form>
    </div>
</body>

</html>


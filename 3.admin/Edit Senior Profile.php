<?php

include '../shared/admin_navigation_bar.php';

$senior_IC = $_SESSION['snrman'];


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$sql = "SELECT fname, lname, gender, senior_IC, phone_number, address, profile_picture FROM tbl_senior WHERE senior_IC = '$senior_IC'";
$result2 = $conn->query($sql);
$rows2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Senior Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Edit.css">

</head>
<?php

if (isset($_REQUEST['Save'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gdr'];
    $handyman_IC = $_POST['IC'];
    $phone_number = $_POST['num'];
    $address = $_POST['addr'];
    $IC = $_POST['IC'];
    $sql = "UPDATE tbl_senior SET fname='$fname', lname='$lname', gender='$gender', phone_number='$phone_number', address='$address'  WHERE senior_IC ='$IC' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert ('Record updated successfully')</script>";
        echo "<script> window.location.assign('View Senior Profile.php'); </script>";
    }

    unset($_SESSION['snrman']);
    // $result = $conn->query($sql);
    // if ($result) {
    //     echo "Success";
    // } else {
    //     echo "Failed";
    // }
}

?>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mt-5 jumbotron" style="margin-right:7%">
            <form action="" method="POST">
                <div class="profile">
                    <img src="img_upload/senior/<?php
                                                if (!$rows2) {
                                                    echo 'profile-picture.png';
                                                } else {
                                                    echo $rows2['profile_picture'];
                                                }
                                                ?>" alt="Profile Image">
                </div>
                <h5 class="text-center">Edit Senior Profile</h5>
                <div class="form-group">
                    <label for="IC">Senior IC</label>
                    <input type="text" class="form-control" id="IC" name="IC" value="<?php if (isset($rows2['senior_IC'])) echo $rows2['senior_IC']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if (isset($rows2['fname'])) echo $rows2['fname']; ?>">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if (isset($rows2['lname'])) echo $rows2['lname']; ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gdr" name="gdr" value="<?php if (isset($rows2['gender'])) echo $rows2['gender']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="addr" name="addr" value="<?php if (isset($rows2['address'])) echo $rows2['address']; ?>">
                </div>
                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="text" class="form-control" id="num" name="num" value="<?php if (isset($rows2['phone_number'])) echo $rows2['phone_number']; ?>">
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-success" name="Save">Save</button>
                    <a href="View Handyman Profile.php" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
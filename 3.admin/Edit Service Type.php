<?php

include '../shared/admin_navigation_bar.php';

$service_type = $_SESSION['service_type'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$sql = "SELECT service_type, description, image FROM tbl_service WHERE service_type = '$service_type' ";
$result2 = $conn->query($sql);
$rows2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Service Type</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Edit.css">

</head>
<?php

if (isset($_REQUEST['Save'])) {
    $service_type = $_POST['service_type'];
    $description = $_POST['description'];

    $sql = "UPDATE tbl_service SET service_type='$service_type', description='$description' WHERE service_type ='$service_type' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert ('Record updated successfully')</script>";
        echo "<script> window.location.assign('View Service Type.php'); </script>";
    }

    unset($_SESSION['service_type']);
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
                    <img src="../img_upload/service_type/<?php
                                                            if (!$rows2) {
                                                                echo 'profile-picture.png';
                                                            } else {
                                                                echo $rows2['image'];
                                                            }
                                                            ?>" alt="Service Image">
                </div>
                <h5 class="text-center">Edit Service Type</h5>
                <div class="form-group">
                    <label for="service_type">Service Type</label>
                    <input type="text" class="form-control" id="IC" name="service_type" value="<?php if (isset($rows2['senior_IC'])) echo $rows2['service_type']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="addr" name="description" value="<?php if (isset($rows2['address'])) echo $rows2['description']; ?>">
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-success" name="Save">Save</button>
                    <a href="View Service Type.php" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
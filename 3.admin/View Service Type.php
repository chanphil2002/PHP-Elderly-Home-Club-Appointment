<?php
include '../shared/admin_navigation_bar.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
<!DOCTYPE html>
<html>

<head>

    <?php

    if (isset($_POST['service_type'])) {
        $_SESSION['serv_type'] = $_POST['service_type'];
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="Edit.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

    <h2 style="margin-top: 3%;">Modify Service Type Page</h2><br>
    <form class="search" method="post">
        <input type="text" autocomplete="off" placeholder="Search By Service Type Name" name="service_type" />
        <input type="submit" style="position: absolute; left: -9999px;" />
    </form>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $service_type = "not available";
    if ($service_type) {
        if (isset($_POST['service_type'])) {
            $service_type = $_POST['service_type'];
        }
    }

    $query = "SELECT service_type, description, image FROM tbl_service WHERE service_type = '$service_type' ";
    $result = $conn->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $sql = "SELECT service_type, description, image FROM tbl_service WHERE service_type = '$service_type' ";
    $result2 = $conn->query($sql);
    $rows2 = mysqli_fetch_array($result2);
    
    if (isset($_REQUEST['delete'])) {
        $service_type = $_SESSION['serv_type'];
        $del = "DELETE FROM tbl_service WHERE service_type = '$service_type'";
        if ($conn->query($del)) {
            echo "<script>alert('Service Type Record Deleted')</script>";
            echo "<script> window.location.assign('View Service Type.php'); </script>";
        }        
    }
    ?>
    <br><br>


    <div class="card_body">
        <div class="info">
            <div class="profile">
                <img src="../img_upload/service_type/<?php
                                                        if (!$rows2) {
                                                            echo 'service_default.jpg';
                                                        } else {
                                                            echo $rows2['image'];
                                                        }
                                                        ?>" alt="Service Image">
            </div>
            <hr>
            <div class="info_data">
                <div class="data">
                    <h3>Service_Type</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['service_type'];
                        }
                        ?></p>
                    <h3>Description</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['description'];
                        } ?></p>
                    <?php
                    if (isset($_POST['service_type'])) {
                        $_SESSION['serv_type'] = $_POST['service_type'];
                        echo '<form action="" method="POST">';
                        echo '<input type="submit" class="btn btn-danger btn-lg active float-right"  name="delete" value="Delete" id="delete">';
                        echo '</form>';
                        echo '<a href="Edit Service Type.php" class="btn btn-secondary btn-lg active float-right mr-3" role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    } else {
                        echo '<a href="#" class="btn btn-danger btn-lg active float-right" role="button" aria-pressed="true">Delete</a>';
                        echo '<a href="#" class="btn btn-secondary btn-lg active float-right mr-3" role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    }
                    ?>
                    <!-- <a href="Edit Handyman Profile.php" class="btn btn-secondary btn-lg active float-right" role="button" aria-pressed="true" name="edit" id="edit">Edit</a> -->
                    <!-- <input type="submit" name="submit" class="btn btn-secondary float-right" value="Edit"> -->
                </div>
            </div>
        </div>
    </div>
</body>
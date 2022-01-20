<?php
include '../shared/admin_navigation_bar.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
<!DOCTYPE html>
<html>

<head>

    <?php

    if (isset($_POST['handyman_IC'])) {
        $_SESSION['hdyman'] = $_POST['handyman_IC'];
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="Edit.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

    <h2 style="margin-top: 3%;">Modify Handyman Profile Page</h2><br>
    <form class="search" method="post">
        <input type="text" autocomplete="off" placeholder="Search By Handyman ID" name="handyman_IC" />
        <input type="submit" style="position: absolute; left: -9999px;" />
    </form>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $handyman_IC = "not available";
    if ($handyman_IC) {
        if (isset($_POST['handyman_IC'])) {
            $handyman_IC = $_POST['handyman_IC'];
        }
    }

    $query = "SELECT fname, lname, gender, handyman_IC, address FROM tbl_handyman WHERE handyman_IC = '$handyman_IC' ";
    $result = $conn->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $sql = "SELECT fname, lname, gender, handyman_IC, phone_number, skills, address, profile_picture FROM tbl_handyman WHERE handyman_IC = '$handyman_IC'";
    $result2 = $conn->query($sql);
    $rows2 = mysqli_fetch_array($result2);

    if (isset($_REQUEST['delete'])) {
        $handyman_IC = $_SESSION['hdyman'];
        $del = "DELETE FROM tbl_handyman WHERE handyman_IC = '$handyman_IC'";
        if ($conn->query($del)) {
            echo "<script>alert('Handyman Record Deleted')</script>";
            echo "<script> window.location.assign('View Handyman Profile.php'); </script>";
        }        
    }
    ?>
    <br><br>


    <div class="card_body">
        <div class="info">
            <div class="profile">
                <img src="../img_upload/handyman/<?php
                                                    if (!$rows2) {
                                                        echo 'profile_default.png';
                                                    } else {
                                                        echo $rows2['profile_picture'];
                                                    }
                                                    ?>" alt="Profile Image">
            </div>
            <?php
            if (!isset($rows2['fname'])) {
                echo "<h1>Handyman's Profile</h1>";
            } else if (isset($_POST['handyman_IC'])) {
                echo "<h1>" . $rows2['fname'] . " " . $rows2['lname'] . "'s
                    Profile</h1>";
            }
            ?>
            <div class="info_data">
                <div class="data">
                    <h3>First Name</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['fname'];
                        }
                        ?></p>
                    <h3>Gender</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['gender'];
                        } ?></p>
                    <h3>Address</h3>
                    <p><span><?php
                                if (!$rows2) {
                                } else {
                                    echo $rows2['address'];
                                } ?></span></p>
                    <h3>Specialized Skills</h3>
                    <p><span><?php
                                if (!$rows2) {
                                } else {
                                    echo $rows2['skills'];
                                } ?></span></p><br>
                    <?php
                    
                    if (isset($_POST['handyman_IC'])) {
                        $_SESSION['hdyman'] = $_POST['handyman_IC'];
                        echo '<form action="" method="POST">';
                        echo '<input type="submit" class="btn btn-danger btn-lg active float-right"  name="delete" value="Delete" id="delete">';
                        echo '</form>';
                        echo '<a href="Edit Handyman Profile.php" class="btn btn-secondary btn-lg active float-right mr-3" role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    } else {
                        echo '<a href="#" class="btn btn-danger btn-lg active float-right" role="button" aria-pressed="true">Delete</a>';
                        echo '<a href="#" class="btn btn-secondary btn-lg active float-right mr-3 " role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    }
                    ?>
                </div>
                <div class="data">
                    <h3>Last Name</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['lname'];
                        } ?></p>
                    <h3>Identity Card No.</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['handyman_IC'];
                        } ?></p>
                    <h3>Phone Number</h3>
                    <p><?php
                        if (!$rows2) {
                        } else {
                            echo $rows2['phone_number'];
                        } ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
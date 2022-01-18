<?php
include '../shared/admin_navigation_bar.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
<!DOCTYPE html>
<html>

<head>

    <?php

    if (isset($_POST['senior_IC'])) {
        $_SESSION['snrman'] = $_POST['senior_IC'];
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="Edit.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

    <h2 style="margin-top: 3%;">Modify Senior Profile Page</h2><br>
    <form class="search" method="post">
        <input type="text" autocomplete="off" placeholder="Search By Senior ID" name="senior_IC" />
        <input type="submit" style="position: absolute; left: -9999px;" />
    </form>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $senior_IC = "not available";
    if ($senior_IC) {
        if (isset($_POST['senior_IC'])) {
            $senior_IC = $_POST['senior_IC'];
        }
    }

    $query = "SELECT fname, lname, gender, senior_IC, address FROM tbl_senior WHERE senior_IC = '$senior_IC' ";
    $result = $conn->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $sql = "SELECT fname, lname, gender, senior_IC, phone_number, address, profile_picture FROM tbl_senior WHERE senior_IC = '$senior_IC'";
    $result2 = $conn->query($sql);
    $rows2 = mysqli_fetch_array($result2);
    ?>
    <br><br>


    <div class="card_body">
        <div class="info">
            <div class="profile">
                <img src="../img_upload/senior/<?php
                                                if (!$rows2) {
                                                    echo 'profile_default.png';
                                                } else {
                                                    echo $rows2['profile_picture'];
                                                }
                                                ?>" alt="Profile Image">
            </div>
            <?php
            if (!isset($rows2['fname'])) {
                echo "<h1>Senior's Profile</h1>";
            } else if (isset($_POST['senior_IC'])) {
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
                                } ?></span></p><br><br>
                    <?php
                    if (isset($_POST['senior_IC'])) {
                        $_SESSION['snrman'] = $_POST['senior_IC'];
                        echo '<a href="Edit Senior Profile.php" class="btn btn-secondary btn-lg active float-right" role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    } else {
                        echo '<a href="#" class="btn btn-secondary btn-lg active float-right" role="button" aria-pressed="true" name="edit" id="edit">Edit</a>';
                    }
                    ?>
                    <!-- <a href="Edit Handyman Profile.php" class="btn btn-secondary btn-lg active float-right" role="button" aria-pressed="true" name="edit" id="edit">Edit</a> -->
                    <!-- <input type="submit" name="submit" class="btn btn-secondary float-right" value="Edit"> -->
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
                            echo $rows2['senior_IC'];
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
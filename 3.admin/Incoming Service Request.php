<?php
include '../shared/admin_navigation_bar.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">


</head>
<div class=div style="display:flex">
    <div class="col-sm-4 mb-5">
        <?php
        $sql = "SELECT prefix, ID, senior_IC, a_time, a_date, description, image, service_type from tbl_appointment where status='Pending'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card mt-5 mx-5">';
                echo '<div class="card-header">';
                echo 'Request ID:' . $row['prefix'], $row['ID'];
                echo '</div>';
                echo '<div class="card-body">';
                echo '<p class="card-title">Senior IC: ' . $row['senior_IC'];
                echo '</p>';
                echo '<p class="card-text"> Date: ' . $row['a_date'];
                echo '</p>';
                echo '<p class="card-text"> Time: ' . $row['a_time'];
                echo '</p>';
                echo '<div class="float-right">';
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="id" value=' . $row["ID"] . '>';
                echo '<input type="submit" class="btn btn-danger mr-3" name="view" value="View">';
                echo '<input type="submit" class="btn btn-secondary" name="close" value="Close">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>

        <?php
        if (isset($_REQUEST['view'])) {
            $sql = "SELECT * FROM tbl_appointment WHERE ID = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }

        if (isset($_REQUEST['assign'])) {
            $handymanIC = $_POST['handymanIC'];
            if (($_REQUEST['handymanIC'] == "") || ($_REQUEST['id'] == "")) {
                $msg = 'Assign A Worker';
            } else {
                $update = "UPDATE tbl_appointment SET status='To Be Completed', handyman_IC = '$handymanIC' WHERE ID = {$_REQUEST['id']}";
                if ($conn->query($update) == TRUE) {
                    $msg = 'Approved and Assigned Worker';
                } else {
                    $msg = 'Failed';
                }
            }
        }

        if (isset($_REQUEST['reject'])) {
            if ($_REQUEST['id'] == "") {
                $msg = 'Choose an appoinment request';
            } else {
                $reject = "UPDATE tbl_appointment SET status='Rejected' WHERE ID = {$_REQUEST['id']}";
                if ($conn->query($reject) == TRUE) {
                    $msg = 'Appointment is rejected';
                } else {
                    $msg = 'Failed';
                }
            }
        }
        ?>
        <div class="clear"></div>
    </div>
    <div class="col-sm-6 mt-5 jumbotron" style="margin-right:7%">
        <form action="" method="POST">
            <h5 class="text-center">Incoming Appointment Request</h5>
            <div class="form-group">
                <label for="ID">Appointment ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($row['ID'])) echo $row['ID']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="seniorIC">Senior IC</label>
                <input type="text" class="form-control" id="seniorIC" name="seniorIC" value="<?php if (isset($row['senior_IC'])) echo $row['senior_IC']; ?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="<?php if (isset($row['a_date'])) echo $row['a_date']; ?>">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" value="<?php if (isset($row['a_time'])) echo $row['a_time']; ?>">
            </div>
            <div class="form-group">
                <label for="servicetyp4e">Service Type</label>
                <input type="text" class="form-control" id="servicetype" name="servicetype" value="<?php if (isset($row['service_type'])) echo $row['service_type']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php if (isset($row['description'])) echo $row['description']; ?>">
            </div>
            <div class="form-group">
                <label for="handymanIC">Handyman IC</label>
                <select name="handymanIC" id="handymanIC" class="form-control"><br><br>
                    <option disabled selected>-- Select Handyman IC --</option>
                    <?php
                    $handyman = mysqli_query($conn, "SELECT handyman_IC From tbl_handyman");  // Use select query here 

                    while ($data = mysqli_fetch_array($handyman)) {
                        echo "<option value='" . $data['handyman_IC'] . "'>" . $data['handyman_IC'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
                <!-- <input type="text" class="form-control" id="handymanIC" name="handymanIC"> -->
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success" name="assign">Assign</button>
                <button type="submit" class="btn btn-danger" name="reject">Reject</button>
            </div>
        </form>
        <?php if (isset($msg)) {
            echo "<script>alert('$msg')</script>";
            echo "<script> window.location.assign('Incoming Service Request.php'); </script>";
        }
        ?>
    </div>

    <!--JavaScript -->
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
</div>
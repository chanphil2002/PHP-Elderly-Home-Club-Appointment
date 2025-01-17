<?php include '../shared/admin_navigation_bar.php';

// include 'admin_navigation_bar.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$IC = $_POST['IC'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$skills = $_POST['skills'];
	$password = $_POST['password'];
	$profile_picture = $_FILES['profile_picture']['name'];
	$tmp_name = $_FILES['profile_picture']['tmp_name'];

	$sql = "SELECT * FROM tbl_handyman WHERE IC='$IC'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$upload = "INSERT INTO tbl_handyman  VALUES ('$IC', 
            '$fname','$lname', '$gender', '$skills', '$address','$phone_number', '$password','$profile_picture')";
		$run_upload = mysqli_query($conn, $upload);
		if ($run_upload === true) {
			echo "<script>alert('Registration Complete!')</script>";
			echo "<script> window.location.assign('../3.admin/Handyman Registration Form.php'); </script>";
			move_uploaded_file($tmp_name, "../img_upload/handyman/$profile_picture");
		} else {
			echo "Failed, Try Again";
		}
	} else {
		echo "<script>alert('Identity Card Number Already Exists, Please Try Again')</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Handyman Registration Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="HandymanRegistration.css" />
	<meta name="robots" content="noindex, follow">
</head>

<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="../image/handyman9.jpg" alt="form">
			</div>
			<form class="form-detail" action="#" method="post" id="myform" enctype="multipart/form-data">
				<div class="form-row">
					<strong>
						<h2 class="text-1">Handyman Registration Page</h2>
					</strong>
					<label for="fname">FIRST NAME *</label>
					<input type="text" name="fname" id="fname" class="input-text">
				</div>
				<div class="form-row">
					<label for="lname">LAST NAME *</label>
					<input type="text" name="lname" id="lname" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="gender">GENDER *</label>
					<select class="form-row" name="gender" id="gender" style="height: 25px; margin-top: 3%;" required>
						<option value="">Choose Your Gender *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<br>
				<div class="form-row">
					<br><label for="IC">Identity Card Number *</label>
					<input type="text" name="IC" id="IC" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="password">Password *</label>
					<input type="password" name="password" id="password" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="phone_number">Phone Number *</label>
					<input type="text" name="phone_number" id="phone_number" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="address">Address *</label>
					<input type="text" name="address" id="address" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="skills">Specialized Skills *</label>
					<select class="form-row" name="skills" id="skills" style="height:25px; margin-top: 3%;">
						<option value="">Choose Your Skills &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
						<?php
						$query = "SELECT service_type FROM `tbl_service`";
						$result = mysqli_query($conn, $query);
						$check_faculty = mysqli_num_rows($result) > 0;

						if ($check_faculty) {
							while ($row = mysqli_fetch_array($result)) {
						?>
								<option value="<?php echo $row['service_type']; ?>"><?php echo $row['service_type']; ?></option>
						<?php
							}
						}
						?>
					</select>
				</div>
				<br>
				<div class="form-row">
					<br><br><label for="profile_picture">Upload Handyman's Image *</label><br><br>
					<input type="file" name="profile_picture" id="profile_picture" accept="image/*">
					<br>
					<br>
				</div>
				<div class="form-row-last">
					<input type="submit" name="submit" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		// jQuery.validator.setDefaults({
		// 	debug: true,
		// 	success: function(label) {
		// 		label.attr('id', 'valid');
		// 	},
		// });
		// $("#myform").validate({
		// 	rules: {
		// 	    your_email: {
		// 	      	required: true,
		// 	      	email: true
		// 	    },
		// 	    password: "required",
		// 		comfirm_password: {
		// 	  		equalTo: "#password"
		// 		}
		// 	},
		// 	messages: {
		// 		username: {
		// 			required: "Please enter an username"
		// 		},
		// 		your_email: {
		// 			required: "Please provide an email"
		// 		},
		// 		password: {
		// 			required: "Please provide a password"
		// 		},
		// 		comfirm_password: {
		// 			required: "Please provide a password",
		// 	  		equalTo: "Wrong Password"
		// 		}
		// }
		// });
	</script>
</body>

</html>
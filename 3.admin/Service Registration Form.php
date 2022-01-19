<?php include '../shared/admin_navigation_bar.php';

// include 'admin_navigation_bar.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$service_type = $_POST['service-type'];
	$description = $_POST['description'];
	$service_image = $_FILES['service-image']['name'];
	$tmp_name = $_FILES['service-image']['tmp_name'];

	$sql = "SELECT * FROM tbl_service WHERE service_type='$service_type'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$upload = "INSERT INTO tbl_service VALUES ('$service_type', 
            '$description','$service_image')";
		$run_upload = mysqli_query($conn, $upload);
		if ($run_upload === true) {
			echo "<script>alert('Registration Complete!')</script>";
			echo "<script> window.location.assign('../3.admin/Service Registration Form.php'); </script>";
			move_uploaded_file($tmp_name, "../img_upload/service_type/$service_image");
		} else {
			echo "Failed, Try Again";
		}
	} else {
		echo "<script>alert('Service Type Already Exists, Please Try Again')</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Service Registration Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="HandymanRegistration.css" />
	<meta name="robots" content="noindex, follow">
</head>

<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="../image/Service Thumbnail.jpg" alt="form">
			</div>
			<form class="form-detail" action="#" method="post" id="myform" enctype="multipart/form-data">
				<div class="form-row">
					<strong>
						<h2 class="text-1">Service Registration Page</h2>
					</strong>
					<label for="service-type">Service Type *</label>
					<input type="text" name="service-type" class="input-text">
				</div>
				<div class="form-row">
					<label for="description">Description *</label>
					<input type="text" name="description" class="input-text" required>
				</div>
				<div class="form-row">
					<br><br><label for="service-image">Upload Service Type Image *</label><br><br>
					<input type="file" name="service-image" accept="image/*" required>
					<br>
					<br>
				</div>
				<div class="form-row-last">
					<input type="submit" name="submit" class="register" value="Create New Service">
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
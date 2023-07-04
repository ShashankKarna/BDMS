<?php
$id = $_GET['userid'];
if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_FILES['editphoto'])) {
	include '_dbconnect.php';
	$editName = $_POST["editname"];
	$editEmail = $_POST["editemail"];
	$editContact = $_POST["editcontact"];
	$editBusinessName = $_POST["editbusiness-name"];
	$editLocation = $_POST["editlocation"];
	$editPassword = $_POST["editpassword"];
	$editdesc = $_POST["editdesc"];

	$editname  = str_replace("<", "&lt;", $editname);
	$editname  = str_replace(">", "&gt;", $editname);

	$editEmail = str_replace("<", "&lt;", $editEmail);
	$editEmail = str_replace(">", "&gt;", $editEmail);

	$editdesc  = str_replace("<", "&lt;", $editdesc);
	$editdesc  = str_replace(">", "&gt;", $editdesc);

	$contact = str_replace("<", "&lt;", $contact);
	$contact = str_replace(">", "&gt;", $contact);

	$businessName = str_replace(">", "&gt;", $businessName);
	$businessName = str_replace(">", "&gt;", $businessName);

	$editLocation = str_replace(">", "&gt;", $editLocation);
	$editLocation = str_replace(">", "&gt;", $editLocation);

	$editPassword = str_replace(">", "&gt;", $editPassword);
	$editPassword = str_replace(">", "&gt;", $editPassword);

	// hashing password || securing the password in database
	$hash = password_hash($editPassword, PASSWORD_DEFAULT);

	//fetching image 
	$img_name = $_FILES['editphoto']['name'];
	$img_size = $_FILES['editphoto']['size'];
	$tmp_name = $_FILES['editphoto']['tmp_name'];
	$error = $_FILES['editphoto']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry,_your_file_is_too_large.";
			header("Location: /BDMS/userdashboard.php?userid=$id?error=$em");
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = 'business image/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
			} else {
				$em = "You_can't_upload_files_of_this_type";
				header("Location: /BDMS/userdashboard.php?userid=$id?error=$em");
			}
		}
	} else {
		$em = "Unknown_Error_Occurred!";
		header("Location: /BDMS/userdashboard.php?userid=$id?error=$em");
	}
	// Updating database
	$sql = "UPDATE `users` SET `user_name` = '$editName',  `user_email` = '$editEmail',  `user_phone` = '$editContact', `business_name` = '$editBusinessName', 
	`business_location` = '$editLocation', `user_password` = '$hash', `business_image` = '$new_img_name', `business_description` = '$editdesc' WHERE `user_id` = '$id' ";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "Success";
	} else {
		echo "sorry";
	}
}

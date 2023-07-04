<?php

if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_FILES['photo'])) {
    
    include '_dbconnect.php';


    // gathered users information  
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $businessName = $_POST['business-name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $desc = $_POST['description'];

	$name  = str_replace("<", "&lt;" , $name);
	$name  = str_replace(">", "&gt;", $name);

	$email = str_replace("<", "&lt;" ,$email);
	$email = str_replace(">", "&gt;",$email);

	$desc  = str_replace("<", "&lt;" ,$desc);
	$desc  = str_replace(">", "&gt;",$desc);

	$contact = str_replace("<", "&lt;" , $contact);
	$contact = str_replace(">", "&gt;", $contact);

	$businessName = str_replace(">", "&gt;", $businessName);
	$businessName = str_replace(">", "&gt;", $businessName);

	$location = str_replace(">", "&gt;", $location);
	$location = str_replace(">", "&gt;", $location);
	
	$password = str_replace(">", "&gt;", $password);
	$password = str_replace(">", "&gt;", $password);
	// hashing password || securing the password in database
	$hash = password_hash($password, PASSWORD_DEFAULT);
   
	

    //fetching image 
	$img_name = $_FILES['photo']['name'];
	$img_size = $_FILES['photo']['size'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$error = $_FILES['photo']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: /BDMS/register.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'business image/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				// $sql = "INSERT INTO images(image_url) 
				//         VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);
				// header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: /BDMS/register.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: /BDMS/register.php?error=$em");
	}



    // insert data into database
    $sql =" INSERT INTO `users` (`user_name`, `user_email`, `user_phone`, `business_name`, `business_category`, `business_location`, `user_password`, `business_image`, `business_description`, `date`) 
    VALUES ('$name', '$email', '$contact', '$businessName', '$category', '$location', '$hash', '$new_img_name', '$desc', current_timestamp())";
    $result = mysqli_query($conn, $sql);
   

}
else {
	$em = "unknown error occurred!";
		header("Location: /BDMS/register.php?error=$em");
}



    


?>
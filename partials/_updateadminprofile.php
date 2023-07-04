<?php
	$id = $_GET['userid'];
	if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_FILES['editphoto'])) {
		include '_dbconnect.php';
        $editName = $_POST["editname"];
        $editEmail = $_POST["editemail"];
        $editContact = $_POST["editcontact"];
        $editPassword = $_POST["editpassword"];
	
		$editName  = str_replace("<", "&lt;" , $editName);
        $editName  = str_replace(">", "&gt;", $editName);

        $editEmail = str_replace("<", "&lt;" ,$editEmail);
        $editEmail = str_replace(">", "&gt;",$editEmail);

        $editContact  = str_replace("<", "&lt;" ,$editContact);
        $editContact  = str_replace(">", "&gt;",$editContact);

        $editPassword  = str_replace("<", "&lt;" ,$editPassword);
        $editPassword  = str_replace(">", "&gt;",$editPassword);
		
        // hashing password || securing the password in database
	    $hash = password_hash($editPassword, PASSWORD_DEFAULT);
        


        //fetching image 
		$img_name = $_FILES['editphoto']['name'];
		$img_size = $_FILES['editphoto']['size'];
		$tmp_name = $_FILES['editphoto']['tmp_name'];
		$error = $_FILES['editphoto']['error'];

	if ($error === 0) {
		if ($img_size > 5000000) {
			$em = "Sorry,_your_file_is_too_large.";
		    header("Location: /BDMS/admindashboard.php?userid=$id?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'admin image/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

			}else {
				$em = "You_can't_upload_files_of_this_type";
                header("Location: /BDMS/admindashboard.php?userid=$id?error=$em");
			}
		}
	}else {
		$em = "Unknown_Error_Occurred!";
		header("Location: /BDMS/admindashboard.php?userid=$id?error=$em");
	}
	// Updating database
	$sql = "UPDATE `admin` SET `admin_name` = '$editName',  `admin_email` = '$editEmail',  `admin_contact` = '$editContact', `admin_password` = '$hash', `admin_image` = '$new_img_name' WHERE `admin_id` = '$id' ";
    $result = mysqli_query($conn, $sql);
	if($result){
		header("Location: /BDMS/admindashboard.php?userid=$id");
	}else{
		$em = "Unknown_Error_Occurred!";
        header("Location: /BDMS/admindashboard.php?userid=$id?$em");

	}
   
}

?>
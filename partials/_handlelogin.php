<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $em;
    $loginEmail = $_POST['email'];
    $loginPassword = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `user_email` = '$loginEmail'";
    $result = mysqli_query($conn, $sql);


    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        $loginName = $row['user_name'];
        $id = $row['user_id'];
        if(password_verify($loginPassword, $row['user_password'])){
            session_start();
            $_SESSION['userLoggedin'] = true;
            $_SESSION['userEmail'] = $loginEmail;
            $_SESSION['userName'] = $loginName;
            $_SESSION['userid'] = $id;
            echo "logged in". $loginEmail;
            header("location: /BDMS/index.php?userid=$id ");
        }
        else{
            echo 'Unable to login';
            header("location: /BDMS/login.php?userid=$id");
        }
        
    }else{
        echo 'Unable to login';
        header("location: /BDMS/login.php?userid=$id");
    }
}
// validate email
if(empty($loginEmail)){
    $em = "Enter an Email";
}
// validate password
if(empty($loginEmail)){
    $em = "Enter a password";
}



?>
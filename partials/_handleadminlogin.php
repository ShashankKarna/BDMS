<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "_dbconnect.php";

        $email  = $_POST['email'];
        $password  = $_POST['password'];
        $sql = "SELECT * FROM `admin` WHERE `admin_email` = '$email'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
        if($num == 1){
            $row = mysqli_fetch_assoc($result);
            $loginId = $row['admin_id'];
            $loginName = $row['admin_name'];
            $loginContact = $row['admin_contact'];
            $loginEmail = $row['admin_email'];
            // if(password_verify($password, $row['admin_password'])){
            if($password == $row['admin_password']){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $loginEmail;
                $_SESSION['userName'] = $loginName;
                $_SESSION['userid'] = $id;
                echo "logged in". $loginEmail;
                header("location: /BDMS/admindashboard.php?userid=$loginId ");
            }
            else{
                echo 'Unable to login';
                header("location: /BDMS/admindashboard.php?userid=$loginId ");
            }
            
        }else{
            echo 'Unable to login';
            header("location: /BDMS/admindashboard.php?userid=$loginId ");
        }
    }

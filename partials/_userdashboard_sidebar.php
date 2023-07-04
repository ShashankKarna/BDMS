<?php include '_dbconnect.php'; ?>
<?php $id = $_GET['userid']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="/BDMS/css/userdashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
$sql = "SELECT  `business_image` FROM `users` WHERE `user_id` = '$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
        $businessImage = $row['business_image'];
    }

   echo ' <section id="sidebar">
        <div>
            <img src="partials/business image/'.$businessImage.'" alt="store-image" class="store-img" height="150" width="175">
            <div class="hrline"></div>
        </div>

        <div class="icons">
            <ul>
                <li class="list-icons"><a href="userdashboard.php?userid='.$id.'"><i class="fa-solid fa-user faicons"></i>USER PROFILE</a></li>
                <li class="list-icons"><a href="_addmap.php?userid='.$id.'"><i class="fa-solid fa-location-dot faicons"></i>ADD YOUR LOCATION</a></li>
                <li class="list-icons"><a href="index.php?userid='.$id.'"><i class="fa-solid fa-house faicons"></i>HOME</a></li>
                <li class="list-icons"><a href="partials/_logout.php"><i class="fa-solid fa-arrow-right-from-bracket faicons"></i>SIGN OUT</a></li>
            </ul>

        </div>
    </section>';?>

</body>

</html>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>

    <style>
    /* CSS Reset */
    * {
        margin: 0;
        padding: 0;
    }
    html {
        scroll-behavior: smooth;
        font-family: Nanum Gothic;
    }
    /* CSS Variables */
    :root {
        --navbar-height: 59px;
    }
    #navbar {
        display: flex;
        align-items: center;

    }
    #navbar::before {
        content: "";
        background-color: black;
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        z-index: -1;
        opacity: 0;
    }
    #logo{
        border-radius: 300px;
        padding: 10px;
    }

    /* Navigation Bar: List Styling */
    #navbar ul {
        display: flex;
        /* border: 2px solid red; */
        position: absolute;
        right: 17em;
        top: 1.5rem;

    }
    #navbar ul li {
        list-style: none;
    }
    #navbar ul li a {
        margin: 2px 8px;
        padding: 2px 2px;
        font-size: 1.6rem;
        color:#dee2e6;
        text-decoration: none;
        
    }
    .faicons{
    /* border: 2px solid red; */
    position: absolute;
    font-size: 25px;
    display: inline;
    bottom: 0.5rem;
    right: 4.5rem;
    margin: 1rem 1rem 0 0;
}
    #navbar ul li a:hover {
        border-radius: 8px;
        color: #fff;
    }
    
    #navbar button {
        margin: 0 0 0 1em;
        height: 2.2rem;
        font-size: 0.7rem;
        border-style: none;
        border-radius: 5px;

    }
   .falogout{
    margin-left: 0.5rem;
    font-size: 20px;
    
   }
    #navbar .btn-grp :hover {

        color: rgba(0, 0, 0, 0.553);
    }
    #nav-btn {
        display: flex;
        position: absolute;
        right: 3.5em;
        top: 1.2rem;

    

    }
    #nav-btn  .welcome {
      color:#ced4da;
      position:absolute;
      text-decoration: none;
      font-size:18px;
      right:6.4rem;
      max-width:110%
      
    }
    #nav-btn  .welcome:hover {
      color: #fff; 
    }
 #nav-btn button:nth-child(1){

        background-color: #198754;

   }
    #nav-btn button:nth-child(2){

        background-color: #dc3545;


    }
    #navbar button a {
        text-decoration: none;
        font-size: 1.4rem;
        padding: 3px 4px;
        margin: 2px 3px;
        color: white;
        font-family: Nanum Gothic;

    }
    #navbar .line {
        height: 2em;
        width: 4px;
        background-color: #fff;

    }

    /* Home Section */
    #home-img {
        display: flex;
        flex-direction: column;
        padding: 3px 200px;
        height: 280px;
        justify-content: center;
        align-items: center;
       
    }

    #home-img::before {
        content: "";
        position: absolute;
        background: url('img/123.jpg') no-repeat center center/cover ;
        height: 450px;
        top: 0px;
        left: 0px;
        width: 100%;
        z-index: -1;
        opacity: 10;
    }

    </style>
   
     
</head>

<body>
    <?php 
       
       echo '<div id="container">
            <nav id="navbar">
                <div >
                    <a href="index.php"><img src="img/logo.png" id="logo" width="100"
                            height="100"
                            alt="nepal business directory.com"></a>
                </div>

                <ul>
                    <li class="item"><a href="index.php" class = "navitems" >Home</a></li>
                    <div class="line"></div>
                    <li class="item"><a href="businesslist.php" class = "navitems" > Business
                            Lists </a></li>
                    <div class="line"></div>
                    <li class="item"><a href="contact.php" class = "navitems" > Contact Us</a></li>
                </ul>';
                
               
                   
                
                
                    echo '<div id="nav-btn" class="btn-group">
                    ';
                   if(isset($_SESSION['userLoggedin']) && $_SESSION['userLoggedin'] == true){

                   echo ' 
                   <a href = "userdashboard.php?userid='.$_SESSION['userid'].'" class = "welcome "><i class="fa-solid fa-user faicons"></i>Welcome, &nbsp;&nbsp; '.$_SESSION['userName'].' </a>';
             
                   echo ' <button id = "btnlogout"class="btn-grp logout" style = "background-color:#dc3545; position:relative;left:1.5rem;"><a href="/BDMS/partials/_logout.php">Logout<i class="fa-solid fa-arrow-right-from-bracket falogout"></i></a></button>';
                }
                    else{
                        echo '<button class="btn-grp login"><a href="login.php">Login</a></button>
                    <button class="btn-grp register"><a href="register.php">Register</a></button>
                </div>';
                    }
            echo '</nav>

        </div>';
                
       echo ' <section id="home-img">
            <div class="img">

            </div>
        </section>';?>
        
</body>

</html>
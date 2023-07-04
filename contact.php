<?php
    include 'partials/_dbconnect.php';
    $showAlert = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["contact-name"];
        $email = $_POST["contact-email"];
        $desc = $_POST["contact-desc"];
        $name  = str_replace("<", "&lt;" , $name);
        $name  = str_replace(">", "&gt;", $name);
        $email = str_replace("<", "&lt;" ,$email);
        $email = str_replace(">", "&gt;",$email);
        $desc  = str_replace("<", "&lt;" ,$desc);
        $desc  = str_replace(">", "&gt;",$desc);
        $sql = "INSERT INTO `contactus` (`contact_name`, `contact_email`, `contact_description`) VALUES
        ('$name', '$email', '$desc')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
            header("Location: /BDMS/contact.php");
        }
        else{
           $em = "Unable to post your queries";
           header("Location: /BDMS/contact.php?$em");
           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script src="js/contact.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <style>
        #success{
            display: none;
            background-color: #d4edda;
            padding: 3px 1rem;
            margin-bottom: 1rem;
            height: 2rem;
            width: 37%;
            align-items: center;
            border-radius: 5px;
            border: #c3e6cb;
        }
        #failure{
            display: none;
            background-color: #f8d7da;
            padding: 3px 1rem;
            margin-bottom: 1rem;
            height: 2rem;
            width: 37%;
            align-items: center;
            border-radius: 5px;
            border: #f5c6cb;
        }
    </style>
</head>
<body>
    <?php include 'partials/_header.php';?>

    <section id="contact-section">
        <h1>Contact Us</h1>
    </section>



    <section id="contact-form">
        <div>
            <h1 class="send-message">Send Your Message</h1>
            <h6 class="contact-desc">Please feel free to contact us if you have queries,
                require more information or have any other request.</h6>
        </div>
        <div>
            <form action="contact.php" method="post" name="contactForm" onsubmit="return displayMsg()" enctype="multipart/form-data">
               <p id="success">Your message is submitted successfully.</p>
               <p id="failure">Please fill up the form before submitting.</p>
            <div class="form-group">
                    <input type="text" class="name" id="contact-name"name="contact-name" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <input type="text" class="email" id="contact-email" name="contact-email" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <textarea name="contact-desc" id="contact-desc" cols="30" rows="10"
                        placeholder="Enter your queries...."></textarea>
                </div>

                <button class="submit-form"> Submit </button>
            </form>
        </div>
    </section>


    <section class="contact-details">

      <div>
      <h5> Contact Us</h5>
        <p> <strong>Email:</strong> businesshub@gmail.com</p>
        <p><strong>Phone no.: </strong> 9867166198 | 9847158244</p>
        <p><strong>Address:</strong> Tinkune, Kathmandu</p>
        <p><strong>Follow Us:</strong> social icons</p>
      </div>
    </section>

    <section class="bhub-map">
    
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220.80998778254565!2d85.34791394900795!3d27.687637186270535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190fffffffcf%3A0xcd79fd6c4087f48d!2sPadmashree%20Int&#39;l%20College!5e0!3m2!1sen!2snp!4v1659117077540!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>


    <?php include 'partials/_footer.php';?>
</body>

</html>
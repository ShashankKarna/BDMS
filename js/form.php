<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            display: block;
            margin: 1rem;
        }
    </style>
</head>
<body>
<section id="register-form">
        <form action="partials/_handlesignup.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="username" id="username" name="name" placeholder="Enter your full name">
                <small id="errName">Name should contain letters only</small>
            </div>

            <div class="form-group">
                <input type="email" class="email" id="useremail" name="email" placeholder="Enter email">
                <small id="errEmail">Enter a valid email address</small>
            </div>

            <div class="form-group">
                <input type="text" class="contact" id="usercontact" name="contact" placeholder="Contact no.">
                <small id="errPhone">Contact no. should be 10 characters long.</small>

            </div>

            <div class="form-group">
                <input type="text" class="business-name" name="business-name" placeholder="Business name">
                <small id="errBusiness">Enter your business name.</small>
                

            </div>


            <select name="category" id="category">
                <option value="0">-- Select Category --</option>
                <option value="Electronic Shop">Electronic Shop</option>
                <option value="Fashion">Fashion</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Vehicles">Vehicles</option>
                <option value="Real Estate">Real Estate</option>
            </select>
            <small id="errCategory">Select Your business Category.</small>

            <div class="form-group">
                <input type="text" class="location" name="location" placeholder="Location">
                <small id="errLocation">Enter your business location.</small>

            </div>

            <div class="form-group">
                <input type="password" class="password" id="userpassword" name="password" placeholder="Create password">
                <small id="errPassword">Password should be greater than 8 characters long.</small>

            </div>

            <div class="form-group">
                <input type="password" class="password" id="repassword" name="repassword" placeholder="Re-type password">
                <small id="errRePassword">Password didn't matched.</small>

            </div>

            <input type="file" name="photo" accept="image/png, image/gif, image/jpeg">
            
            <div class="container">
                <?php if (isset($_GET['error'])): ?>
                <p><?php echo "<span>".$_GET['error']."</span>"; ?></p>
                <?php endif ?>
            </div>


            <div class="form-group">
                <textarea name="description" id="" cols="30" rows="10"
                    placeholder="Enter business description...."></textarea>
               

            </div>

            <!-- <div class="form-group">
        <input type="checkbox" class="terms" name="terms">  
        <label for="terms" class="terms">I accept terms and conditions.</label> -->

            </div>
            <button class="register-btn" type="submit" name="submit"> Register</button>
        </form>
    </section>
    <script>
        const name = document.getElementById('username');
        const pass = document.getElementById('pass');
        const email = document.getElementById('email');

        name.addEventListener('blur', ()=>{
            console.log("name is clicked")
        })
    </script>
</body>
</html>
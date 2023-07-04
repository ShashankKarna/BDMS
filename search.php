<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/_search.css">
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>
    <section id="title">
        <div>
            <h1 class="search-heading">Search Listings</h1>
        </div>
    </section>

    <?php 
        $noresult = true;
        $searchName = $_GET['searchName'];
        $searchLocation = $_GET['searchLocation'];

        // $sql = "ALTER TABLE `users` ADD FULLTEXT(`business_name`, `business_location`)";
        // $result = mysqli_query($conn, $sql);
        $sql1 = "SELECT * FROM `users` WHERE MATCH (`business_name`, `business_location`) against ('$searchName $searchLocation') LIMIT 0, 25";
     
        $result1 = mysqli_query($conn, $sql1);
            while($row = mysqli_fetch_assoc($result1)){
                $noresult = false;

                $businessTitle = $row['business_name'];
                $contact = $row['user_phone'];
                $address = $row['business_location'];
                $businessImage = $row['business_image'];
             echo ' <section class="business-list">
                <div class="box-item">
                <a href="explorebusiness.php?id='.$row['user_id'].'"> <img src="partials/business image/'.$businessImage.'" width="350" height="200" class="store-img" alt="store image"></a>
                </div>
                <div class="business-name">
                <button disabled="disabled" class="business-title">'.$businessTitle.'</button>
                <div class="title">
                <h3 class="store-name"> <a href="explorebusiness.php?id='.$row['user_id'].' ">'.$businessTitle.'</a></h3>
                <p class="store-address">'.$address.'</p>
                <p class="store-address">'.$contact.'</p>
                </div>
                </section>';
            }
            if($noresult){
                echo '
                
                <section id="result">
                <div id="no-result">
                    <h4>No results Found!!!</h4>
                    <p>Your search  did not match any documents.
                    <ul><b>Suggestions:</b>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                    </ul>
                    </p>
                </div>
                </section>
                ';
            }

            ?>
            
    <section id="btn-group">

        <a href="" class="btn-lists">First</a>
        <a href="" class="btn-lists">
            < Prev </a>
      <a href=""class="btn-lists">Next ></a>
      <a href=""class="btn-lists">Last</a>
      </section>

     
    <?php include "partials/_footer.php";?>
</body>
</html>

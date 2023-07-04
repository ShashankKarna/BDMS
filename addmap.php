<?php session_start(); ?>

<?php include 'partials/_dbconnect.php'; ?>

<?php $id = $_GET['userid']; 
if(isset($_GET['userid']) && isset($_GET['mapid'])){
    $mapId = $_GET['mapid'];
    $sql3 = "DELETE FROM `map` WHERE `user_id` = $mapId";
    $reslut3 = mysqli_query($conn, $sql3);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Location</title>
    <link rel="stylesheet" href="css/_addmap.css">
</head>
<body>
    <?php include 'partials/_userdashboard_sidebar.php'; 
    if (isset($_SESSION['userLoggedin']) && $_SESSION['userLoggedin'] == true) {

   echo' <h2 class="title">Add Your Location</h2>
    <div class = "linebreak"></div>

    <section id="addmap">
        <fieldset class="fieldset">
            <legend>Add to Map</legend>
            <form action="" method="post" class = "edit">
                <div class="edit-group">
                    <input type="text" class="username edit-map" name="latitude" placeholder="Enter Latitude">
                </div>

                <div class="edit-group">
                    <input type="text" class="password edit-map" name="longitude" placeholder="Enter Longitude">
                </div>
               
            <button class="edit-profile" type="submit" name="submit">Set Map</button>
            </form>
        </fieldset>
    </section>';
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];

        $sql = "INSERT INTO `map` (`user_id`, `latitude`, `longitude`) VALUES
        ('$id', '$latitude', '$longitude')";
        $result = mysqli_query($conn, $sql);  
}


   
    $sql2 = "SELECT * FROM `map` WHERE `user_id` = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    while($rows = mysqli_fetch_assoc($result2)){
        $mapId = $rows['map_id'];
        $getLatitude = $rows['latitude'];
        $getLongitude = $rows['longitude'];
}
   echo ' <section id="searchmap">
    <div>
        <h4 class = "mapTitle">Your Map</h4>
    </div>
        <div class="map">
                <iframe src="https://www.google.com/maps?q='.$getLatitude.','.$getLongitude.'&hl=es;z=14&output=embed" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div>
        <button id = "d'.$mapId.'" class="edit-profile delete deltebtn" name="submit">Delete Map</button>
        
        </div>
    </section>';}
    ?>


    
    <script>
    
        deletes = document.getElementsByClassName("delete");
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click", (e)=>{
               let sno = e.target.id.substr(1);

               if(confirm("Do you really want to delete this location map?")){
                window.location = `_addmap.php?userid=<?php echo $id; ?>&mapid=<?php echo $mapId; ?> `
                alert("Map was deleted successfully");

            }else{
                alert("Map was not deleted");
            }
            });
        });


    </script>
</body>
</html>

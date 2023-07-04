<?php
        // database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "businesshub";

        $conn = mysqli_connect($servername, $username, $password, $database);

       
        if(!$conn){
            die ("Error connecting database: ". mysqli_connect_error());
        }
        // else{
        //     echo "Connection successful";
        // }
?>
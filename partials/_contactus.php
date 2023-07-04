<?php
   include "_dbconnect.php"
?>
<?php
    
   
?>
<?php session_start(); 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    if(isset($_GET['delete']) && isset($_GET['userid'])){
        $dId = $_GET['delete'];
        
        $sql3 = "DELETE FROM `contactus` WHERE `contact_id` = $dId";
        $reslut3 = mysqli_query($conn, $sql3);
    }
echo '
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
   <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/BDMS/css/_contactus.css">
   <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script src="https://kit.fontawesome.com/8eb118b539.js" crossorigin="anonymous"></script>
   <script src="jquery-3.6.0.min.js"></script>
   <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>';

echo '<section id="sidebar">';

        $id = $_GET['userid'];
        $sql = "SELECT * FROM `admin` WHERE `admin_id` = '$id'";
        $result = mysqli_query($conn, $sql);

           while( $row = mysqli_fetch_assoc($result)){
            $loginId = $row['admin_id'];
            $loginName = $row['admin_name'];
            $loginContact = $row['admin_contact'];
            $loginEmail = $row['admin_email'];
            $adminImage = $row['admin_image'];
        }
       
        echo '
        <div>
            <img src="admin image/'.$adminImage.'" alt="store-image" class="store-img" height="150" width="175">
           
            <div class="hrline"></div>
        </div>
        </section>

        <section id="admin-desc">
                <div class="details">
                <p class="details-items"> <i class="fa-solid fa-user-gear admin"></i> <strong> Admin Name:</strong></p>
                <p class="details-items">'.$loginName.'</p>
                <p class="details-items"> <i class="fa-solid fa-envelope admin"></i> <strong> E-mail:</strong></p>
                <p class="details-items">'.$loginEmail.'</p>
                <p class="details-items"> <i class="fa-solid fa-phone admin"></i> <strong> Contact:</strong></p>
                <p class="details-items">'.$loginContact.'</p>
            </div>
            
            <div class="icons">
            <ul>
      
                <li class="list-icons"><a href="_contactus.php?userid='.$id.'"><i class="fa-solid fa-message"></i>Message</a></li>
                <li class="list-icons"><a href="_adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>SIGN OUT</a></li>
            </ul>
            </i>
    </a>
        </div>
    </section>';
        
   

   echo '
       <div id = "back">
       <ul>
       <li class="list-icons"><a href="/BDMS/admindashboard.php?userid='.$id.'"><i class="fa-solid fa-arrow-left-long solid"></i>Back</a></li></div>
        <div class = "line-break"></div>

        <section id="datatable">
                   
        <table id="myTable">
        <thead >
         <tr id="table-head" >
         <th class="thead">S.no</th>
         <th class="thead">Name</th>
         <th class="thead">Email</th>
         <th class="thead description">Description</th>
         <th class="thead">Commented Date</th>
         <th class="thead action">Action</th>
      </tr>
      </thead>
      <tbody>';
      $sql2 = "SELECT * FROM `contactus` ORDER BY `contact_id` DESC";
      $result2 = mysqli_query($conn, $sql2);
      $sno = 0;
      while( $row2 = mysqli_fetch_assoc($result2)){
        $sno++;
        $contactId = $row2['contact_id'];
        $contactName = $row2['contact_name'];
        $contactEmail = $row2['contact_email'];
        $contactDesc= $row2['contact_description'];
        $contactDate= $row2['date'];
    
        
        $convertDate = strtotime($contactDate);
        $newDate = date('Y-m-d', $convertDate);


      echo '
      
      <tr id="table-body">
         <td class="tbody">'.$sno.'</td>
         <td class="tbody">'.$contactName.'</td>
         <td class="tbody">'.$contactEmail.'</td>
         <td class="tbody">'.$contactDesc.'</td>
         <td class="tbody">'.$newDate.'</td>
         <td class="tbody actionbtn">
            <button class="btn delete" id = "d'.$contactId.'">Delete</button>
         </td>
      </tr>
      ';
      }

      echo '
      </tbody>
      </table>
    </section>


    <script>
    $(document).ready( function () {
        $("#myTable").DataTable({
            "searching" : false,
            "paging" : true,
        "pagelength" : 10});
    } );
    </script>
    <script>
        deletes = document.getElementsByClassName("delete");
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click", (e)=>{
               let sno = e.target.id.substr(1);

               if(confirm("Do you really want to delete this comment?")){
                window.location = `_contactus.php?userid='.$id.'&delete=${sno}`
                alert("Comment deleted successfully");

            }else{
                alert("Comment was not deleted");
            }
            });
        })
    </script>
</body>
</html>';}?>

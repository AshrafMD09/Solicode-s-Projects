<?php
require 'config.php';
if(!empty($_SESSION["id_admin"])){
    $id_admin = $_SESSION["id_admin"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin");
    $row = mysqli_fetch_assoc($result);
    }
    else{
    header("Location: login-admin.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');
        body{
            background-color: #F2E4DD;
        }



        nav{
            background-color: #E0CBC0;
            font-family: 'Kavoon', cursive;
            margin-bottom: 2.5%;
        }

        .profileLinksSection{
            width: 100%;
            background-color: #E0CBC0;
            margin: 0px;
            padding: 2.5% 0px 2.5% 0px;

        }

        .profileLinks{
            color: black;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            
        }

        .profileLinks:hover{

            background-color: rgb(153, 158, 163);
            padding: 2.5%;
        }


        .empruntsDetails{
            background-color: #E0CBC0;
            margin-bottom: 2%;
            padding: 1% 0px;
        }


    </style>
</head>

<body>


    <!-- ======= Header/Navbar ======= -->

<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">

    <a class="navbar-brand text-brand" href="admin-page.php">MedLibrary</a>

    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="admin-personal.php" style="margin-right: 1rem; color: black;"><i class="fa-solid fa-user"></i></a>
        <a href="logout-admin.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>

</nav>

<!-- Side-Bar -->

<div class="row profileLinksSection  text-center">
    

    <div class=" profileLinksdiv col-md-4">    <a href="admin-page.php" class="profileLinks" >Reservation</a>
    </div>
    
    <div class=" profileLinksdiv col-md-4">    <a href="admin-ouvrage.php" class="profileLinks">Ouvrage</a>
    </div>

    <div class=" profileLinksdiv col-md-4">    <a href="admin-emprunt.php" class="profileLinks" style="text-decoration: underline;">Emprunts</a>
    </div>


</div>



<!-- Emprunts Section -->

<div class="albumPrds album py-5">

    <div class="container">
    
    <?php 



$id_admin = $_SESSION["id_admin"];

$empruntsInsert = "SELECT * FROM emprunt ";

$dateEmprunt = 'CURRENT_TIMESTAMP';
$res = mysqli_query($conn, $empruntsInsert);

if( mysqli_num_rows ( $res ) > 0 ){

echo'<div class="empruntsDetails row d-flex justify-content-between text-center">';

while($row = mysqli_fetch_assoc($res)) {

echo ' 
<form method = "GET" action = "accept-emprunt.php" class=" row ">    

    <div class=" col-md-4"> 
        <p class="" >ID-Emprunt : <span>' .$row['id_emprunt']. '</span></p>
    </div>

    <div class=" col-md-4"> 
        <p class="" >ID-reservation : <span>' .$row['id_reservation']. '</span></p>
    </div>

    <div class=" col-md-4"> 
        <p class="" >Date-Emprunt : <span>' .$row['date_emprunt']. '</span></p>
    </div>

    <div class=" col-md-4"> 
        <p class="" >Date-retour : <span>' .$row['date_retour']. '</span></p>
    </div>

    <div class=" col-md-4"> 
        <p class="" >ID-admin: <span>' .$row['id_admin']. '</span></p>
    </div>


    <div class=" col-md-4 "  style="margin: auto; padding: 1% 0px;" id="btnAccepter"> 
        <input type="hidden" name = "id_emprunt" value = "' .$row['id_emprunt']. '">
        <input  onclick="disPlay()"  type="submit" name= "empruntDisplay" class="btn btn-dark btn" value = "Accept le retour">
    </div>
    

</form>
';

}


echo '</div>';
}

// if(isset($_GET["empruntDisplay"])){

//     echo '<script>
//     function disPlay() {
//         document.getElementById("btnAccepter").style.display="none"
//       }
//         </script>';

// }

?>
    
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
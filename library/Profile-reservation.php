<?php
require 'config.php';

if(!empty($_SESSION["id_adherent"])){
    $id = $_SESSION["id_adherent"];
    $result = mysqli_query($conn, "SELECT * FROM adherent WHERE id_adherent = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Reservation</title>
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

        .scoreDate{
            margin: 2% 0px 2% 5%;
        }

        .imgs{
            margin-bottom: 5%;
        }

        @media screen and (max-width: 1000px) {
            .formSU{
        width: 80%;
        margin: auto;
        }

        .inputs ,select{
            margin: 4% 0px 4% 0px;
        }
        }

        @media screen and (max-width: 768px) {

            .profileLinksdiv{
                margin: 1.5% 0px;
            }

            .Exemplary{
            margin-bottom: 20%;
        }
        .imgs{
            width: 50%;
        }
        }


    </style>
</head>

<body>


    <!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php">MedLibrary</a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="ouvrage-page.php">Works</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="">Contact</a>
        </li>
        </ul>
    </div>



    <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black;"><i class="fa-solid fa-user"></i></a>
        <a href="logout-user.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>
<!-- Side-Bar -->
<div class="row profileLinksSection  text-center">
    

    <div class=" profileLinksdiv col-md-4">    <a href="Profile-personal.php" class="profileLinks" >Personal Informations</a>
    </div>
    
    <div class=" profileLinksdiv col-md-4">    <a href="Profile-reservation.php" class="profileLinks" style="text-decoration: underline;">Mes réservation</a>
    </div>

    <div class=" profileLinksdiv col-md-4">    <a href="Profile-emprunts.php" class="profileLinks">Mes emprunts</a>
    </div>


</div>


<!-- Reservation section -->

<div class="albumPrds album py-5">

    <div class="latestsProducts container">

        
    <?php 

    $id_adherent = $_SESSION["id_adherent"];

        $reservationsInsert = "SELECT * FROM reservation r INNER JOIN exemplaire e ON r.id_exemplaire = e.id_exemplaire 
        INNER JOIN ouvrage o ON o.id_ouvrage = e.id_ouvrage WHERE id_adherent = $id_adherent ";

    // echo $id_adherent;
    
    $res = mysqli_query($conn, $reservationsInsert);
    
    if( mysqli_num_rows ( $res ) > 0 ){

        echo '<div class="latestsProductsdiv row  d-flex justify-content-between " style = "width: 80%; margin: auto; ">';

        while($row = mysqli_fetch_assoc($res)) {

        echo ' <div class=" Exemplary col-md-4 text-center mb-5" >

        <p>ID-reservation : <span>' .$row['id_reservation']. '</span></p>

        <img class="imgs card-img-top" src="img/' .$row['ouvrageImg']. '" alt="der medicus">

        <h6 class="text-center">Etat : <span>' .$row['etat']. '</span></h6>
    
        <p class="text-center">date : <span>'.$row['date_reservation'].'</span></p>
    
        <p class="text-center">ID-Examplary : <span>'.$row['id_exemplaire'].'</span></p>

    </div>';

        }
    
    
    echo '</div>';
    }
    
    ?>










</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
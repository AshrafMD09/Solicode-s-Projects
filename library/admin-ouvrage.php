<?php
require 'config.php';

if(!empty($_SESSION["id_adherent"])){
    header("Location: admin-ouvrage.php");
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Ouvrage</title>
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

        .imgs{
            margin-bottom: 5%;
        }

        .imgdiv{
            margin-bottom: 10%;
        }

        @media screen and (max-width: 767px) {

            .latestsProductsdiv{
                width: 60%;
                margin: auto;
            }

            .imgdiv{
            margin-bottom: 20%;
        }

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
    
    <div class=" profileLinksdiv col-md-4">    <a href="admin-ouvrage.php" class="profileLinks" style="text-decoration: underline;">Ouvrage</a>
    </div>

    <div class=" profileLinksdiv col-md-4">    <a href="admin-emprunt.php" class="profileLinks">Emprunts</a>
    </div>


</div>

<!-- manage les ouvrages -->

<!-- Filter and search -->

<div class="filterSearch pt-5 row  text-center" style="width: 100%; margin: auto;"> 

    <div class="col-md-4 mb-3">
        <a target = "_blank " href="admin-add-ouvrage.php" id="search-btn" class="btn btn-outline-dark " type="button">Ajouter un Ouvrage</a>
    </div>

    <div class="filterdiv col-md-4 mb-3">

        <form action = "" method = "" class="" >

            <select class="btn btn-outline-dark" name="" id = "">
        
                <option value="" name = "" >Filter by Type</option>
        
                <option value="" name = "" >Book</option>
                <option value="" name = "">Roman</option>
                <option value="" name = "">CD</option>
                
            </select>
        
        
            <input class="btn btn-success" type="submit" value = "Filter" name = "" id = "">
        
            </form>



    </div>



    <div class="searchdiv col-md-4">

        <div class="input-group">
            
            <input type="search" id="" class="form-control" placeholder="Search"/>
            
            <button type="submit" class="btn btn-success"> <i class="fas fa-search"></i> </button>

        </div>

    </div>



</div>


<div class="albumPrds album py-5">


    <div class="latestsProducts container">



    <?php


    $ouv = "SELECT * FROM ouvrage";
    
    $result = mysqli_query($conn, $ouv);
    
    if( mysqli_num_rows ( $result ) > 0 ){

    echo ' <div class="latestsProductsdiv row">';

    while($row = mysqli_fetch_assoc($result)) {

        $id_ouvrage = $row["id_ouvrage"];

        echo '<form method = "GET" action = "ouvrage-edit-admin.php" class=" imgdiv col-md-3 tex-center">

        <h3 class="text-center">' .$row['titre']. '</h3>

        <img class="imgs card-img-top" src="img/' .$row['ouvrageImg']. '" alt="des medicus"> 

        <div class=" d-flex justify-content-around" >

        <input type="hidden" name="id_ouvrage" type = "submit" value ="'.$id_ouvrage.'">
        <input class="btn btn-dark" type="submit" value = "More" style = "width : 50%">

        </div>
            </form>';

    }
    
    
    echo '</div>';
}

    
    ?>




</div>
</div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
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
    <title>Ouvrage page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>
    
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');

        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: #F2E4DD;
        }

        nav{
            background-color: #E0CBC0;
            font-family: 'Kavoon', cursive;
        }

        .latestsProductsdiv{
            
            width: 80%;
            margin: 5% 10% 10% 10%;
            
        }

        .imgs{
            margin-bottom: 5%;
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
            <a class="nav-link active" href="ouvrage-page.php">Works</a>
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

<!-- Filter and search -->

<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

    <div class="filterdiv col-md-6 mb-3">

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


<!-- 2 Cards -->

<div class="albumPrds album py-5">


    <div class="latestsProducts container">

    <?php


$ouv = "SELECT * FROM ouvrage";

$result = mysqli_query($conn, $ouv);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class="latestsProductsdiv row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_ouvrage = $row["id_ouvrage"];

    echo '<form method = "GET" action = "ouvrage-details.php" class=" imgs col-md-3" >

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

<footer>

<div class="text-center p-4" style="background-color: rgb(202, 200, 200);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="home.php">MedLibrary.com</a>
</div>

</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </html>
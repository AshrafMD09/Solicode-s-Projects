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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');
        body{
            background-color: #F2E4DD;
        }

        h1{
            padding-top: 10%;
            padding-bottom: 5%;
            font-size: 4rem;
            font-family: 'Kavoon', cursive;
            
        }

        #clickherePar{
            color: #F2E4DD;
            font-size: 1rem;
            border: black  solid;
            border-radius: 10px;
            background-color: black;
            text-decoration: none;
            padding: 10px;
        }
        #clickherePar:hover{
            background-color: #F2E4DD;
            color: black;
            text-decoration: underline;
        }

        nav{
            background-color: #F2E4DD;
            font-family: 'Kavoon', cursive;
        }

        h2{
            font-family: 'Kavoon', cursive;
        }

        .latestsProducts{
        width: 70%;
        margin: 5% auto;
        
        }

        .latestsProductsdiv{
            justify-content: space-around;
            
        }

        .imgs{
            margin-bottom: 30%;
        }

        .imges{
            margin-bottom: 5%;
            height: 90%;
        }

        @media screen and (max-width: 1100px) {

            h1{
            padding-top: 10%;
            padding-bottom: 10%;
            font-size: 4rem;
            }

            h2{
            padding-bottom: 10%;
            }

            .latestsProducts{
            
            width: 80%;

            }


            }

        @media screen and (max-width: 770px) {

            h1{
            padding-top: 20%;
            padding-bottom: 10%;
            font-size: 3rem;
            }

        h2{
            padding-bottom: 10%;
            }

        .latestsProducts{
        width: 40%;
        
        
            }

        .imgs{
            margin-bottom: 30%;
            height: 100%;
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
            <a class="nav-link active" href="home.php">Home</a>
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
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black; text-decoration :none;"><span><?php echo $row["firstname"] ; ?></span><i class="fa-solid fa-user"></i></a>

        <a href="logout-user.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>


<!-- Get Everything Right -->
    <div
    class="bg-image p-5 text-center shadow-1-strong mb-5 text-white"
    style="background-image: url('img/img2.jpg');
    height: 80vh;  ">

    <h1 class="mb-3 ">Get Everything Right <span style = "color : yellow;"></span> </h1>

    <a href="ouvrage-page.php" id="clickherePar">Click for more !</a>
    </div>


<!-- 2 Cards -->

<div class="albumPrds album py-5">
    <h2 class="text-center">Latest Works</h2>

    <div class="latestsProducts container">

    <?php


$ouv = "SELECT * FROM ouvrage ORDER BY id_ouvrage DESC LIMIT 2";

$result = mysqli_query($conn, $ouv);

if( mysqli_num_rows ( $result ) > 0 ){

echo ' <div class="latestsProductsdiv row">';

while($row = mysqli_fetch_assoc($result)) {

    $id_ouvrage = $row["id_ouvrage"];

    echo '
    <form method = "GET" action = "ouvrage-details.php" class=" imgs col-md-3" >

    <h3 class="text-center">' .$row['titre']. '</h3>

    <img class="imges card-img-top" src="img/' .$row['ouvrageImg']. '" alt="des medicus">

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
    <!-- Copyright -->
    
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </html>
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
            margin-bottom: 3%;
        }

        .imgSt{
            margin-bottom: 5%;
        }

        .imgs{
            margin-bottom: 5%;
        }
        
        .OuvrageDetails{
            margin-bottom: 5%;
        }


        .ExemplariesTitle{
            font-family: 'Kavoon', cursive;
        }

        

        
        @media screen and (max-width: 767px) {

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

<!-- Card details -->
<div class="albumPrds album py-5" style="background-color: #E0CBC0; ">


    <div class="latestsProducts container ">

        
    <?php
    
    $id_ouvrage = $_GET["id_ouvrage"];

    $ouv = "SELECT * FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
    
    $result = mysqli_query($conn, $ouv);
    
    if( mysqli_num_rows ( $result ) > 0 ){

    echo ' <div class="latestsProductsdiv row d-flex justify-content-between " style = "width: 80%; margin: auto; " >';

    while($row = mysqli_fetch_assoc($result)) {

        echo '
        <div class=" imgSt col-md-4" >
        <img class="imgSt card-img-top" src="img/' .$row['ouvrageImg']. '" alt="des medicus">   
        <h5 class="text-center">ID-Ouvrage : ' .$row['id_ouvrage']. '</h5> 
        </div>

        <div class="  col-md-7" > 
            
        <div class="OuvrageDetails"><h2><strong>' .$row['titre']. '</strong></h2></div> 
        <div class="OuvrageDetails"> <h5>Autheur : <span>' .$row['autheur']. '</span></h5></div> 
        <div class="OuvrageDetails"> <h5>Type : <span>' .$row['ouvrageType']. '</span></h5></div> 
        <div class="OuvrageDetails"> <h5>Date edition : <span>' .$row['date_edition']. '</span></h5></div> 
        <div class="OuvrageDetails"> <h5>Date achat : <span>' .$row['date_achat']. '</span></h5></div> 
        <div class="OuvrageDetails"> <h5>Nombre des pages : <span>' .$row['nombre_pages']. '</span></h5></div> 
        
        
        </div>';

    }
    
    
    echo '</div>';
}
    ?>

</div>
</div>





<!-- Exemplaries -->

<div class="albumPrds album py-5">

    <h2 class="ExemplariesTitle text-center mb-5">Exemplaries</h2>

    <div class="latestsProducts container">

    <?php
    
    if(isset($_POST['addExemplaire'])){

        $etat = $_POST['etat'];

        $addExemp = $conn->prepare("INSERT INTO exemplaire (etat, id_ouvrage) VALUES ('$etat', '$id_ouvrage')");

        if ($addExemp->execute()) {

            echo "<script> alert('Add Successful'); </script>"; 
        }

    }
    
    $insertExmplaire = "SELECT * FROM exemplaire e INNER JOIN ouvrage o ON o.id_ouvrage = e.id_ouvrage WHERE e.id_ouvrage = $id_ouvrage ";
    
    $result = mysqli_query($conn, $insertExmplaire);
    
    if( mysqli_num_rows ( $result ) > 0 ){

        echo '<div class="latestsProductsdiv row  d-flex justify-content-between " style = "width: 80%; margin: auto; ">';

        while($row = mysqli_fetch_assoc($result)) {

        echo ' <div class=" Exemplary col-md-3 text-center" >

        <img class="imgs card-img-top" src="img/' .$row['ouvrageImg']. '" alt="der medicus">

        <h6 class="text-center">Etat : <span>' .$row['etat']. '</span></h6>
    
        <h6 class="text-center">ID_Exemplaire : <span>' .$row['id_exemplaire']. '</span></h6>
    
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ReserverExemplaire' .$row['id_exemplaire']. '">
        Reserver
        </button>
            
        
        
        <div class="modal fade" id="ReserverExemplaire'.$row["id_exemplaire"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fs-5" id="exampleModalLabel">Suppression dannonce</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <form action="" method="POST" enctype="multipart/form-data">
        
        
            <label for="ID">Etes-vous sur de vouloir Reserver cette Exemplaire ?</label>
            <input type="hidden" name="id_exemplaire" id="ID"  value="'.$row["id_exemplaire"].'">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="btn btn-success" type="submit" name="ReserverExemplaire" value="Reserver">
        
        
        </form>
            
        </div>
        </div>
        </div>
        </div>
        </div>
        
        
        
        ';

        }
    
    
    echo '</div>';

        
if (isset($_POST['ReserverExemplaire'])){

    $id_adherent = $_SESSION['id_adherent'];
    $id_exemplaire = $_POST['id_exemplaire'];
    
    $checkres = "SELECT * FROM exemplaire WHERE id_exemplaire = '$id_exemplaire'";
    $checkresRun = $conn->prepare($checkres);

    $sqlres= "INSERT INTO `reservation`(`date_reservation`, `id_adherent`, `id_exemplaire`) VALUES (CURDATE() ,'$id_adherent', '$id_exemplaire')";
    $reserverdone = $conn->prepare($sqlres);
    $reserverdone->execute();


    
}
    
}






    ?>
    
</div> 



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
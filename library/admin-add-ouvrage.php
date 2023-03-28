<?php
require 'config.php';

if(!empty($_SESSION["id_adherent"])){
    header("Location: admin-add-ouvrage.php");
}

if(isset($_POST["addOuvrage"])){

    $titre = $_POST["titre"];
    $autheur = $_POST["autheur"];
    $ouvrageType = $_POST["ouvrageType"];
    $date_edition = $_POST["date_edition"];
    $date_achat = $_POST["date_achat"];
    $nombre_pages = $_POST["nombre_pages"];

    $ouvrageImg = $_FILES['ouvrageImg']['name'];
    $tmp_ouvrageImg = $_FILES['ouvrageImg']['tmp_name'];
    $folder = "img/";
    move_uploaded_file( $tmp_ouvrageImg , $folder . $ouvrageImg );



    if (empty($titre) || empty($autheur) || empty($date_edition) || empty($date_achat) || empty($nombre_pages) || empty($ouvrageType) || empty($ouvrageImg)) {

        echo "<script> alert('fields are required'); </script>";
    } 
    else {
        $addouv = $conn->prepare("INSERT INTO ouvrage(titre, autheur, ouvrageType, ouvrageImg, date_edition, date_achat, nombre_pages) 

                                        VALUES ('$titre', '$autheur', '$ouvrageType', '$ouvrageImg', '$date_edition', '$date_achat', '$nombre_pages')");
        

        if ($addouv->execute()) {

            echo "<script> alert('Add Successful'); </script>"; 
        }

}


}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add ouvrage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kavoon&display=swap');
        body{
            background-color: #F2E4DD;
        }

        h2{

            margin: 5% 0px;
            font-family: 'Kavoon', cursive;
        }
        .formSU{
        width: 60%;
        margin: 10% auto;
        }


        input ,select{
        margin: 4% 0px;
        }

        form{
            margin-bottom: 15%;
        }

        @media screen and (max-width: 993px) {
            .formSU{
        width: 80%;
        margin: 10% auto;
        }

        h2{

        margin-top: 15%;
        }
        }

    </style>
</head>

<body>





    <!-- New ouvrage -->

<div class="container mt-3 text-center" >

            <h2>Ajouter un Ouvrage</h2>

    <div class=" formSU text-center">

    <form class="row" method = "POST" action = ""  autocomplete="off" enctype="multipart/form-data">

        <div class="col-md-6">
                <div class="inputs"> <input class="form-control" type="text" name="titre" placeholder="Titre"> </div>
        </div>

        <div class="col-md-6">
                <div class="inputs">  <input class="form-control" type="text" name="autheur" placeholder="Autheur"> </div>
        </div>

        <div class="col-md-6">
            <div class="inputs"> <label for="">Date d'edition</label> <input class="form-control" type="date" name="date_edition" placeholder="Date d'edition"> </div>
        </div>

        <div class="col-md-6">
            <div class="inputs"> <label for="">Date d'achat</label> <input class="form-control" type="date" name="date_achat" placeholder="Date d'achat"> </div>
        </div>

        <div class="col-md-6">
            <div class="inputs"> <input class="form-control" type="file" name="ouvrageImg" placeholder="Image"> </div>
        </div>

        <div class="col-md-6">
            <div class="inputs"><input class="form-control" type="number" name="nombre_pages" placeholder="Nombre des pages"> </div>
        </div>

    
        <div class="col-md-6">
        
        
        <select class="form-control" name = "ouvrageType">
            <option required value = "" name = "ouvrageType">Type</option>
            <option value="Book" name = "ouvrageType">Book</option>
            <option value="Roman" name = "ouvrageType">Roman</option>
            <option value="CD" name = "ouvrageType">CD</option>
        </select>
        
        </div>
    
        <div class="mt-3 gap-2 d-flex justify-content">
            <button class="px-3 btn btn-sm btn-success fw-bold" type = "submit" name = "addOuvrage" >Ajouter</button> 
        </div>

    </form>
    </div>

</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
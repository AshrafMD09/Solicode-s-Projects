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
if(!isset($_GET['id_ouvrage'])){
    header('Location: admin-ouvrage.php');
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvrage edit admin</title>
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

        .kleinform{
            width: 30%;
            margin: auto;
        }

        

        
        @media screen and (max-width: 767px) {

            .Exemplary{
            margin-bottom: 20%;
        }
        .imgs{
            width: 50%;
        }

        .kleinform{
            width: 90%;
            margin: auto;
        }

            }

    </style>
</head>

<body>


    <!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg">
    <div class="container">




    <a class="navbar-brand text-brand" href="admin-page.php">MedLibrary</a>


    <!-- <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-target="#loginModal">
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black;"><i class="fa-solid fa-user"></i></a>
        <a href="logout-admin.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button> -->

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

        // $id_ouvrage = $row['id_ouvrage'];
        

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


        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#SupprimerOuvrage'.$row["id_ouvrage"].'">
            Delete
        </button>
                
        

<div class="modal fade" id="SupprimerOuvrage'.$row["id_ouvrage"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Suppression dannonce</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
            <form action="delete_ouvrage.php" method="GET" enctype="multipart/form-data">
    
    
                <label for="ID">Etes-vous sur de vouloir supprimer Ouvrage ?</label>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="id_ouvrage" id="ID"  value="'.$row["id_ouvrage"].'">
                <input class="btn btn-danger" type="submit" name="SupprimerOuvrage" value="Delete">
    
            
            </form>
                
            </div>
        </div>
    </div>
</div>


        
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target=#'.$row["id_ouvrage"].'>
            Edit
        </button>
        
        <div class="modal fade" id="'.$row["id_ouvrage"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="modal-title fs-5" id="exampleModalLabel">Modification Exemplaire</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
            <form class="row" method = "GET" action = "edit-ouvrage.php"  autocomplete="off" enctype="multipart/form-data">

            <div class="col-md-6 mb-3">
                    <div class="inputs"> <input class="form-control" type="text" name="titre" placeholder="Titre" value = "' .$row['titre']. '" required value=""> </div>
            </div>
    
            <div class="col-md-6 mb-3">
                    <div class="inputs">  <input class="form-control" type="text" name="autheur" placeholder="Autheur" value = "' .$row['autheur']. '" required value=""> </div>
            </div>
    
            <div class="col-md-6 mb-3">
                <div class="inputs"> <label for="">Date dedition</label> <input class="form-control" type="date" name="date_edition" placeholder="Date dedition" value = "' .$row['date_edition']. '" required value=""> </div>
            </div>
    
            <div class="col-md-6 mb-3">
                <div class="inputs"> <label for="">Date dachat</label> <input class="form-control" type="date" name="date_achat" placeholder="Date dachat" value = "' .$row['date_achat']. '" required value=""> </div>
            </div>
    
            <div class="col-md-6 mb-3">
                <div class="inputs"> <input class="form-control" type="file" name="ouvrageImg" placeholder="Image" value = "' .$row['ouvrageImg']. '"> </div>
            </div>
    
            <div class="col-md-6 mb-3">
                <div class="inputs"><input class="form-control" type="number" name="nombre_pages" placeholder="Nombre des pages" value = "' .$row['nombre_pages']. '" required value=""> </div>
            </div>
    
        
            <div class="col-md-6 mb-3">
            
            
            <select class="form-control" name = "ouvrageType">
                <option required value = "' .$row['ouvrageType']. '" name = "ouvrageType">' .$row['ouvrageType']. '</option>
                <option value="Book" name = "ouvrageType">Book</option>
                <option value="Roman" name = "ouvrageType">Roman</option>
                <option value="CD" name = "ouvrageType">CD</option>
            </select>

            

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="hidden" name="id_ouvrage" id="ID"  value="' .$row['id_ouvrage']. '">
            <input type="submit"class="btn btn-primary"name="EditOuvrage" class="btn btn-secondary" value="Edit">
    
            
        </form>
            </div>
        </div>
        </div>
    </div>



        
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

<div class="kleinform row d-flex justify-content-around text-center mb-5">

<form  method = "GET" action = "add_exemplaire.php" class="inputs col-md-12 d-flex justify-content-between ">

    <input class=" form-control" style="" type="text" name = "etat" placeholder="Etat d'examplaire" required value="">
    
    <input type="hidden" name="id_ouvrage"  value="<?php echo $id_ouvrage ;?>">
    <button  type="submit" name = "addExemplaire" class="  btn btn-dark btn">Add</button>

</form>

</div>

    <div class="latestsProducts container">

    <?php

    
    $insertExmplaire = "SELECT * FROM exemplaire WHERE id_ouvrage = $id_ouvrage ";
    
    $result = mysqli_query($conn, $insertExmplaire);
    
    if( mysqli_num_rows ( $result ) > 0 ){

        echo '<div class="latestsProductsdiv row  d-flex justify-content-between " style = "width: 80%; margin: auto; ">';

        while($row = mysqli_fetch_assoc($result)) {

            // $delete_exemplaire = $row['id_exemplaire'];

        echo ' <div class=" Exemplary col-md-3 text-center" >

        <a href="" ><img class="imgs card-img-top" src="img/imgpng.png" alt="der medicus"></a>

        <h6 class="text-center">Etat : <span>' .$row['etat']. '</span></h6>
    
        <h6 class="text-center">ID_Exemplaire : <span>' .$row['id_exemplaire']. '</span></h6>
    
        

        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target=#'.$row["id_exemplaire"].'>
            Edit
        </button>

        <div class="modal fade" id="'.$row["id_exemplaire"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Modification Exemplaire</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
        
                <form action="edit-exemplaire.php" method="GET" enctype="multipart/form-data">
        
                <label for="Etat">Etat</label>
                <input name="ModifierEtat" id="Etat" type="text" value="' .$row['etat']. '" >

                <input type="hidden" name="editEx" id="ID"  value="' .$row['id_exemplaire']. '">
                <input type="hidden" name="id_ouvrage"  value="'.$row["id_ouvrage"].'">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit"class="btn btn-primary"name="Modifier" class="btn btn-secondary" value="Modifier">
        
                
            </form>
                </div>
            </div>
            </div>
        </div>



        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Supprimer'.$row["id_exemplaire"].'">
            Delete
        </button>
                
        

<div class="modal fade" id="Supprimer'.$row["id_exemplaire"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Suppression dannonce</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
            <form action="delete-exemplaire.php" method="GET" enctype="multipart/form-data">
    
    
                <label for="ID">Etes-vous sur de vouloir supprimer Exemplaire ?</label>
                <input type="hidden" name="deleteExemplaire" id="ID"  value="'.$row["id_exemplaire"].'">
                <input type="hidden" name="id_ouvrage"  value="'.$row["id_ouvrage"].'">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-danger" type="submit" name="Supprimer" value="Supprimer">
    
            
            </form>
                
            </div>
        </div>
    </div>
</div>
</div>';


        }
    
    
    echo '</div>';

    }



    
    

    
            
    ?>


</div>








</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
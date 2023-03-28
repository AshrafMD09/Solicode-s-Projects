
<?php
require 'config.php';
if(!empty($_SESSION["id_admin"])){
  $id = $_SESSION["id_admin"];
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id");
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
        <a href="admin-personal.php" style="margin-right: 1rem; color: black;text-decoration :none;">
        <span>
            <?php echo $row["firstname"] ; ?></span>
            <i class="fa-solid fa-user"></i>
        </a>
        
        <a href="logout-admin.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>

</nav>

<!-- Side-Bar -->

<div class="row profileLinksSection  text-center">
    

    <div class=" profileLinksdiv col-md-4">    <a href="admin-page.php" class="profileLinks" style="text-decoration: underline;">Reservation</a>
    </div>
    
    <div class=" profileLinksdiv col-md-4">    <a href="admin-ouvrage.php" class="profileLinks">Ouvrage</a>
    </div>

    <div class=" profileLinksdiv col-md-4">    <a href="admin-emprunt.php" class="profileLinks">Emprunts</a>
    </div>

</h1>

</div>



<!-- Emprunts Section -->

<div class="albumPrds album py-5">

    <div class="container">
    
    <?php 


    $reservationsInsert = "SELECT * FROM reservation WHERE id_reservation NOT IN (SELECT id_reservation FROM emprunt)";

// echo $id_adherent;

$res = mysqli_query($conn, $reservationsInsert);

if( mysqli_num_rows ( $res ) > 0 ){

echo'<div class="empruntsDetails row d-flex justify-content-between text-center">';

    while($row = mysqli_fetch_assoc($res)) {

    echo '  <form method = "GET" action="insert_emprunt.php" class=" row ">
    
            <div class=" col-md-2"> 
                <p class="" >ID-reservation : <span>' .$row['id_reservation']. '</span></p>
            </div>

            <div class=" col-md-4"> 
                <p class="" >Date de Reservation : <span>' .$row['date_reservation']. '</span></p>
            </div>

            <div class=" col-md-2"> 
                <p class="" >ID-User : <span>' .$row['id_adherent']. '</span></p>
            </div>

            <div class=" col-md-2"> 
                <p class="" >ID-Exemplaire : <span>' .$row['id_exemplaire']. '</span></p>
            </div>

            <div class=" col-md-2"> 
                <input type="hidden" name = "id_reservation" value = "' .$row['id_reservation']. '">
                <input type="submit" name = "accepterReservation" value = "Accept" class="btn btn-success btn">
            </div>

            </form>
';

    }


echo '</div>';
}

?>
    
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>

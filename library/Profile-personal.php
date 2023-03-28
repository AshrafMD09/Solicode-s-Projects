<?php
require 'config.php';

if(!isset($_SESSION["id_adherent"])){
    header("Location: login.php");
}

    
    if(isset($_REQUEST['submit'])){

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $cin = $_REQUEST["cin"];
        $username = $_REQUEST["username"];
        $email = $_REQUEST["email"];
        $adresse = $_REQUEST["adresse"];
        $telephone = $_REQUEST["telephone"];
        $birthday = $_REQUEST["birthday"];
        $type_user = $_REQUEST["type_user"];

        if(  (!empty($firstname)) && (!empty($lastname)) && (!empty($cin)) && (!empty($username))
        && (!empty($email)) && (!empty($adresse)) && (!empty($telephone)) && (!empty($birthday)) && (!empty($type_user)))
        {

            $id = $_SESSION["id_adherent"];

            $upd = mysqli_query($conn, "UPDATE `adherent` SET `firstname` = '$firstname', `lastname` = '$lastname' , `c.i.n` = '$cin', `username` = '$username' ,
            `email` = '$email', `adresse` = '$adresse' ,`telephone` = '$telephone', `birthday` = '$birthday', 
            `type_user` = '$type_user' WHERE `id_adherent` = '$id'");

        }

        else{
            echo "<script> alert('fields are required'); </script>";
            exit;
        }


    }

    $id = $_SESSION["id_adherent"];
    // $firstname = $_SESSION["firstname"];
    // $lastname = $_SESSION["lastname"];
    // $cin = $_SESSION["cin"];
    // $username = $_SESSION["username"];
    // $email = $_SESSION["email"];
    // $telephone = $_SESSION["telephone"];
    // $adresse = $_SESSION["adresse"];
    // $birthday = $_SESSION["birthday"];
    // $type_user = $_SESSION["type_user"];

    $result = mysqli_query($conn, "SELECT * FROM adherent WHERE id_adherent = $id");
    $row = mysqli_fetch_assoc($result);


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


        .formSU{
        width: 40%;
        margin: 5% 30% 0px 30%;
        }


        .inputs ,select{
        margin-top: 8%;
        }

        form{
            margin-bottom: 15%;
        }

        .scoreDate{
            margin: 2% 0px 2% 5%;
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
        <a href="Profile-personal.php" style="margin-right: 1rem; color: black; text-decoration :none;"><span><?php echo $row["firstname"] ; ?></span><i class="fa-solid fa-user"></i></a>
        <a href="logout-user.php" style="color: black;"><i class="fa-solid fa-right-from-bracket"></i></a>
    </button>

    </div>
</nav>

<!-- Side-Bar -->

<div class="row profileLinksSection  text-center">
    

    <div class=" profileLinksdiv col-md-4">    <a href="Profile-personal.php" class="profileLinks" style="text-decoration: underline;">Personal Informations</a>
    </div>
    
    <div class=" profileLinksdiv col-md-4">    <a href="Profile-reservation.php" class="profileLinks">Mes réservation</a>
    </div>

    <div class=" profileLinksdiv col-md-4">    <a href="Profile-emprunts.php" class="profileLinks">Mes emprunts</a>
    </div>


</div>

<!-- Score / date sign up -->

<div class="scoreDate">
    <p>ID-User : <span><?php echo $row["id_adherent"] ; ?></span></p>
    <p>Date de l'inscription : <span><?php echo $row["date_inscription"]?></span></p>
    <p>Score : <span><?php echo $row["score"]?></span></p>
    
</div>
    <!-- Infos -->

        <div class="container mt-3">
        <div class=" formSU text-center">
            
    <form class="row" action = "" method ="POST">

            <div class="col-md-6">
                    <div class="inputs"> <input class="form-control" type="text" placeholder="First Name" name="firstname" value = "<?php echo $row["firstname"] ; ?>"> </div>
            </div>
            <div class="col-md-6">
                    <div class="inputs">  <input class="form-control" type="text" placeholder="Last Name" name="lastname" value = "<?php echo $row["lastname"] ; ?>"> </div>
            </div>

            <div class="col-md-6">
                <div class="inputs"> <input class="form-control" type="text" placeholder="C.I.N" name="cin" value = "<?php echo $row["c.i.n"] ; ?>"> </div>
            </div>

        <div class="col-md-6">
            <div class="inputs"> <input class="form-control" type="text" placeholder="Username" name="username" value = "<?php echo $row["username"] ; ?>"> </div>
        </div>

        <div class="col-md-12">
            <div class="inputs"> <input class="form-control" type="email" placeholder="Email" name="email" value = "<?php echo $row["email"] ; ?>"> </div>
        </div>

    <div class="col-md-12">
        <div class="inputs"><input class="form-control" type="text" placeholder="Adresse" name="adresse" value = "<?php echo $row["adresse"] ; ?>"> </div>
    </div>
    
                <div class="col-md-6">
                <div class="inputs"><input class="form-control" type="number" placeholder="Telephone" name="telephone" value = "<?php echo $row["telephone"] ; ?>"> </div>
            </div>
    
            <div class="col-md-6">
            <div class="inputs"><input class="form-control" type="date" name="birthday" value = "<?php echo $row["birthday"] ; ?>"> </div>
        </div>
    
        <div class="col-md-6">
        
        <!-- <input type="select" id="form3Example1cg" class="form-control form-control-lg" />  -->
        
        <select class="form-control" name = "type_user">
            <option value="<?php echo $row["type_user"] ; ?>" name = "type_user"><?php echo $row["type_user"] ; ?></option>
            <option value="Etudiant" name = "type_user">Etudiant</option>
            <option value="Employé" name = "type_user">Employé</option>
            <option value="Fonctionnaire" name = "type_user">Fonctionnaire</option>
            <option value="Femme au foyer" name = "type_user">Femme au foyer</option>
        </select>
        
        </div>
    
            <div class="mt-3 gap-2 d-flex justify-content">
                <button class="px-3 btn btn-sm btn-success" name = "submit" type = "submit">Save</button> 
            </div>
    </form>
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
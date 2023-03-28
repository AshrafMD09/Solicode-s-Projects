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
    <title>admin personal</title>
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


        .inputs {
        margin-top: 5%;
        }

        .empruntsDetails{
            background-color: #E0CBC0;
            padding-bottom: 5%;
        }

        .formSU{
        width: 90%;
        margin: 10% auto;
        }

        @media screen and (max-width: 1000px) {
            .formSU{
        width: 90%;
        margin: 30% auto;
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


    <!-- Infos -->

        <div class="container mt-3">
        <div class=" formSU text-center">
            
            <form class="row empruntsDetails">



            <div class="col-md-12">
                    <div class="inputs">  <p>First Name : <span><?php echo $row["firstname"]; ?></span></p> </div>
            </div>

            <div class="col-md-12">
                <div class="inputs">  <p>Last Name : <span><?php echo $row["lastname"]; ?></span></p> </div>
            </div>

            <div class="col-md-12">
                <div class="inputs"> <p>Username : <span><?php echo $row["username"]; ?></span></p> </div>
            </div>

            <div class="col-md-12">
                <div class="inputs"> <p>ID-Admin : <span><?php echo $row["id_admin"]; ?></span></p> </div>
            </div>


        </div>
    
        </div>
    </form>

</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    </htm;>
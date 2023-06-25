<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
    $id_user = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Profile-personal.css">
</head>

<body>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg py-3">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <a class="navbar-brand text-brand" href="home.php"><img class="logoimg" src="../img/logo.png" alt="Logo"></a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item px-3">
            <a class="nav-link text-decoration-underline" href="home.php">Home</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link " href="books.php">Books</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="favoris.php">Favoris</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link " href="#contactUsContent">Contact</a>
        </li>
        </ul>
    </div>

    <div  class="">
        <a class="navIcons text-decoration-none" href="Profile-personal.php"><span></span><i class="fa-solid fa-user mx-1"></i></a>

        <a class="navIcons" href="logout-user.php"><i class="navIcons fa-solid fa-right-from-bracket "></i></a>
    </div>

    </div>
</nav>

    <!-- Infos -->

<div class="container my-3">

<div class=" formSU ">

<h1 class="text-center fw-bold">Edit your Personal Information</h1>
            
    <form class="row" action = "edit-profile-personal.php" method ="POST">

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="firstname"><strong>First Name</strong></label>
                    <input class="form-control py-3" type="text" placeholder="First Name" name="firstname"  value = "<?php echo $row["firstname_user"] ; ?>" required> </div>
                </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="lastname"><strong>Last Name</strong></label>
                    <input class="form-control py-3" type="text" placeholder="Last Name" name="lastname" value = "<?php echo $row["lastname_user"] ; ?>" required> </div>
                </div>

            <div class="col-md-12">
                <div class="inputemail">
                    <label class="labelinput" for="email"><strong>Email</strong></label>
                    <input class="form-control py-3" type="email" placeholder="Email" name="email" value = "<?php echo $row["email_user"] ; ?>" required> </div>
                </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="Password"><strong>Password</strong></label>
                    <input class="form-control py-3" type="password" placeholder="Password" name="password" value = "" > </div>
                </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="confirmpassword"><strong>Confirme Password</strong></label>
                    <input class="form-control py-3" type="password" placeholder="Confirme Password" name="confirmpassword" value = "" > </div>
                </div>
    
            <div class="mt-4 gap-2 d-flex justify-content">
                <button class="btn px-5 py-2 " name = "submit" type = "submit" style = "background-color:#866C56;color:white;">Save</button> 
            </div>
    </form>
</div>
    

</div>

<footer>

<div class="text-center p-4" style="background: rgba(134, 108, 86, 0.8); color:white;font-family: 'Arial';">
© 2023 Solicode Tangier  Morocco, Inc. All Rights reserved.
</div>
    <!-- Copyright -->
    
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
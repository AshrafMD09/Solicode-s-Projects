<?php
    require '../config.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
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

    <?php
    if(!empty($_SESSION["id_user"])){
    $id = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id ");
    $row = mysqli_fetch_assoc($result);

    echo '
    <a class="navIcons text-decoration-none" href="Profile-personal.php"><span></span><i class="fa-solid fa-user mx-1"></i></a>
    <a class="navIcons" href="logout-user.php"><i class="navIcons fa-solid fa-right-from-bracket "></i></a>';
    }else{
    echo '
    <a href="signup.php" class ="btnSignup py-1 px-4 mx-1" >SignUp</a>
    <a href="login.php" class="btnLogin py-1 px-4 mx-2" >Login</a>';
    }
    ?>

</div>
</nav>


<!--  Cover Title-->
    <div class="backgroundPhoto bg-image p-5 text-center shadow-1-strong mb-3 text-white">

    <div class="coverscetion">

    <div class="titleSection">
        <h1 class="px-4 py-3">Get Everything Right</h1>
    </div>

    <p class="px-5 py-4 mb-5" href="">Access a wide range of books, exclusively now in Morocco</p>
    <a href="books.php" class ="btnMore py-3 px-5 ">More</a>
    </div>

    </div>

<!--  latest 3 works -->

<div class="albumPrds album ">
    <h2 class="text-center py-3">Latest Works</h2>

<div class="latestsProducts py-3 container">

<?php

$latestbooks = "SELECT * FROM book b ORDER BY b.id_book DESC LIMIT 3";

$result = mysqli_query($conn, $latestbooks);

if( mysqli_num_rows ( $result ) > 0 ){

    echo '<div class="row d-flex justify-content-around">';

    while($row = mysqli_fetch_assoc($result)) {

        $id_book = $row["id_book"];
?>

<form class="text-center col-md-4 cardcategorie " action="books-details.php" method="GET">

    <div class="card-body mb-3">
        <h3 class="book-title py-3 text-truncate"><?php echo $row["title"]; ?></h3>
    </div>

    <div class="categorieimg">
        <img src="<?php echo $row["image_book"]; ?>" class="card-img-top" alt="...">
    </div>

    <div class=" mb-3">
        <input type="submit"  class ="btnMoreCategorie mt-4 py-2 " value="Show More">
        <input type="hidden"  name="id_book" value="<?php echo $id_book ?>">
    </div>

</form>

<?php
    }
    echo '</div>'; 
    }
?>

</div>

</div>



<!-- About us -->

<div class=" my-5">

<h2 class="text-center">About Us</h2>

<div class="row d-flex justify-content-around py-5" style="width:90%;margin:auto;">

            <!-- Image -->

    <div class="col-md-6 abtusphoto">
        <img src="../img/img2.jpg" class="card-img-top" alt="...">
    </div>

            <!-- Paragraph  -->

    <div class="col-md-6 abtusparagraph d-flex align-content-between  flex-wrap">

        <div class=""> 
        <p>Where does it come from?
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem </p>
        </div>

        <div class="">
        <p>
        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
        </p>
        </div>
    </div>


</div>
</div>


<!-- Contact us -->

<div class=" my-5" id="contactUsContent">

<h2 class="text-center">Contact Us</h2>

<div class="row d-flex justify-content-around py-5 text-center" style="width:80%;margin:auto;font-size: 24px;">

<div class="col-md-5 fw-bold">
    <p>Phone : +212612345678</p>
</div>

<div class="col-md-5 fw-bold">
    <p>Email : readwellsupport@rw.com</p>
</div>

<div class="col-md-12 mt-5 contactusparagraph">
    <p>We're just a click away! For any questions, suggestions, or feedback, reach out to our friendly team.
    Use the contact form or email us directly. We're here to assist you in your quest for knowledge.
    Join our vibrant community of readers and let's explore the world of books together!</p>
</div>


</div>
</div>

<footer>

<div class="text-center p-4" style="background: rgba(134, 108, 86, 0.8); color:white;font-family: 'Arial';">
© 2023 Solicode Tangier  Morocco, Inc. All Rights reserved.
</div>
    <!-- Copyright -->
    
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>
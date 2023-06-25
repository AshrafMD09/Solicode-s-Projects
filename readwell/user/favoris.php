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
    <title>Favoris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/favoris.css">
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
            <a class="nav-link " href="home.php">Home</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link " href="books.php">Books</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link text-decoration-underline" href="favoris.php">Favoris</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link " href="home.php?#contactUsContent">Contact</a>
        </li>
        </ul>
    </div>

    <a class="navIcons text-decoration-none" href="Profile-personal.php"><span></span><i class="fa-solid fa-user mx-1"></i></a>
    <a class="navIcons" href="logout-user.php"><i class="navIcons fa-solid fa-right-from-bracket "></i></a>

    </div>
</nav>

<!-- Favourite books title -->

<div class="filterSearch pt-5 row  text-center" style="width: 90%; margin: auto;"> 

    <div class="col-md-12 " style="color: #6A7B67;">
    <h2 class="text-start py-3 fw-bold"><i class="fa-solid fa-arrow-right-long mx-5 "></i>Favourite Books</h2>
    </div>

</div>

<!--  Books -->

<div class="albumPrds album ">

<div class=" py-3 container">
<?php
$Books_fav = "SELECT * FROM favoris f
INNER JOIN user u ON u.id_user = f.id_user
INNER JOIN book b ON b.id_book = f.id_book
WHERE f.id_user = $id_user ";

$result = mysqli_query($conn, $Books_fav);

if( mysqli_num_rows ( $result ) > 0 ){

    echo '<div class="row d-flex justify-content-around">';

    while($row = mysqli_fetch_assoc($result)) {

        $id_book = $row["id_book"];
?>

<form class="text-center col-md-4 cardBook mb-5" action="books-details.php" method="GET">

    <div class="bookimg">
        <img src="<?php echo $row["image_book"]; ?>" class="card-img-top" alt="...">
    </div>
        
    <div class="card-body mb-3">
        <h3 class="book-title py-3 text-truncate"><?php echo $row["title"]; ?></h3>
    </div>

    <div class=" mb-3">
        <input type="submit" class ="btnMore py-2 px-5"  value="Show More">
        <input type="hidden"  name="id_book" value="<?php echo $row["id_book"]; ?>">
        
    </div>

</form>

<?php
    }
    echo '</div>';
    }else{
        echo'<div class="alert alert-danger latestsProductsdiv row" role="alert">
        <h1 class ="text-center">No Books found</h1>
            </div>';
    }
?>
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
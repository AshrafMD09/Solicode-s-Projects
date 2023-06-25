<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/books.css">
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
            <a class="nav-link text-decoration-underline" href="books.php">Books</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="favoris.php">Favoris</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link " href="home.php?#contactUsContent">Contact</a>
        </li>
        </ul>
    </div>

    <?php
    require '../config.php';
    if(!empty($_SESSION["id_user"])){
    $id = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
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

<!-- Filter books -->

<div class="filterSearch pt-5 row  text-center" style="width: 70%; margin: auto;"> 

    <div class="filterdiv col-md-6 mb-3">

        <form action = "" method = "GET" class="" >

            <select class="btn btn-outline mb-3 px-4 py-2" name="typeBook" id = "categories">
        
                <option value="" name = "AllType" >All Types</option>
        
                <option value="Novel" name = "Novel" >Novels</option>
                <option value="Science" name = "Science">Science</option>
                <option value="Business" name = "Business">Business</option>
                <option value="History" name = "History">History</option>
                
            </select>
            
        
        
            <input class="btn mb-3 px-4 py-2" type="submit" value = "Filter" name = "filterbtn" id = "btnFilter">
        
            </form>

    </div>

    <!-- Search -->

    <div class="searchdiv col-md-4">

        <form method = "GET" action = "" class="input-group">
            
            <input type="search" name="searchBookInput" id="searchInput" class="form-control py-2" placeholder="Search" required/>
            
            <button type="submit" name="searchBook" class="btn" id="btnFilter"> <i class="fas fa-search"></i> </button>

        </form>

    </div>



</div>

<!--  Books -->

<div class="albumPrds album ">

<div class="latestsProducts py-3 container">

<!-- Search -->

<?php
if(isset($_GET['searchBook'])){

$searchBooks = $_GET['searchBookInput'];

$Books = "SELECT * FROM book WHERE title LIKE '%$searchBooks%' ";
}
?>

<!-- Filter -->
<?php

if(isset($_GET['filterbtn'])){

    $typeBook = $_GET['typeBook'];

    if ($typeBook != ""){

        $Books = "SELECT * FROM book WHERE type_book = '$typeBook'";
}else{
    $Books = "SELECT * FROM book ";
}
}
elseif(!isset($_GET['filterbtn'] )&& !isset($_GET['searchBook'] )){
    $Books = "SELECT * FROM book b ORDER BY b.id_book DESC";
}
$result = mysqli_query($conn, $Books);

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
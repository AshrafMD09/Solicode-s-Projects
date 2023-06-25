<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/books-details.css">
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

<!--  Books -->

<div class="albumPrds album ">

<div class="latestsProducts py-3 container">

<?php

    $id_book = $_GET["id_book"];

    if(!empty($_SESSION["id_user"])){
    $select = mysqli_query($conn, "SELECT * FROM favoris f WHERE f.id_user = $id AND f.id_book = $id_book");
    $isFav = mysqli_fetch_assoc($select) ;
    $icon = $isFav ? ' fa-solid ':' fa-sharp ';
    }else{
        $icon = ' fa-sharp ';
    }


$bookDetails = "SELECT * FROM book WHERE id_book = $id_book";
$result = mysqli_query($conn, $bookDetails);

if( mysqli_num_rows ( $result ) > 0 ){

    echo'<div class="row d-flex justify-content-around">';

while($row = mysqli_fetch_assoc($result)) {
    
echo'
<div class="col-md-4 cardBook my-5" >
    <div class="bookimg">
        <img src="' .$row['image_book']. '" class="card-img-top" alt="...">
    </div>
</div>

<div class="col-md-7 mt-5" >
    <div class=" mb-4">
        <h1 class="book-title">' .$row['title']. '</h1>
    </div>

    <div class=" mb-4">
        <h3 class="">Author : ' .$row['author']. '</h3>
    </div>

    <div class=" mb-4">
        <h3 class="">Type : ' .$row['type_book']. '</h3>
    </div>

    <div class=" mb-4">
        <h3 class="">Pages : ' .$row['pager_number']. '</h3>
    </div>

    <div class="summary mb-4">
        <p class="">' .$row['summary']. '</p>
    </div>

    <div  class="readDownloadSection d-flex justify-content-between">

        <div class ="downloadform">
        <a class =" btn readbtn" href="' .$row['PDF_file']. '" target="_blank" >Read</a>
        </div>

        <form action="download_book.php" method="GET" class ="downloadform">
            <button type="submit" class ="downloadbtn">Download</button>
            <input  type="hidden" name="id_book" value="'.$id_book.'">
        </form>

        <form class="favIcon" action="add_to_fav.php" method="GET" >
            <button type="submit" class ="favbtn"  ><i class=" fa-regular fa-heart fa-2xl'.$icon.' "></i></button>
            <input type="hidden" name="id_book" value="'.$id_book.'">
        </form>

    </div>

</div>';
}
echo '</div>';
}
?>

<div class="px-0 mb-2">
<h2 class="commenttitle ">Comments</h2>
</div>

<?php

// $cmt_del = '<button type="submit" class="editDelete" >Delete</button>';

$comments = "SELECT * FROM comment c 
INNER JOIN user u ON u.id_user = c.id_user
INNER JOIN book b ON b.id_book = c.id_book WHERE c.id_book = $id_book;";

$result = mysqli_query($conn, $comments);

if( mysqli_num_rows ( $result ) > 0 ){
?>
    <div class="commentsSection mb-3 px-0">
<?php
while($row = mysqli_fetch_assoc($result)) {
    ?>
    
    <form action="delete_comment.php" method="GET" class="comments px-2 py-3 mb-3">
        <p class="fw-bold"><?php echo $row['firstname_user'] ?> <?php echo $row['lastname_user'] ?><span class="fw-light"> <?php echo $row['content'] ?></span></p>
        <p class="commetDate"><?php echo $row['date_comment'] ?></p>
        <?php 
        if(!empty($_SESSION["id_user"]) && $row['id_user'] === $id){
        ?>
        <button type="submit" class="editDelete" >Delete</button>
        <input type="hidden" name="id_book" value="<?php echo $id_book ?>">
        <input type="hidden" name="id_comment" value="<?php echo $row['id_comment'] ?>">
        <?php } ?>
    </form>
    <?php
}
?>
    </div>
    
    <?php
}else{
    ?>
    <div class="comments px-2 py-3 mb-3">
        <p class="fw-bold">Theres no Comments in this book</p>
    </div>
    <?php
}
?>


<div class="px-0 mb-4">
<h2 class="leaveCommentTitle ">Leave a Comment</h2>
</div>

<form action="add_comment.php" method="POST" class="px-0 mb-5">

<div class="col-md-8">
    <div class="">
        <input class="form-control commentinput py-4" type="text" placeholder="Add a comment" name="commentarea" value = "" required>
    </div>
    <div class="my-3">
    <button type="submit" name="addComment" class="btnsend py-2 px-5">Add</button>
    <input type="hidden" name="addComment" value="<?php echo $id_book ?>">
    </div>
</div>

</form>
</div>

</div>

</div>


<footer>

<div class="text-center p-4" style="background: rgba(134, 108, 86, 0.8); color:white;font-family: 'Arial';">
© 2023 Solicode Tangier  Morocco, Inc. All Rights reserved.
</div>
    
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
</html>

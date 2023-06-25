<?php
require '../config.php'; 
    if(!empty($_SESSION["id_user"])){
        $id = $_SESSION["id_user"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
        $row = mysqli_fetch_assoc($result);
        }else{
            header("Location:login-admin.php");
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Details Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/books-details-admin.css">
</head>

<body>


    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg py-3">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand text-brand" href="books-admin.php"><img class="logoimg" src="../img/logo.png" alt="Logo"></a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item px-3">
            <a class="nav-link text-decoration-underline" href="books-admin.php">Books</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="add-book-admin.php">Add a Book</a>
        </li>

        </ul>
    </div>

    <div  class="">
        <a href="logout-admin.php" class="btnLogin py-1 px-4 mx-2" >Log out</a>
    </div>

    </div>
</nav>

<!--  Books -->

<div class="albumPrds album ">
<div class="latestsProducts py-3 container">
<?php

    $id_book = $_GET["id_book"];


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

    <div  class ="readdownloadbtnform">

    <button type="button" class ="readdownloadbtn" id="edit_bookbtn" data-bs-toggle="modal" data-bs-target="#edit_book">
    Edit
    </button>
    <input  type="hidden" name="id_book" value="'.$id_book.'">

    <div class="modal fade" id="edit_book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style = "background-color:#E8DED1;">
    <div class="modal-header">
    <h1 class="text-center fw-bold">Edit Book ID #'.$id_book.'</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    
    <form action="edit_book.php" method="POST" enctype="multipart/form-data" class="row">

    <div class="col-md-6">
    <div class="inputs">
        <label class="labelinput" for="Title"><strong>Title</strong></label>
        <input class="form-control py-3" type="text" placeholder="Title" name="title"  value = "' .$row['title']. '" required> </div>
</div>

<div class="col-md-6">
    <div class="inputs">
        <label class="labelinput" for="Author"><strong>Author</strong></label>
        <input class="form-control py-3" type="text" placeholder="Author" name="author" value = "' .$row['author']. '" required> </div>
</div>

<div class="col-md-6">
    <div class="inputs">
        <label class="labelinput" for="type"><strong>Type</strong></label>
    <select class="form-control py-3" name="type"  required>
        <option value="' .$row['type_book']. '" name = "type" >' .$row['type_book']. '</option>
        <option value="Novel" name = "Novel" >Novels</option>
        <option value="Science" name = "Science">Science</option>
        <option value="Business" name = "Business">Business</option>
    </select>
    </div>
</div>

<div class="col-md-6">
    <div class="inputs">
        <label class="labelinput" for="pagenumbers"><strong>Page Numbers</strong></label>
        <input class="form-control py-3" type="number" placeholder="Page Numbers" name="pagenumbers" value = "' .$row['pager_number']. '" required> </div>
    </div>

<div class="col-md-6">
    <div class="inputemail">
        <label class="labelinput" for="image"><strong>Image</strong></label>
        <input class="form-control py-3" type="file" placeholder="Image" name="image_book" value = "" > </div>
</div>

<div class="col-md-6">
    <div class="inputemail">
        <label class="labelinput" for="pdf-file"><strong>PDF File</strong></label>
        <input class="form-control py-3" type="file" placeholder="PDF File" name="PDF_file" value = "" > </div>
</div>

<div class="col-md-12">
    <div class="inputemail">
        <label class="labelinput" for="summary"><strong>Summary</strong></label>
        <input class="form-control py-5" type="text" placeholder="Summary" name="summary" value = "' .$row['summary']. '" required> </div>
    </div>


<div class="mt-4 gap-2 d-flex justify-content">
    <button class="btn px-5 py-2 " name = "submit" type = "submit" style = "background-color:#866C56;color:white;">Save</button> 
    <input  type="hidden" name="id_book" value="'.$id_book.'">
</div>

    
    </form>

    </div>
        
    
    </div>
    </div>
    </div>
    </div>

    <div class ="readdownloadbtnform">
    <button type="button" class ="readdownloadbtn"style="background-color:#684242;" id="delete_bookbtn" data-bs-toggle="modal" data-bs-target="#delete_book">
    Delete
    </button>
    <input  type="hidden" name="id_book" value="'.$id_book.'">
    </div>
    <div class="modal fade" id="delete_book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style = "background-color:#E8DED1;">
    <div class="modal-header">
        <h2 class="modal-title fw-bold" id="exampleModalLabel">Delete Book ID #'.$id_book.'</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    
    <form action="delete-book.php" method="GET" enctype="multipart/form-data">
    
        <label for="ID" class="fw-bold">Are you sure want to delete this Book ?</label>
        <input type="hidden" name="id_book" id="ID"  value="">
    
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" name = "submit" type = "submit">Delete</button> 
        <input  type="hidden" name="id_book" value="'.$id_book.'">
    
        </div>
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

<div class="px-0 mb-2">
<h2 class="commenttitle ">Comments</h2>
</div>


<?php


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
    
    <form action="../user/delete_comment.php" method="GET" class="comments px-2 py-3 mb-3">
        <p class="fw-bold"><?php echo $row['firstname_user'] ?> <?php echo $row['lastname_user'] ?><span class="fw-light"> <?php echo $row['content'] ?></span></p>
        <p class="commetDate"><?php echo $row['date_comment'] ?></p>
        <button type="submit" class="editDelete" >Delete</button>
        <input type="hidden" name="id_book" value="<?php echo $id_book ?>">
        <input type="hidden" name="id_comment" value="<?php echo $row['id_comment'] ?>">
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



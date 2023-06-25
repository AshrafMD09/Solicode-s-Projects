<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add a book admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/add-book-admin.css">
</head>

<body>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg py-3">
    <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand text-brand" href="add-book-admin.php"><img class="logoimg" src="../img/logo.png" alt="Logo"></a>

    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

        <li class="nav-item px-3">
            <a class="nav-link " href="books-admin.php">Books</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link text-decoration-underline" href="add-book-admin.php">Add a Book</a>
        </li>

        </ul>
    </div>

    <div  class="">
        <a href="logout-admin.php" class="btnLogin py-1 px-4 mx-2" >Log out</a>
    </div>

    </div>
</nav>

    <!-- Infos -->

<div class="container my-3">

<div class=" formSU ">

<h1 class="text-center fw-bold">Add a new Book to Our Library</h1>
            
    <form class="row" action = "add-book-adminrun.php" method ="POST" enctype="multipart/form-data">

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="Title"><strong>Title</strong></label>
                    <input class="form-control py-3" type="text" placeholder="Title" name="title"  value = "" required> </div>
            </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="Author"><strong>Author</strong></label>
                    <input class="form-control py-3" type="text" placeholder="Author" name="author" value = "" required> </div>
            </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="type"><strong>Type</strong></label>
                <select class="form-control py-3" name="type"  required>
                    <option value="" name = "" >Select a type</option>
                    <option value="Novel" name = "Novel" >Novels</option>
                    <option value="Science" name = "Science">Science</option>
                    <option value="Business" name = "Business">Business</option>
                    <option value="History" name = "History">History</option>
                </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="inputs">
                    <label class="labelinput" for="pagenumbers"><strong>Page Numbers</strong></label>
                    <input class="form-control py-3" type="number" placeholder="Page Numbers" name="pagenumbers" value = "" required> </div>
                </div>

            <div class="col-md-6">
                <div class="inputemail">
                    <label class="labelinput" for="image"><strong>Image</strong></label>
                    <input class="form-control py-3" type="file" placeholder="Image" name="image_book" value = "" required> </div>
            </div>

            <div class="col-md-6">
                <div class="inputemail">
                    <label class="labelinput" for="pdf-file"><strong>PDF File</strong></label>
                    <input class="form-control py-3" type="file" placeholder="PDF File" name="PDF_file" value = "" required> </div>
            </div>

            <div class="col-md-12">
                <div class="inputemail">
                    <label class="labelinput" for="summary"><strong>Summary</strong></label>
                    <input class="form-control py-5" type="text" placeholder="Summary" name="summary" value = "" required> </div>
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
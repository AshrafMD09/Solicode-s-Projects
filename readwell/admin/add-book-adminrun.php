<?php
require '../config.php'; 
    if(!empty($_SESSION["id_user"])){
        $id = $_SESSION["id_user"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id AND type_user = 'admin'");
        $row = mysqli_fetch_assoc($result);
        }else{
            header("Location:login-admin.php");
        }


        $title = $_POST["title"];
        $author = $_POST["author"];
        $type = $_POST["type"];
        $pagenumbers = $_POST["pagenumbers"];
        $summary = $_POST["summary"];

        $image_book = $_FILES['image_book']['name'];
        $folder_image_book = "./../img/";
        move_uploaded_file($_FILES['image_book']['tmp_name'], $folder_image_book. $image_book);
    
    
        $PDF_file = $_FILES['PDF_file']['name'];
        $folder_PDF_file = "./../pdf_books/";
        move_uploaded_file($_FILES['PDF_file']['tmp_name'], $folder_PDF_file. $PDF_file);


        $add_book = $conn->prepare("INSERT INTO `book`(`title`, `author`, `image_book`, `type_book`, `summary`, `pager_number`, `PDF_file`) 
        VALUES ('$title','$author','../img/$image_book','$type','$summary','$pagenumbers','../pdf_books/$PDF_file')" );

        $add_book->execute();

        header("Location:add-book-admin.php");
        exit();
?>
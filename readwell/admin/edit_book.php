<?php
require "../config.php";

if(!empty($_SESSION["id_user"])){
    $id = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id AND type_user = 'admin'");
    $row = mysqli_fetch_assoc($result);
    }else{
        header("Location:login-admin.php");
    }

    $id_book = $_POST["id_book"];

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
    move_uploaded_file($_FILES['PDF_file']['tmp_name'], $folder_PDF_file.$PDF_file);

    if($image_book != '' && $PDF_file != ''){

        $edit = $conn->prepare("UPDATE `book` SET `title`='$title',`author`='$author',
        `image_book`='../img/$image_book',`type_book`='$type',`summary`='$summary',`pager_number`='$pagenumbers',`PDF_file`='../pdf_books/$PDF_file' 
        WHERE id_book = $id_book");

    }elseif($image_book != ''){

        $edit = $conn->prepare("UPDATE `book` SET `title`='$title',`author`='$author',
        `image_book`='../img/$image_book',`type_book`='$type',`summary`='$summary',`pager_number`='$pagenumbers' 
        WHERE id_book = $id_book");

    }elseif($PDF_file != ''){

        $edit = $conn->prepare("UPDATE `book` SET `title`='$title',`author`='$author',
        `PDF_file`='../pdf_books/$PDF_file',`type_book`='$type',`summary`='$summary',`pager_number`='$pagenumbers' 
        WHERE id_book = $id_book");

    }
    else{
        $edit = $conn->prepare("UPDATE `book` SET `title`='$title',`author`='$author',
        `type_book`='$type',`summary`='$summary',`pager_number`='$pagenumbers' 
        WHERE id_book = $id_book");
    }

    $edit->execute();

    header("Location:books-details-admin.php?id_book=$id_book");
    exit();
    

?>
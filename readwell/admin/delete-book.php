<?php

require '../config.php';
if(!empty($_SESSION["id_user"])){
    $id_user = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user AND type_user = 'admin'");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:login-admin.php");
}

        $id_book = $_GET['id_book'];

        $deleteBook_sql = mysqli_query($conn, "DELETE FROM `book` WHERE id_book = '$id_book'");

        header("Location:books-admin.php");
        exit();

    ?>
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

        $id_book = $_GET['id_book'];
        $id_comment = $_GET['id_comment'];

        $deleteComment_sql = mysqli_query($conn, "DELETE FROM `comment` WHERE id_comment = '$id_comment'");

        if($row['type_user']==='user'){
            header("Location:books-details.php?id_book=$id_book");
        }else{
            header("Location:../admin/books-details-admin.php?id_book=$id_book");
        }
        
        exit();

    ?>
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

$select = mysqli_query($conn, "SELECT * FROM favoris f WHERE f.id_user = $id_user AND f.id_book = $id_book ");
$number = mysqli_num_rows($select);

if($number > 0){
    $deletefav_sql = mysqli_query($conn, "DELETE FROM `favoris` WHERE id_user = '$id_user' AND id_book = '$id_book' ");
}else{
    $addfav_sql = mysqli_query($conn, 
    "INSERT INTO `favoris`(`id_user`, `id_book`) VALUES ('$id_user','$id_book')");
    
}

header("Location:books-details.php?id_book=$id_book");
exit();

?>
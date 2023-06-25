<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
$id_user = $_SESSION["id_user"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
$row = mysqli_fetch_assoc($result);
}else{
    header("Location:home.php");
}

$id_book = $_POST["addComment"];
$commentarea = $_POST["commentarea"];

$addComment_sql = mysqli_query($conn, 
"INSERT INTO `comment`(`content`,`id_user`, `id_book`) VALUES ('$commentarea','$id_user','$id_book')");

header("Location:books-details.php?id_book=$id_book");
exit();
?>
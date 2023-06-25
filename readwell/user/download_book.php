<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
    $id_user = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:home.php");
}

$id_book = $_GET['id_book'];

$book = mysqli_query($conn, "SELECT * FROM book WHERE id_book = $id_book ");
$row_book = mysqli_fetch_assoc($book);

$file_url = $row_book['PDF_file'];
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url); 

exit();
?>
<?php

require 'config.php';
if(!empty($_SESSION["id_admin"])){
    $id_admin = $_SESSION["id_admin"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin");
    $row = mysqli_fetch_assoc($result);
    }
    else{
    header("Location: login-admin.php");
    }



$id_admin = $_SESSION["id_admin"];
$id_emprunt = $_GET['id_emprunt'];

$dateRetour = date('Y-m-d H:i:s');

$Modifieremprunt = $conn->prepare("UPDATE emprunt SET date_retour = '$dateRetour' WHERE id_emprunt = '$id_emprunt'");

$Modifieremprunt->execute();

header("Location: admin-emprunt.php");
exit();

?>
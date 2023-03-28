<?php
require "config.php";

if(!empty($_SESSION["id_admin"])){
    $id_admin = $_SESSION["id_admin"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin");
    $row = mysqli_fetch_assoc($result);
    }
    else{
    header("Location: login-admin.php");
    }

    $id_ouvrage = $_GET['id_ouvrage'];
    $ID = $_GET["deleteExemplaire"];

    $Supprimer = $conn->prepare("DELETE FROM `exemplaire` WHERE id_exemplaire = '$ID'");
    $Supprimer->execute();
    header("Location: ouvrage-edit-admin.php?id_ouvrage=$id_ouvrage");
    exit();

?>
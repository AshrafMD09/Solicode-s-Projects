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

    $id_ouvrage = $_GET["id_ouvrage"];
    $titre = $_GET["titre"];
    $autheur = $_GET["autheur"];
    $ouvrageType = $_GET["ouvrageType"];
    $date_edition = $_GET["date_edition"];
    $date_achat = $_GET['date_achat'];
    $nombre_pages = $_GET["nombre_pages"];

    $ouvrageImg = $_FILES['ouvrageImg']['name'];
    move_uploaded_file($_FILES['ouvrageImg']['tmp_name'], "./".$ouvrageImg);

    if($ouvrageImg != ''){

        $Modifier = $conn->prepare("UPDATE `ouvrage` SET titre = '$titre', autheur = '$autheur',
        ouvrageImg = '$ouvrageImg', ouvrageType = '$ouvrageType', date_edition = '$date_edition', 
        date_achat = '$date_achat',nombre_pages=$nombre_pages WHERE id_ouvrage = '$id_ouvrage'");

    }
    else{
        $Modifier = $conn->prepare("UPDATE `ouvrage` SET titre = '$titre', autheur = '$autheur',
        ouvrageType = '$ouvrageType', date_edition = '$date_edition', 
        date_achat = '$date_achat',nombre_pages=$nombre_pages WHERE id_ouvrage = '$id_ouvrage'");
    }

    $Modifier->execute();

    header("Location: ouvrage-edit-admin.php?id_ouvrage=$id_ouvrage");
    exit();
    

?>
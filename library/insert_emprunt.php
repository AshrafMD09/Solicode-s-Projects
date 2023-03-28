<?php
require 'config.php';
if (isset($_GET['accepterReservation'])){
    $reservation_id = $_GET["id_reservation"];
    $id_admin = $_SESSION["id_admin"];
    $empruntsInsert = "INSERT INTO emprunt (`id_reservation`,`id_admin`,`date_emprunt`) VALUES ('$reservation_id','$id_admin',CURRENT_TIMESTAMP)";
    mysqli_query($conn,$empruntsInsert);

    header ("Location:admin-page.php");

}


?>
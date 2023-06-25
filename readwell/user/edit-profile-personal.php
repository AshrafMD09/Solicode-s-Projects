<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
    $id_user = $_SESSION["id_user"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];

if( (!empty($firstname)) && (!empty($lastname)) && (!empty($email))
    && (empty($password) || empty($confirmpassword) ) ){

    $upd = mysqli_query($conn, "UPDATE `user` SET `firstname_user` = '$firstname', `lastname_user` = '$lastname',`email_user` = '$email' WHERE `id_user` = '$id_user'");

    
}
elseif
( (!empty($firstname)) && (!empty($lastname)) && (!empty($email))
    && (!empty($password) && !empty($confirmpassword) ) && ($password == $confirmpassword)){

        $upd = mysqli_query($conn, "UPDATE `user` SET `firstname_user` = '$firstname', `lastname_user` = '$lastname',`email_user` = '$email' , `password_user` = '$password' WHERE `id_user` = '$id_user'");


}


header("Location:Profile-personal.php");
exit();


?>
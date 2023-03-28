<?php
require 'config.php';
// if(!empty($_SESSION["id_adherent"])){
//   header("Location: home.php");
// }
if(isset($_POST["submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $cin = $_POST["cin"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
  $birthday = $_POST["birthday"];
  $adresse = $_POST["adresse"];
  $typeofuser = $_POST["typeofuser"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $dateinscription = 'CURDATE()';

  $duplicate = mysqli_query ( $conn, "SELECT * FROM adherent WHERE username = '$username' OR email = '$email' ");

  if(mysqli_num_rows($duplicate) > 0){

    echo "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{

    if($password == $confirmpassword){
      $query = "INSERT INTO adherent  VALUES('','$firstname','$lastname','$cin','$email','$telephone','$birthday','$adresse','$typeofuser','$username','$password',$dateinscription,'0')";
      // header("window.Location: login-admin.php");
      
      
      mysqli_query($conn, $query);

      echo"<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>

  .tt{
        width: 70%;
        margin : auto;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 5% 5%;


    }
    body{

        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url(img/img9.jpeg) ;
        background-size: cover;
        background-position: center;
    }

.inputs ,select{
  margin-top: 8%;
}

@media screen and (max-width: 850px ) {

.tt{
  width: 100%;
}


}

</style>
</head>
<body>

  <div class="container mt-3">
    <div class=" formSU text-center">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        <h2>Create your Account</h2>
            <div class="col-md-6">
                <div class="inputs"> <input class="form-control" type="text" name = "firstname" placeholder="First Name" required value=""> </div>
            </div>
            <div class="col-md-6">
              <div class="inputs">  <input class="form-control" type="text" name = "lastname" placeholder="Last Name" required value=""> </div>
          </div>

          <div class="col-md-6">
            <div class="inputs"> <input class="form-control" type="text" name = "cin" placeholder="C.I.N" required value=""> </div>
        </div>

        <div class="col-md-6">
          <div class="inputs"> <input class="form-control" type="text" name = "username" placeholder="Username" required value=""> </div>
      </div>

      <div class="col-md-12">
        <div class="inputs"> <input class="form-control" type="email" name = "email" placeholder="Email" required value=""> </div>
    </div>

    <div class="col-md-6">
      <div class="inputs"><input class="form-control" type="text" name = "password" placeholder="password" required value=""> </div>
  </div>

  <div class="col-md-6">
    <div class="inputs"><input class="form-control" type="text" name = "confirmpassword" placeholder="Confirm password" required value=""> </div>
</div>

<div class="col-md-12">
  <div class="inputs"><input class="form-control" type="text" name = "adresse" placeholder="Adresse" required value=""> </div>
</div>

          <div class="col-md-6">
            <div class="inputs"><input class="form-control" name = "telephone" type="number" placeholder="Telephone" required value=""> </div>
        </div>

      <div class="col-md-6">
        <div class="inputs"><input class="form-control" type = "date" name="birthday" placeholder = "birthday"  required value=""> </div>
    </div>

    <div class="col-md-6">
      
      
    <select class="form-control" name = "typeofuser">
      <option value="Etudiant" >Etudiant</option>
      <option value="Employé" >Employé</option>
      <option value="Fonctionnaire" >Fonctionnaire</option>
      <option value="Femme au foyer" >Femme au foyer</option>

    </select>
    
    </div>

        <div class="mt-3 gap-2 d-flex justify-content-around">
          <button class="px-3 btn btn-sm btn-success" type = "submit" name = "submit" >Sign Up</button>
          <a class="px-3 btn btn-sm btn-dark" href="login.php">Log in</a>
          <!-- <a href="login.php">Login</a> -->
        </div>
    </div>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
  header("Location:home.php");
}
if(isset($_POST["submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];


  $duplicate = mysqli_query ( $conn, "SELECT * FROM user WHERE  email_user = '$email' ");

  if(mysqli_num_rows($duplicate) > 0){
    
    echo "<script> alert('Email Has Already Taken'); </script>";
  }
  else{

    if($password == $confirmpassword){
      $query = "INSERT INTO user  VALUES('','$firstname','$lastname','$email','$password')";
      
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
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>

  <div class="container mt-3">
    <div class=" formSU ">
        
        <form class="tt row" method = "POST" action = ""  autocomplete="off">
        <h1 class="par text-center fw-bold">Create your Account</h1>
            <div class="col-md-6">
                <div class="inputs"> <label for="firstname" class ="labelinputs ">First Name</label><input class="form-control py-3 mt-2" type="text" name = "firstname" placeholder="First Name" required value=""> </div>
            </div>
            <div class="col-md-6">
              <div class="inputs">  <label for="lastname" class ="labelinputs">Last Name</label><input class="form-control py-3 mt-2" type="text" name = "lastname" placeholder="Last Name" required value=""> </div>
          </div>

      <div class="col-md-12">
        <div class="inputsemail mt-4"><label for="email" class ="labelinputs">Email</label><input class="form-control py-3 mt-2" type="email" name = "email" placeholder="Email" required value=""> </div>
    </div>

    <div class="col-md-6">
      <div class="inputs"><label for="password" class ="labelinputs">Password</label><input class="form-control py-3 mt-2" type="password" name = "password" placeholder="Password" required value=""> </div>
  </div>

  <div class="col-md-6">
    <div class="inputs"><label for="confirmpassword" class ="labelinputs">Confirm Password</label><input class="form-control py-3 mt-2" type="password" name = "confirmpassword" placeholder="Confirm password" required value=""> </div>
</div>

<div class="mt-5 col-md-6">
          <button class="btnsignin py-3 px-5 mb-5 col-md-6" type = "submit" name = "submit" >Sign Up</button>
</div>

<div class="inputs col-md-6">
  <p class= "par">Already have an Account ? <span><a href="login.php">Log in</a></span></p>
</div>



        </form>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
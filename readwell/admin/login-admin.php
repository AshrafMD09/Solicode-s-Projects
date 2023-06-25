<?php
require '../config.php';
if(!empty($_SESSION["id_user"])){
  header("Location:books-admin.php");
}
if(isset($_POST["submit"])){

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email' AND type_user = 'admin'");

  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0){

    if($password == $row['password_user']){

      $_SESSION["login"] = true;
      $_SESSION["id_user"] = $row["id_user"];

      header("Location:books-admin.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  
    <form class="tt" action="" method="POST" autocomplete="off">

        <div class="form-outline mb-4">
        <h2 class="par text-center fw-bold">Log In as Admin</h2>
          </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="par" class="form-label" for="form2Example1">Email</label>
          <input type="text" name = "email" id = "email" class="form-control py-3 mt-2" required value="" placeholder="Email">
          
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="par" class="form-label" for="form2Example2">Password</label>
          <input type="password" name = "password" id="password" class="form-control py-3 mt-2" required value="" placeholder="Password">
        </div>
      
        <!-- Submit button -->
        <button type="submit" name = "submit" class="btnsignin py-3 px-5 mb-5">Sign in</button>
      
        <!-- Register button -->
        <div class="text-center">
          <p class="par">Not a member? <a href="signup.php">Register</a></p>
        </div>
      </form>
    <!-- </div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
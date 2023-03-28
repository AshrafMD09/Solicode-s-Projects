<?php
require 'config.php';
if(!empty($_SESSION["id_admin"])){
  header("Location: admin-page.php");
}
if(isset($_POST["submit"])){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0){

    if($password == $row['password']){

      $_SESSION["login"] = true;
      $_SESSION["id_admin"] = $row["id_admin"];

      header("Location: admin-page.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Admin Not Registered'); </script>";
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
<style>


    .tt{
        width: 35%;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 5% 5%;
        /* justify-content: center; */


    }
    body{
        /* background-color: #F2E4DD; */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url(img/img9.jpeg) ;
        background-size: cover;
        background-position: center;
    }
    h1{
        font-size: 3rem;
    }

    @media screen and (max-width: 850px ) {

      .tt{
        width: 60%;
      }


    }
</style>
</head>
<body>
  
    <form  method = "POST" action = "" class="tt">

        <div class="form-outline mb-4">
        <h2>Log In as an Admin</h2>
          </div>
        <!-- username input -->
        <div class="form-outline mb-4">
          <input type="text" name = "username" id="username" class="form-control" required value="">
          <label class="form-label" for="username">Username</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name = "password" id="password" class="form-control" required value="">
          <label class="form-label" for="password">Password</label>
        </div>
      
        <!-- Submit button -->
        <button type="submit" name = "submit"  class="btn btn-primary btn-block mb-4">Sign in</button>
      
      </form>
    <!-- </div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
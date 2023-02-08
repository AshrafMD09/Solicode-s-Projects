<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Agentur</title>
    <style>
        *{
            margin : 0;
            padding : 0;
        }
        
        h3{
            text-align : center;
            margin : 3% 0px;
            }
            .form-row{
                
                
                margin : auto;
                padding : auto;
                margin-top : 5% ;
                margin-bottom : 5% ;
            }


            .title-cont{
              
              text-align : center ; 
              margin : 10% 0px;
            }


            .form-group {
                margin-bottom : 5% ;
            }

            #btnAjouter {
              margin : auto;
              padding : auto;
              width : 50%;
            }

            #btnValider{

            }


.edit-product-form{
              
  min-height: 100vh;
  background-color: rgba(0,0,0,.7);
  display: flex;
  align-items: center;
  justify-content: center;
  padding:0.5rem;
  overflow-y: scroll;
  position: fixed;
  top:0; left:0; 
  z-index: 1200;
  width: 100%;
}

.edit-product-form form{
  
  width: 50rem;
  padding:1rem;
  text-align: center;
  border-radius: .5rem;
  background-color: white;
}

.edit-product-form form img{
  height: 25rem;
  margin-bottom: 1rem;
}
.edit-product-form form .box{
  margin:0.5rem 0;
  padding:0.7rem 1.2rem;
  width: 100%;
}

.edit-product-form form table, .edit-product-form form tr, .edit-product-form form td{
  background-color: white;
  border: none;
}

.quick-info-box {
  width: 300px;
  height: auto;
  margin: auto;
  background-color: #FFF0F5;
  box-shadow: rgba(99, 99, 99, 0.3) 0px 2px 8px 0px;
  border-radius: .5rem;
}

.quick-info-box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, 300px);
  gap:20px;
  justify-content: center;
  max-width: 1400px;
  margin:0 auto;
  align-items: flex-start; 
  position: relative;
  top: 100px;
}

#close-update , .btnModif{
  margin-top : 10%;
  padding: 5% ;
  border-radius : 5px;
  color : white ;
  background-color : black;
  font-weight : bold ;
}





    </style>
</head>
<body class=" bg-body-tertiary" >
    
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <h2>Your Future House</h2>

        <form action = "agence.php" method = "POST" class="" >

        <select class="btn btn-outline-dark" name="Announcements" id = "Announcements">

            <option value="" name = "allAnnouncements" >All Announcements</option>
            <option value="location" name = "location" >Location</option>
            <option value="vente" name = "vente">Vente</option>
            
        </select>

        <input type="number" class="btn btn-outline-dark" placeholder = "Min Price" name = "minprice">
        <input type="number" class="btn btn-outline-dark" placeholder = "Max Price" name = "maxprice">
        <input class="btn btn-success" type="submit" value = "Valider" name = "valider" id = "btnValider">

        </form>

        <a href = "#formulaire" id="search-btn" class="btn btn-outline-dark" type="button">Ajouter une annonce</a>



        </div>

</nav>

<div class="bg-body-tertiary">

  <h1 class = "title-cont">Welcome To Your New Home</h1>

</div>

<?php 

$conn = mysqli_connect('localhost' , 'root' , '' , 'agence');

                     //DELETE

          if(isset($_POST['delete'])){
            
            $id = $_POST['id'];
            $query = "DELETE FROM annonce WHERE id = '$id'";
            $query_run = mysqli_query($conn , $query);
            // header("Refresh:0");

            }

                      //ADD


      if(isset($_POST['titre']) && isset($_POST['image']) && isset($_POST['description']) &&
        ($_POST['superficie']) && isset($_POST['adresse']) && isset($_POST['montant']) && ($_POST['date']) && isset($_POST['type']) ){

      if(!empty($_POST['titre']) && !empty($_POST['image']) && !empty($_POST['description']) &&
      !empty($_POST['superficie']) && !empty($_POST['adresse']) && !empty($_POST['montant']) && !empty($_POST['date']) && !empty($_POST['type'])){

      $titre = htmlspecialchars($_POST['titre']);
      $image = htmlspecialchars($_POST['image']);
      $description = htmlspecialchars($_POST['description']);
      $superficie = htmlspecialchars($_POST['superficie']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $montant = htmlspecialchars($_POST['montant']);   
      $date = htmlspecialchars($_POST['date']);
      $type = htmlspecialchars($_POST['type']);

      $insertionAnnonce = $conn->prepare('INSERT INTO annonce (titre,image,description,superficie,adresse,montant,date,type) VALUES(?,?,?,?,?,?,?,?)');
      // $insertionAnnonce->execute(array($titre,$image,$description,$superficie,$adresse,$montant,$date,$type));
      $insertionAnnonce->bind_param("ssssssss", $titre, $image, $description, $superficie, $adresse, $montant, $date, $type);
      $insertionAnnonce->execute();
      // header("Refresh:0");
      }
}


            //EDIT

            if(isset($_POST['update_product'])){

              $edit_id = $_POST['edit_id'];
              $edit_titre = $_POST['edit_titre'];
              $edit_description = $_POST['edit_description'];
              $edit_superficie = $_POST['edit_superficie'];
              $edit_adresse = $_POST['edit_adresse'];
              $edit_montant = $_POST['edit_montant'];
              $edit_date = $_POST['edit_date'];
              $edit_type = $_POST['edit_type'];
              $edit_image = $_FILES['edit_image']['name'];
    
              move_uploaded_file($_FILES['edit_image']['name'], $edit_image);
              if($edit_image != ''){
              mysqli_query($conn, "UPDATE `annonce` SET titre = '$edit_titre', image = '$edit_image' , description = '$edit_description',
              superficie = $edit_superficie, adresse = '$edit_adresse', montant = '$edit_montant', date = '$edit_date' ,
                type = '$edit_type'  WHERE id = '$edit_id'") or die('query failed');}
    
    else {
          mysqli_query($conn, "UPDATE `annonce` SET titre = '$edit_titre', description = '$edit_description',
          superficie = $edit_superficie, adresse = '$edit_adresse', montant = '$edit_montant', date = '$edit_date' ,
          type = '$edit_type' WHERE id = '$edit_id'") or die('query failed');
      }
              
    
              header('location:agence.php');
            }
        
        
        //SEARCH FILTER

    $sql = "SELECT * FROM annonce";
      
    if(isset($_POST['valider'])){

      $Announcements = $_POST['Announcements'];
      $minprice = $_POST['minprice'];
      $maxprice = $_POST['maxprice'];

      if ($Announcements !=  "" && ($minprice == "" && $maxprice == "" )){
        $sql = "SELECT * FROM annonce WHERE type = '$Announcements'";
      
      }

      elseif($Announcements ==  "" && ($minprice != "" && $maxprice != "" )){
          $sql = "SELECT * FROM annonce WHERE montant BETWEEN '$minprice' and '$maxprice'";
      }
      
      elseif($Announcements !=  "" && ($minprice != "" && $maxprice != "" ))
        $sql = "SELECT * FROM annonce WHERE type = '$Announcements' AND montant BETWEEN '$minprice' AND '$maxprice'" ;

    }  
  

        //AFFICHAGE
          
    
    $result = mysqli_query($conn, $sql);
    
    if( mysqli_num_rows ( $result ) > 0 ){
    
    echo '<main role="main">
    
    
    <div class="album py-5 bg-light">
    <div class="container">
    
    <div class="row">';
    
    while($ligne = mysqli_fetch_assoc($result)) {
              echo   "
              <div class='col-md-4'>
              <div class='card mb-4 box-shadow'>
              
                  <h3>" .$ligne['titre']. "</h3>
                  <img class='card-img-top' src='img/" .$ligne['image']. "' alt='Card image cap'>
                <div class='card-body'>
                  <span>" .$ligne['description']. "</span><br>
                  <span>" .$ligne['adresse']. "</span><br>
                  <span>" .$ligne['montant']. "</span></span><span>$</span><br>
                  <span>".$ligne['superficie']. "</span><span>m</span><br>
                  <span>" .$ligne['date']. "</span><br>
                  <span>" .$ligne['type']. "</span>
                  <div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>
    
                  <form action='agence.php' method='post'>
                  
                  <input type='hidden' name='id' value =".$ligne['id'].">
                  <input type='submit' class='btn btn-sm btn-outline-secondary' name='delete' value ='DELETE' >

                  <a href= agence.php?edit=" .$ligne['id']."  class='btn btn-sm btn-outline-secondary' >EDIT</a>
    
                  </form>
                    
                  </div>
                  </div>
              </div>
              
              </div>
          </div>
          "
          ;
      }
      echo '</div>
          </div>
      </div>
      </main>';
      
      }
    

?>


<form id = "formulaire" action = "agence.php" method = "POST" >
<div class="form-row col-md-3">

                <h2 class="form-group col-md">Ajouter une Annonce</h2>

    <div class="form-group col-md">
      <input type="text" class="form-control" name = "titre" id="inputTitre" placeholder="Titre">
    </div>

    <div class="form-group col-md">
      <input type="file" class="form-control"  name = "image" id="inputImage" placeholder="image">
    </div>

    <div class="form-group col-md">
      <input type="text" class="form-control" name = "description" id="inputDescription" placeholder="Description">
    </div>

    <div class="form-group col-md ">
      <input type="number" class="form-control" name = "superficie" id="inputSuperficie" placeholder="Superficie">
    </div>

    <div class="form-group col-md">
      <input type="text" class="form-control" name = "adresse" name = "titre" id="inputAdresse" placeholder="Adresse">
    </div>

    <div class="form-group col-md">
      <input type="number" class="form-control" name = "montant" id="inputMontant" placeholder="Montant">
    </div>

    <div class="form-group col-md">
      <input type="date" class="form-control" name = "date" id="inputDate" placeholder="Date">
    </div>

    <div class="form-group col-md">

    <label for="annoncetype">Select a type</label>

      <select class="form-control" name="type" id="inputType">
            <option value="Vente">vente</option>
            <option value="Location">location</option>
      </select>

    </div>
    <button type="submit" class="btn btn-primary" id = "btnAjouter">Ajouter</button>
</div>


</form>

                    <!-- EDIT -->

                    
<section class="edit-product-form">

<?php
      if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
         $edit_query = mysqli_query($conn, "SELECT * FROM annonce WHERE id = '$edit_id' ") or die('query failed');
        if(mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_assoc($edit_query)){
  ?>

          <form id="update-product" action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                  <td colspan="2">
                    <h1 class="title">Edit Annonce</h1>
                  </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="edit_id" value="<?php echo $fetch_edit['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" name="edit_titre" class="box" value="<?php echo $fetch_edit['titre']; ?>" placeholder="modifier le titre du produit">
                    </td>
                </tr>
                
                <tr>
                  <td colspan="2" style="padding: 10px;">
                  <input type="file" id="edit_image" name="edit_image" accept="image/png, image/jpeg">
                  <label for="update_picture" class="picupload" style="padding: 14px 20px;">modifier la photo du produit</label>
                  </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <textarea rows="4" cols="50" name="edit_description" form="update-product" placeholder="modifier la description du produit" id="edit_description"><?php echo $fetch_edit['description']; ?></textarea>              
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="number" name="edit_superficie" class="box" value="<?php echo $fetch_edit['superficie']; ?>" placeholder="modifier superficie du produit">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="edit_adresse" class="box" value="<?php echo $fetch_edit['adresse']; ?>" placeholder="modifier adresse du produit">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="number" name="edit_montant" class="box" value="<?php echo $fetch_edit['montant']; ?>" placeholder="modifier montant du produit">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="date" name="edit_date" class="box" value="<?php echo $fetch_edit['date']; ?>" placeholder="modifier date du produit">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        
      <select class="form-control" name="edit_type" id="inputType" value="<?php echo $fetch_edit['type']; ?>">
            <option value="vente">vente</option>
            <option value="location">location</option>
      </select>
                      </td>
                </tr>

                <tr>
                    <td>
                      <input type="submit" value="modifier" name="update_product" class="btnModif">
                  </td>
                  <td>
                    <input type="reset" value="cancel" id="close-update" style="margin: 0 0 0 5px; width: calc(100% - 5px);">
                  </td>
                </tr>
            </table>
        </form>

        <?php
        }
      }
      }else{
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
  ?>
      </section>

<!-- custom admin js file link  -->
<script>
  document.querySelector('#close-update').onclick = () =>{
  document.querySelector('.edit-product-form').style.display = 'none';
  window.location.href = 'agence.php';
}
</script>

</body>
</html>
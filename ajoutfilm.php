

<?php include 'connectionbdd.php' ?>
// on écrit la requête sql

<?php

// On initialise les sessions
session_start();
// On commence par récupérer les champs
if(isset($_POST['id_film']))      $id=$_POST['id_film'];
else      $id="";

if(isset($_POST['titre_film']))      $titre=$_POST['titre_film'];
else      $titre="";

//if(isset($_POST['realisateur_film']))      $realisateur=$_POST['realisateur_film'];
//else      $realisateur="";

//if(isset($_POST['acteur_film']))      $acteur=$_POST['acteur_film'];
//else      $acteur="";

if(isset($_POST['date_sortie']))      $datesortie=$_POST['date_sortie'];
else      $datesortie="";

if(isset($_POST['image_film']))      $image=$_POST['image_film'];
else      $image="";

if(isset($_POST['synopsis']))      $synopsis=$_POST['synopsis'];
else      $synopsis="";

if(isset($_POST['bande_annonce']))      $bo=$_POST['bande_annonce'];
else      $bo="";


    
     // execute le traitement de la requête                     
     $reqajout = $bdd->prepare('INSERT INTO film VALUES ("$id", "$titre", "$Datesortie", "$image", "$synopsis", "$bo")') ;
     $reqajout->execute();
     // Termine le traitement de la requête
     $reqajout->closeCursor();
    echo 'Le film a bien été ajouté !';
  
  ?>
<form method="POST" action="admin.php">
  <input type="submit" name="mode admin" value="mode admin">
</form>
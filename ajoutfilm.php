

<?php include 'connectionbdd.php' ?>

<?php

// On initialise les sessions
session_start();
// On commence par récupérer les champs
if(isset($_POST['Id_film']))      $id=$_POST['Id_film'];
else      $id="";

if(isset($_POST['titre_film']))      $titre=$_POST['titre_film'];
else      $titre="";

//if(isset($_POST['realisateur_film']))      $realisateur=$_POST['realisateur_film'];
//else      $realisateur="";

//if(isset($_POST['acteur_film']))      $acteur=$_POST['acteur_film'];
else      $acteur="";

if(isset($_POST['date_sortie']))      $datesortie=$_POST['date_sortie'];
else      $datesortie="";

if(isset($_POST['image_film']))      $image=$_POST['image_film'];
else      $image="";

if(isset($_POST['synopsis']))      $synopsis=$_POST['synopsis'];
else      $synopsis="";

if(isset($_POST['bande_annonce']))      $bo=$_POST['bande_annonce'];
else      $bo="";

// On vérifie si les champs sont vides
if(empty($titre) OR empty($realisateur) OR empty($acteur) OR empty($datesortie) OR empty($image) OR empty($synopsis) OR empty($bo))
    {
    }

// Aucun champ n'est vide, on peut enregistrer dans la table
else     
    {
    
       
    // on écrit la requête sql
    include 'preparequete.php'
    
     // execute le traitement de la requête                     
     $reqajout->execute(array());
     // Termine le traitement de la requête
     $reqajout->closeCursor();
    echo 'Le film a bien été ajouté !';
  }
  ?>
<form method="POST" action="admin.php">
  <input type="submit" name="mode admin" value="mode admin">
</form>
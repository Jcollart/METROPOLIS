<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TEST</title>

  </head>

<body>
<?php include 'connectionbdd.php' ?>

<?php
$requete = $bdd->prepare("SELECT * FROM film where Id_film = '?' order by 'titre_film'");
$requete->execute(array($_GET[categorie]);
?>
<?php
while($resultat = $requete->fetch())
{

    echo $resultat['Id_film'] , ".", $resultat['titre_film'] , "<br />";

}



?>


</body>
</html>
<?php
// On initialise les sessions
session_start();

 //connection au serveur
 try
 {
   // On se connecte à MySQL
   $bdd = new PDO('mysql:host=localhost;dbname=cinemet;charset=UTF8', 'root', '');
   
 }
 catch(Exception $e)
 {
   // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : '.$e->getMessage());
 } 

// On définit le mot de pass et login
define( 'pseudo','Administrateur');
define( 'PASS','admin');

// On récupère le formulaire
$adminUser 		= isset($_POST['adminuser'])? 		$_POST['adminuser']: 	'';
$adminPassword	= isset($_POST['adminpassword'])? 	$_POST['adminpassword']:'';
$message = '<h1>PAGE ADMINISTRATEUR</h1> <br/>';

// Si les variables ne sont pas vides...
if( !empty( $adminUser ) && !empty( $adminPassword ) ){
	
	// On vérifie si elle corresspondent aux constantes
	if( $adminUser == pseudo  && $adminPassword == PASS ){
		
		// Si c'est ok, on définit la session ADMIN
		$_SESSION['admin'] = $_SERVER['REMOTE_ADDR'];
		header('Location: admin.php');
		
	} else {
		
		// Autrement => message d'erreur
		$message = '<div class="error">Nom d\'utilisateur ou mot de pass erroné</div>';
		
	}
		
}

if(isset($_GET['logout'])){
	echo '1';
	session_destroy();
	header('Location: index.php');
	
}

// On déclare le mode admin
$sessionAdmin = isset($_SESSION['admin'])? '<div id="admin"><h3>MODE ADMIN</h3>
<form method="POST" action="index.php"><input type="submit" name="mode admin" value="Deconnexion"></form></div>': '';

?>
<!DOCTYPE html">
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <title></title>
    
  </head>
  
  <body>
  <?php echo $sessionAdmin; ?>
  <div style="width:434px; margin:auto; margin-top:30px">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <?php echo $message;
	if(!$sessionAdmin){?>
      <table>
        <tr>
          <td><label>Pseudo:</label></td>
          <td><input type="text" name="adminuser" class="right" /></td>
          <td></td>
        </tr>
        <tr>
          <td><label> mdp:</label></td>
          <td><input type="password" name="adminpassword" class="right"  /></td>
          <td><input type="submit" class="left" /></td>
        </tr>
      </table>
  </div>     
      
      <?php } else {
		  
          echo '<a href="admin.php?logout">Logout</a>';
        }
           
	  ?>
    </form>
    <?php
    echo '<div class="modifilm"><center><h1>AJOUTER FILM</h1></center></div>';
    ?>
    <form method="POST" action="ajoutfilm.php">
<center>
<input type="text" name="id_film" size="20" value="id_film" maxlength="35"><br><input type="text" name="titre_film" size="20" value="titre_film" maxlength="35"><br>
<input type="text" name="date_sortie" size="20" value="date_sortie" maxlength="11"><br><input type="text" name="image_film" size="20" value="image_film" maxlength="70"><br><input type="text" name="synopsis" size="20" value="synopsis" maxlength="255"><br>
<input type="text" name="bande_annonce" size="20" value="bande_annonce" maxlength="35"><br>
<input type="submit" value="Envoyer" name="envoyer">
</center>
</form>


    <?php
    echo '<div class="modifilm"><center><h1>MODIFIER FILM</h1></center></div>';
    ?>
    <form method="POST" action="modifierfilm.php">
<center>
 <input type="text" name="id_film" size="20" value="id_film" maxlength="35"><br><input type="text" name="titre_film" size="20" value="titre_film" maxlength="35"><br>
<input type="text" name="nom_realisateur" size="20" value="nom_realisateur" maxlength="35"><br><input type="text" name="nom_acteur" size="20" value="nom_acteur" maxlength="70"><br>
<input type="text" name="date_sortie" size="20" value="date_sortie" maxlength="11"><br><input type="text" name="image_film" size="20" value="image_film" maxlength="70"><br><input type="text" name="synopsis" size="20" value="synopsis" maxlength="255"><br>
<input type="text" name="genre" size="20" value="genre" maxlength="35"><br><input type="text" name="bande_annonce" size="20" value="bande_annonce" maxlength="35"><br>
<input type="submit" value="Envoyer" name="envoyer">
</center>
</form>
    
<?php
    echo '<div class="modifilm"><center><h1>SUPPRIMER FILM</h1></center></div>';
    ?>
    <form method="POST" action="supprimfilm.php">
<center>
<input type="text" name="id_film" size="20" value="id_film" maxlength="35"><br>
<input type="submit" value="Envoyer" name="envoyer">
</center>
</form>

  </body>
</html>



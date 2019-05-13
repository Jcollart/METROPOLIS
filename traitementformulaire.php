<?php
//Connexion à la BDD
  try
  {

   $bdd = new PDO ('mysql:host=localhost;dbname=cinemet', 'root', '');

  }

  catch(Exception $e)
  {
   die('Erreur :'.$e->getMessage());
  }

    if(ISSET($_POST['submit']))
{


  $nom =   $_POST['lastname'];
  $prenom = $_POST['firstname'];
  $sexe = $_POST['sexe'];
  $age = $_POST['age'];
  $ville = $_POST['ville'];
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $password_repeat = $_POST['password-repeat'];
  $email = $_POST['email'];
  $email_repeat = $_POST['email-repeat'];


  $req = $bdd->prepare('INSERT INTO utilisateur_particulier(prenom, nom, age, sexe, ville, pseudo, mdp, mdp_repeat, email, email_repeat)
                        VALUES (:prenom, :nom, :age, :sexe, :ville, [langue]seudo, :mdp, :mdp_repeat, :email, :email_repeat)');


  $req->execute(array("prenom" => $prenom, "nom" => $nom, "age" => $age, "sexe" => $sexe, "ville" => $ville, "pseudo" => $pseudo, "mdp" => $password, "mdp_repeat" => $pasword_repeat, "email" => $email, "email_repeat" => $email_repeat));






                        if(!empty($nom) && !empty($prenom) && !empty($sexe) && !empty($age)&& !empty($ville) && !empty($pseudo)
                            && !empty($password) && !empty($password_repeat) && !empty($email) && !empty($email_repeat))
                        {


                        }else{
                        ?>


                        <b>Veuillez remplir tous les champs</b>


                        <?php
                        }


                        if(empty($nom) && empty($prenom) && empty($sexe) && empty($age) && empty($ville) && empty($pseudo)
                            && empty($password) && empty($password_repeat) && empty($email) && empty($email_repeat))
                        {


                        }else{


                        session_start();
                        $_SESSION['pseudo'] = $_POST['pseudo'];
                        header('Location: contact.php');


                        }


                        }

                           ?>
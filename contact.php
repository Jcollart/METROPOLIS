<?php
    session_start();

    // Fichier PHP contenant la connexion à votre BDD

    include('connectionbdd.php'); 

    // S'il y a une session alors on ne retourne plus sur cette page
   
    if (isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
    
        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $nom_membre  = htmlentities(trim($nom)); // On récupère le nom
            $prenom_membre = htmlentities(trim($prenom)); // on récupère le prénom
            $email_membre = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $pass_membre = trim($mdp); // On récupère le mot de passe 
            $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe

            //  Vérification du nom
            if(empty($nom_membre)){
                $valid = false;
                $nom_membre = ("Le nom d' utilisateur ne peut pas être vide");
            }       

            //  Vérification du prénom
            if(empty($prenom_membre)){
                $valid = false;
                $prenom_membre = ("Le prenom d' utilisateur ne peut pas être vide");
            }       

            // Vérification du mail
            if(empty($email_membre)){
                $valid = false;
                $email_membre = "Le mail ne peut pas être vide";

                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email_membre)){
                $valid = false;
                $email_membre = "Le mail n'est pas valide";

            }else{
                // On vérifit que le mail est disponible
                $requetemail = $bdd->prepare("SELECT mail FROM membre WHERE mail = ?",
                    array($email_membre));

                $requetemail = $requetemail->fetch();

                if ($requetemail['mail'] <> ""){
                    $valid = false;
                    $email_membre = "Ce mail existe déjà";
                }
            }

            // Vérification du mot de passe
            if(empty($pass_membre)) {
                $valid = false;
                $pass_membre = "Le mot de passe ne peut pas être vide";

            }elseif($pass_membre != $confmdp){
                $valid = false;
                $pass_membre = "La confirmation du mot de passe ne correspond pas";
            }

            // Si toutes les conditions sont remplies alors on fait le traitement
            //if($valid){

              //  $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
               // $date_creation_compte = date('Y-m-d H:i:s');

                // On insert nos données dans la table utilisateur
                $bdd->insert("INSERT INTO membre (nom, prenom, mail, mdp, date_creation_compte) VALUES 
                    (?, ?, ?, ?, ?)", 
                    array($nom_membre, $prenom_membre, $email_membre, $pass_membre, $date_creation_compte));

                header('Location: index.php');
                exit;
            }
        }
        }
      
      
?>

<!DOCTYPE html>
<html>

<head>
  <title>Inscription Allocinemet</title>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One|Roboto+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>

<body>
  <!--//////////////////////////////  NAVBAR  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

  <header id="haut">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">ALLOCINE<strong>MET</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="allo_films.php">FILMS <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">INSCRIPTION</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Plus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="acteur.php">ACTEUR</a>
              <a class="dropdown-item" href="realisateur.php">REALISATEUR</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="admin.php">ADMINISTRATION</a>
            </div>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="recherche" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i style="font-size:1em"
              class="fas fa-search"></i></button>
        </form>
      </div>
    </nav>
  </header>


  <div class="titre-contact text-center mx-5 my-5">
    <h1><strong>PAGE INSCRIPTION</strong></h1>
  </div>
  <div class="logo-contact text-center">
    <i style="font-size:3em" class="fas fa-user-plus"></i>
  </div>
  <div class="form-contact mx-5 my-5">


    <form action="" method="post">

      <div class="inscription-form">
        <div class="bloc-form">
          <?php
                // S'il y a une erreur sur le nom alors on affiche
                if (isset($nom_membre)){
                ?>
          <div><?= $nom_membre ?></div>
          <?php   
                }
            ?>
          <p>
            <label class="form-title" for="lastname">Nom<span class="redstar">*</span></label>
          </p>
          <p>
            <input type="text" placeholder="votre nom" name="nom"
              value="<?php if(isset($nom_membre)){ echo $nom_membre; }?>" class="input-field input-lastname"
              id="lastname" required />
          </p>
          <?php
                if (isset($prenom_membre)){
                ?>
          <div><?= $prenom_membre ?></div>
          <?php   
                }
            ?>

          <p>
            <label class="form-title form-firstname" for="firstname">Prenom<span class="redstar">*</span></label>
          </p>
          <p>
            <input type="text" placeholder="votre prenom" name="prenom"
              value="<?php if(isset($prenom_membre)){ echo $prenom_membre; }?>" class="input-field input-firstname"
              id="firstname" required />
          </p>
          <?php
                if (isset($email_membre)){
                ?>
          <div><?= $email_membre ?></div>
          <?php   
                }
            ?>
          <p>
            <label for="inputname">Email<span class="redstar">*</span></label>
          </p>
          <p>
            <input type="email" placeholder="tapez votre Email" name="mail"
              value="<?php if(isset($email_membre)){ echo $email_membre; }?>" class="input-field input-email"
              id="inputEmail" required>
          </p>
          <?php
                if (isset($pass_membre)){
                ?>
          <div><?= $pass_membre ?></div>
          <?php   
                }
            ?>
          <p>
            <label for="inputname">Mot de passe<span class="redstar">*</span></label>
          </p>
          <p>
            <input type="mdp" placeholder="tapez votre mot de passe" name="mdp"
              value="<?php if(isset($pass_membre)){ echo $pass_membre; }?>" class="input-field input-email"
              id="inputEmail" required><br />
            <input type="mdp" placeholder="Confirmer le mot de passe" name="confmdp" required>
          </p>

          <button type="submit" name="inscription" class="btn btn-secondary col-2 offset-5">S'INSCRIRE</button>
        </div>
      </div>
    </form>

  </div>
  <footer id="footer" class="page-footer font-small text-white mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left ">

      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3 mx-auto">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class=" text-uppercase mb-4  font-weight-bold text-black"><a href="index.php"> AllocineMET</a></h5>
          <form method="POST" action="connexion.php">
            <input type="submit" name="mode admin" value="mode admin">
          </form>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold"><a href="contact.php">Contact</a></h5>
          <p>AllocineMET</p>
          <p>www.AllocineMET.net</p>
          <p>TEL +33 6 52 50 05 35</p>
          <p>TEL +33 6 87 26 69 70</p>
        </div>
        <!-- Grid column -->

      </div>

      <!-- Grid row -->
      <div class="row d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-7 col-lg-8">

          <!--Copyright-->
          <p class="text-center text-md-left">© 2019 Copyright: AllocineMET

          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-5 col-lg-4 ml-lg-0">

          <!-- Social buttons -->
          <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://www.facebook.com/">
                  <img src="img/facebook.png" title="facebook">
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://twitter.com/">
                  <img src="img/twitter.png" title="twitter">
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://github.com/">
                  <img src="img/github.png" title="github">
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://fr.linkedin.com/">
                  <img src="img/linkedin.png" title="linkedin">
                </a>
              </li>
            </ul>
          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

  </footer>


</body>

</html>
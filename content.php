<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Content</title>

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
  <link rel="stylesheet" href="css/style_pages_cont_real_act.css">
  <link rel="stylesheet" href="css/footer.css">

</head>

<body>
  <header>
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
              <a class="dropdown-item" href="connexion.php">ADMINISTRATION</a>
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

  <?php include ('connectionbdd.php') ?>

<main id="content">

    <!--  pour le titre -->
    <div class="hoofd">
      <?php
        $requete = $bdd->prepare('SELECT * FROM film WHERE id_film ='.$_GET['id']);
        $requete->execute();
        while ($donnees = $requete->fetch())
        {
      ?>
      <h1 class="text-uppercase"><?php echo $donnees['titre_film']; ?></h1>
       <hr>
    </div>

    <!-- pour l'image du film -->

    <div class="media shadow-lg p-3 mb-5 bg-light rounded">
      <img src="img/<?php echo $donnees['image_film']; ?>" width="400px" height="370px" class="mr-3" alt="">
    </div>

    <!-- pour la description du film -->

    <center><h5 class="mb-1"><strong>SYNOPSIS</strong></h5></center>
    <p class="text-center bg-light"><?php echo $donnees['synopsis']; ?></p>
      <?php
      }
      $requete->closeCursor(); // termine le traitement de la requete 
      ?>

    <!-- pour la partie réalisateur, acteur, genre date de sortie et acteur et la bande annonce -->


  <div class="row">
    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
      <div class="col-10 col-sm-10 col-md-10 col-lg-4 col-xl-5">
           <?php
           $reqrealisateur=$bdd->prepare('SELECT nom_realisateur FROM film, realise, realisateur WHERE film.id_film= realise.id_film AND realise.id_realisateur= realisateur.id_realisateur AND film.id_film=realisateur.id_realisateur');
           $reqrealisateur->execute();
           while ($donnees = $reqrealisateur->fetch())
          {
          ?>
         <div class="list-group">
          <a href="realisateur.php" class="list-group-item list-group-item-action">
           <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong>REALISATEUR</strong></h5>
           </div>
             <p class="mb-1"><?php echo $donnees['nom_realisateur']; ?></p>
          </a>
           <?php
           }
           $reqrealisateur->closeCursor(); // termine le traitement de la requete 
           ?>

           <?php
           $reqgenre=$bdd->prepare('SELECT * FROM genre, film, soumettre WHERE film.id_film=soumettre.id_film AND soumettre.id_genre=genre.id_genre AND id_film ='.$_GET['id']);
           $reqgenre->execute();
           while ($donnees=$reqgenre->fetch())
           {
           ?>
          <a href="#" class="list-group-item list-group-item-action">
           <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong>GENRE</strong></h5>
           </div>
            <p class="mb-1"><?php echo $donnees['type']; ?></p>
          </a>
            <?php
            }
            $reqgenre->closeCursor(); // termine le traitement de la requete 
            ?>

            <?php
            $requete = $bdd->prepare('SELECT * FROM film WHERE id_film ='.$_GET['id']);
            $requete->execute();
            while ($donnees = $requete->fetch())
            {
            ?>
          <a href="#" class="list-group-item list-group-item-action">
           <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong>DATE DE SORTIE</strong></h5>
           </div>
            <p class="mb-1"><?php echo $donnees['date_sortie']; ?></p>
          </a>
            <?php
            }
            $requete->closeCursor(); // termine le traitement de la requete 
            ?>

            <?php
            $reqacteur=$bdd->prepare('SELECT nom_acteur FROM film, appartenir, acteur WHERE film.id_film = appartenir.id_film AND appartenir.id_acteur = acteur.id_acteur AND film.id_film = acteur.id_acteur');             
            $reqacteur->execute();
            while ($donnees = $reqacteur->fetch())
            {
            ?>
          <a href="acteur.php" class="list-group-item list-group-item-action">
           <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong>ACTEUR/TRICE</strong></h5>
           </div>
            <p class="mb-1"><?php echo $donnees['nom_acteur']; ?></p>
          </a>
            <?php
            }
            $reqacteur->closeCursor(); // termine le traitement de la requete 
            ?>
      </div>
    </div>
            <?php
            $requete = $bdd->prepare('SELECT * FROM film WHERE id_film ='.$_GET['id']);
            $requete->execute();
            while ($donnees = $requete->fetch())
            {
            ?>
      <div class="col-1 col-sm-3 col-md-3 col-lg-1 col-xl-1"></div>
      <div class="col-8 col-sm-8 col-md-8 col-lg-4 col-xl-4"><?php echo $donnees['bande_annonce']; ?></div>

           <?php
           }
           $requete->closeCursor(); // termine le traitement de la requete 
           ?>

      <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1"></div>
  </div>
</main>


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
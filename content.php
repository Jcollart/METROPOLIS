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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i style="font-size:1em" class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
  </header>
  
  
  <?php include ('connectionbdd.php') ?>
   
    

 
 
 <?php include 'preparequete.php' ?>

 <?php

 $reqallo -> execute(array());
  

 // foreach($requete as $requete)
 // $id_film = $_GET['id_film'];
//}
// Termine le traitement de la requête
  // On récupère tout le contenu de la table film
  // $id_film = $_GET['id_film'];
  //$reponse = $bdd->query('SELECT * FROM film where $id_film = "id_film"');

    // On affiche chaque entrée une à une
  while  ($resultat = $reqallo->fetch())
 {
  ?>
  <main id="content">

    <!--  pour le titre -->

    <div class="hoofd">
      <div id="text_shadow">
        <h1 class="text-uppercase"><?php echo $resultat['titre_film']; ?></h1>
      </div>
        </div>

    <!-- pour l'image du film -->
    <div class="media shadow-lg p-3 mb-5 bg-light rounded">
      <img src="img/<?php echo $resultat['image_film']; ?>" width="400px" height="370px" class="mr-3" alt="">
    </div>

    <!-- pour la description du film -->
    <center><h5 class="mb-1"><strong>Description</strong></h5></center>
    <p class="text-center bg-light"><?php echo $resultat['synopsis']; ?>
    </p>
   

    <!-- pour la partie récap d'infos et la bande annonce -->

    <div class="row">
      <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
      <div class="col-10 col-sm-10 col-md-10 col-lg-4 col-xl-5">

        <div class="list-group">
          <a href="realisateur.php" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><strong>Realisateur</strong></h5>
            </div>
            <p class="mb-1"><?php echo $resultat['nom_realisateur']; ?></p>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><strong>Genre</strong></h5>
            </div>
              <p class="mb-1"><?php echo $resultat['type']; ?></p>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><strong>Date Sortie</strong></h5>
            </div>
              <p class="mb-1"><?php echo $resultat['date_sortie']; ?></p>
          </a>
  
          <a href="acteur.php" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><strong>Acteurs/trice</strong></h5>
            </div>
            <p class="mb-1"><?php echo $resultat['nom_acteur']; ?></p>

          </a>
        </div>
      </div>

      <div class="col-1 col-sm-3 col-md-3 col-lg-1 col-xl-1"></div>
      <div class="col-8 col-sm-8 col-md-8 col-lg-4 col-xl-4">
        <?php echo $resultat['bande_annonce']; ?></div>

      <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1"></div>

    </div>


  </main>
<?php
  }
 
 $requete->closeCursor(); // Termine le traitement de la requête

?>

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
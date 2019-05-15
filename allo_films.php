<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
  <link rel="stylesheet" href="css/allo_films.css">
  <link rel="stylesheet" href="css/animate.css">

</head>

<body>

  <!--//////////////////////////////  NAVBAR  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

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
  <?php include ('connectionbdd.php')?>

 <!--//////////////////////////////  HEADER  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

  <div class="header_films">
    <h1>NOS FILMS</h1>

  </div>

<?php
$reqallo = $bdd->query('SELECT * FROM film');

  ?>

  <!--//////////////////////////////  LISTE GAUCHE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

  <div class="row nopadding" id="liste_films">
    <div class="col-lg-3 col-md-4 col-sm-4">
      <div class="menu_films">
        <ul id="menu-accordeon">
          <input type="search" id="site-search" name="q" aria-label="Search through site content">

          <button>Rechercher</button>

          <li><a href="#" class="collapsible">Choix Films</a>
            <ul>
              <li><a href="#">Action</a></li>
              <li><a href="#">Fantastique</a></li>
              <li><a href="#">Animation</a></li>
              <li><a href="#">Comedie</a></li>
              <li><a href="#">Tous les films</a></li>
            </ul>
          </li>

        </ul>
      </div>

      <!--//////////////////////////////  LISTE GAUCHE POUR SMARTPHONE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

      <div class="menu_films_portable">
        <ul id="menu-accordeon">
          <input type="search" id="site-search" name="q" aria-label="Search through site content">
          <button>Rechercher</button>
          <li><a href="" class="collapsible">Films</a>
            <ul>
              <li><a href="#" class="collapsible">Action</a>

              </li>
              <li><a href="#" class="collapsible">Fantastique</a>
              </li>

              <li><a href="#" class="collapsible">Animation</a>
              </li>

              <li><a href="#" class="collapsible">Comédie</a>
              </li>

              <li><a href="#" class="collapsible">Tous les films</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!--//////////////////////////////  MINIATURES FILMS DROITE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

    <div class="col-lg-9 col-md-8 col-sm-8">
      <div class="liens_films fadeInUp animated">
        <div class="titre">
          <h1><strong>FILMS</strong></h1>
        </div><br />
       <?php

        while ($donnees = $reqallo->fetch())
{
    ?>    
        <a href="content.php?id_film=<?php echo $donnees['id_film']; ?>"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" id="">
          <p></p>
        </a>
        
      </div>
    </div>

 <?php
}
$reqallo->closeCursor(); // termine le traitement de la requete 

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
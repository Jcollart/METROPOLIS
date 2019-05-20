<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>AllocineMet</title>

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

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/animate.css">

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
  <?php include ('connectionbdd.php')?>
  <?php
  $requete = $bdd->prepare('SELECT * FROM film ');
$requete ->execute();
       while ($donnees = $requete->fetch())
{
   ?>    

  <div class="bd-example">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner">
        <div class="carousel-item active">
          <div style="position:absolute; top:360px; left:480px; width:600px; height:480px; z-index:2;font-size:200% ">
            <center>
              <p>NICKY LARSON</p>
            </center>
            <center>
              <p>Un film qui rappelera votre jeunesse</p>
            </center>
          </div>
          <img src="img/<?php echo $donnees['image_film']; ?>" class="d-block w-100" height="960px" alt="...">

        </div>
        <div class="carousel-item ">


          <img src="img/<?php echo $donnees['image_film']; ?>" class="d-block w-100" height="960px" alt="...">

        </div>


        <div class="carousel-item">


          <img src="img/<?php echo $donnees['image_film']; ?>" class="d-block w-100" height="960px" alt="...">


        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="affiche" height="400px">
    <div class="container-titre mx-auto my-5 text-center">
      <h1>ACTUELLEMENT EN VOD</h1>
      <hr size="30px" style="background-color: red;">
    </div>

    <MARQUEE scrollamount="8" onmouseover="this.stop()" onmouseout="this.start()">
      <a href="content.php?ID=1"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=2"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=3"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=4"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=5"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=6"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=7"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=8"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px"
          id="action"></a>
      <a href="content.php?ID=9"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
      <a href="content.php?ID=10"><img class="effect " src="img/<?php echo $donnees['image_film']; ?>" height="200px" width="160px" id="action"></a>
    </MARQUEE>
  </div>
  </a>
        <?php
}

$requete->closeCursor(); // termine le traitement de la requete 

?>
  <div class="parallax"></div>

  <div style="height:700px;background-color:white;font-size:36px">
    <div class="container-titre mx-auto my-5 text-center">
      <h1>LE METROPOLIS</h1>
      <hr style="background-color: red;">
    </div>
    <div class="container-fluid col-12 mx-auto my-5">
      <div class="image float-left col-4">
        <img src="img/met.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="text-center container-fluid mx-auto ">
        <h2 class=" container-fluid mx-auto">Description</h2>
        <p>Le Cinéma METROPOLIS est situé en centre-ville, à 300 mètres de la place Ducale, coeur historique de
          Charleville-Mézières.
          Le parking est gratuit tous les jours de 12h00 à 14h00 et après 18h30 jusqu'au lendemain 9h00.Il est
          gratuit
          le dimanche toute la journée.
        </p>
        <p>10 salles pour une capacité de 2.000 fauteuils, de 500 à 100 places
          <ul>
            <li>Projection numérique </li>
            <li>Son "dolby" digital</li>
            <li>Ecrans "mur à mur"</li>
            <li>Salles et hall d'accueil climatisés</li>
        </p>
        <p></p>
        <div class="parallax"></div>
      </div>
    </div>
  </div>


  <footer id="footer" class="page-footer font-small text-white mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left ">

      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3 mx-auto">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 style="color:red" class=" text-uppercase mb-4 font-weight-bold text-black"><a href="index.php">
              AllocineMET</a></h5>
          <form method="POST" action="connexion.php">
            <input type="submit" name="mode admin" value="mode admin">
          </form>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 style="color:red" class="text-uppercase mb-4 font-weight-bold"><a href="contact.php">Contact</a></h5>
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
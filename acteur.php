<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acteur</title>

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
<!--mon CSS -->
    <link rel="stylesheet" href="css/style_pages_cont_real_act.css">
    <link rel="stylesheet" href="css/footer.css">


</head>

<body>
    <!--//////////////////////////////  NAVBAR  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

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

    <?php include 'connectionbdd.php' ;
    
  
  // On récupère tout le contenu de la table film

  $requete2 = $bdd->query("SELECT * FROM acteur");

    // On affiche chaque entrée une à une
  while ($resultat = $requete2->fetch())
  {
  ?>
  <main id="acteur">

        <!--  pour le titre -->
        <div class="hoofd">
          <h1 class="text-uppercase"><?php echo $resultat['nom_acteur']; ?></h1>
        
      </div>

<!-- pour la partie carte d'identité et sa photo -->

<div class="row">
  <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
  <div class="col-10 col-sm-10 col-md-5 col-lg-5 col-xl-6">

  <div class="list-group CI">
<a href="#" class="list-group-item list-group-item-action">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">Date de Naissance</h5>
  </div>
  <p class="mb-1"><?php echo $resultat['date_naissance']; ?></p>
  
</a>
<a href="#" class="list-group-item list-group-item-action">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">films joués</h5>
  </div>
  <p class="mb-1"><?php echo $resultat['filmographie_acteur']; ?>></p>
  
</a>
<a href="#" class="list-group-item list-group-item-action">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">Description Acteur/trice</h5>
  </div>
  <p class="mb-1"><?php echo $resultat['description_acteur']; ?>></p>
  
</a>
<a href="#" class="list-group-item list-group-item-action">
  <div class="d-flex w-100 justify-content-between">
   <!-- <h5 class="mb-1">Mort</h5> -->
  </div>
  <!--<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
  <small>Donec id elit non mi porta.</small>-->
</a>
</div>
</div>


<div class="col-3 col-sm-3 col-md-1 col-lg-1 col-xl-1"></div>

<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">

  <img src="img/<?php echo $resultat['image_acteur']; ?>" height="400px" width="300px"></img>

</div>
<div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1"></div>

</div>
</div>


<!--  pour la descrition du parcours cinématographique de l'acteur  -->


    <!--<p class="text-center shadow-lg p-3 mb-5 bg-light rounded">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
      esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>-->
    <?php
}

$requete2->closeCursor(); // Termine le traitement de la requête

?>


    

    </main>

    <footer id="footer" class="page-footer font-small text-white mdb-color pt-4 sticky bottom">

        <!-- Footer Links -->
        <div class="container text-center text-md-left ">

          <!-- Footer links -->
          <div class="row text-center text-md-left mt-3 pb-3 mx-auto">

            <!-- Grid column -->
            
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            

            <!-- Grid column -->
            
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h5 class="text-uppercase mb-4 font-weight-bold"><a href="contact.php">Contact</a></h5>
              <p>
                AllocineMET</p>
              <p>
                www.AllocineMET.net</p>
              <p>
                 TEL +33 x xx xx xx xx</p>
              <p>
                 TEL +33 x xx xx xx xx</p>
            </div>
            <!-- Grid column -->

          </div>
          <!-- Footer links -->

          <hr class="hr-footer">

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

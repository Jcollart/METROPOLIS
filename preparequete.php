<?php

$requete = $bdd->prepare('SELECT * FROM film WHERE Id_film =.$_GET["Id_film"]');

$reqajout = $bdd->prepare('INSERT INTO film, titre, realisateur, acteur, Datesortie, image, synopsis, bo
VALUES ("$Id", "$titre", "$realisateur", "$acteur", "$Datesortie", "$image", "$synopsis", "$bo")') ;

$reqmodif = $bdd->prepare('UPDATE `film` SET `id`=[value-1],`titre`=[value-2],`realisateur`=[value-3],`acteur`=[value-4],`Date`=[value-5],`image`=[value-6],`synopsis`=[value-7],`bo`=[value-8]
                          WHERE 1') ;

$reqsup = $bdd->prepare('DELETE FROM `film` WHERE 1') ;

$reqallo = $bdd->prepare("SELECT * FROM film, genre, acteur, realisateur, appartenir, realiser, soumettre WHERE genre.id_genre = film.id_film AND acteur.id_acteur = film.id_film AND realisateur.id_realisateur=film.id_film");


?>
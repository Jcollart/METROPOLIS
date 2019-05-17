<?php


$requete = $bdd->prepare('SELECT * FROM film WHERE id_film ='.$_GET['id']);

$reqrealisateur=$bdd->prepare('SELECT nom_realisateur FROM film, realise, realisateur WHERE film.id_film= realise.id_film AND realise.id_realisateur= realisateur.id_realisateur AND film.id_film=realisateur.id_realisateur');

$reqgenre=$bdd->prepare('SELECT * FROM genre, film, soumettre WHERE film.id_film=soumettre.id_film AND soumettre.id_genre=genre.id_genre AND film.id_film=genre.id_genre AND id_film ='.$_GET['id']);

$reqacteur=$bdd->prepare('SELECT nom_acteur FROM film, appartenir, acteur WHERE film.id_film = appartenir.id_film AND appartenir.id_acteur = acteur.id_acteur AND film.id_film = acteur.id_acteur AND id_film ='.$_GET['id']);

$reqajout = $bdd->prepare('INSERT INTO film, titre, realisateur, acteur, Datesortie, image, synopsis, bo
VALUES ("$Id", "$titre", "$realisateur", "$acteur", "$Datesortie", "$image", "$synopsis", "$bo")') ;

$reqmodif = $bdd->prepare('UPDATE `film` SET `id`=[value-1],`titre`=[value-2],`realisateur`=[value-3],`acteur`=[value-4],`Date`=[value-5],`image`=[value-6],`synopsis`=[value-7],`bo`=[value-8]
                          WHERE 1') ;

$reqsup = $bdd->prepare('DELETE id_film FROM `film` WHERE 1') ;

?>
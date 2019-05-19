<?php



$reqajout = $bdd->prepare('INSERT INTO film, titre, realisateur, acteur, Datesortie, image, synopsis, bo
VALUES ("$id", "$titre", "$realisateur", "$acteur", "$Datesortie", "$image", "$synopsis", "$bo")') ;

$reqmodif = $bdd->prepare('UPDATE film, realisateur, acteur,  SET `id`=[value-1],`titre`=[value-2],`realisateur`=[value-3],`acteur`=[value-4],`Date`=[value-5],`image`=[value-6],`synopsis`=[value-7],`bo`=[value-8]
                          WHERE 1') ;

$reqsup = $bdd->prepare("DELETE id_film FROM `film` WHERE 1") ;

?>
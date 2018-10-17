<?php
$_FILES['icone']['name']     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['icone']['type']     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['icone']['size']     //La taille du fichier en octets.
$_FILES['icone']['tmp_name'] //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['icone']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
  if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
?>

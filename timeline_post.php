<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
if(isset($_POST['timeline']) AND !empty($_POST['timeline']) AND isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name']))
{
  var_dump($_FILES);
  var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));


   $reqmessage = $bdd->prepare('INSERT INTO timeline(post_timeline, pseudo_timeline, categorie) VALUES (?, ?, ?)');
   $reqmessage->execute(array($_POST['timeline'], $_POST['pseudo_timeline'], $_POST['catégorie']));
   $lastid = $bdd->lastInsertId();

if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
   if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2)
    {
      $chemin = 'miniatures/'.$lastid.'.jpg';
      move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
    }
    else
    {
    echo 'Votre image doit être au format JPG';
    }
  }
header('location: timeline.php');
}
else
{
  $no_post = "Veuiller remplir le champ";
header('location: add_post.php');
}
?>

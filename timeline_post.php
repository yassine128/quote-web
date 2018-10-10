<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
if(isset($_POST['timeline']) AND !empty($_POST['timeline']))
{
$reqmessage = $bdd->prepare('INSERT INTO timeline(post_timeline, pseudo_timeline, date_post) VALUES (?, ?, NOW())');
$reqmessage->execute(array($_POST['timeline'], $_POST['pseudo_timeline']));
header('location: timeline.php');
}
else
{
  $no_post = "Veuiller remplir le champ";
  header('location: timeline.php');
}
?>

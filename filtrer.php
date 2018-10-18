<?php
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
    $reqmessage = $bdd->query('SELECT  id_post, post_timeline, pseudo_timeline, categorie FROM timeline ORDER BY id_post DESC');     
?>

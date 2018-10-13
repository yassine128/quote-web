<?php
  session_start();
 ?>

<html>
   <head>
      <title>Timeline</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <?php include('navbar.php'); ?>
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
         $reqmessage = $bdd->query('SELECT post_timeline, pseudo_timeline FROM timeline ORDER BY id_post DESC');
         while($post_message = $reqmessage->fetch())
         {
         ?>
         <div align="center">
           <br />
            <div class="citationpost">
              <?php echo  '"' . htmlspecialchars($post_message['post_timeline']) . '"' ?>
            </div>
            <div class="citationname">
              <?php echo '-' . htmlspecialchars($post_message['pseudo_timeline']) ?>
            </div><br /> <br /> <br />
         <?php
         }
      ?>
      <?php
      if(isset($no_post)) {
         echo '<font color="red">'.$no_post."</font>";
      }
      ?>
   </body>
</html>

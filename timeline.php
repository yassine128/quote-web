<?php
  session_start();
 ?>

<html>
   <head>
      <title>Timeline</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style1.css">
   </head>
   <body>
     <?php include('navbar.php'); ?>
     <br /> <br />
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
         $reqmessage = $bdd->query('SELECT post_timeline, pseudo_timeline, id_post FROM timeline ORDER BY id_post DESC');
         while($post_message = $reqmessage->fetch())
         {
         ?>
         <div align="center">
         <div class="polaroid">
           <img src="miniatures/<?= $post_message['id_post']?>.jpg" alt="Nothern-light" style="width: 100%;">
           <div class="container">
           <br />
            <div class="citationpost">
              <?php echo  '"' . htmlspecialchars($post_message['post_timeline']) . '"' ?>
            </div>
            <div class="citationname">
              <?php echo '-' . htmlspecialchars($post_message['pseudo_timeline']) ?>
            </div><br /> <br /> <br />
            </div>
            </div>
            </div>
         <?php
         }
      ?>
      <?php
      if(isset($no_post)) {
         echo '<font color="red">'.$no_post."</font>";
      }
      ?>
    </br></br></br>
      <div align="center"><h2>Il n'y a plus rien <img src="https://images.emojiterra.com/twitter/v11/512px/1f62d.png" width="30px";></h2></div>
   </body>
</html>

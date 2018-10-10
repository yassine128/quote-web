<?php
  session_start();
 ?>

<html>
   <head>
      <title>Timeline</title>
      <meta charset="utf-8">
   </head>
   <body>
     <?php include('navbar.php'); ?>
      <div align="center">
         <h2>Timeline</h2>
         <form action="retour_profile.php" method="post">
           <input type="submit" value="<?php echo $_SESSION['pseudo']; ?>"/>
         </form>
         <div align="left">
         <form method="post" action="timeline_post.php">
           <div align="center">
           <label>Postez vos message!</label><br />
           <input type="hidden" name="pseudo_timeline" value="
           <?php if (isset($_COOKIE['pseudo_timeline']))
             {
               echo $_COOKIE['pseudo_timeline'];
             }else
            {
              echo ' pseudo';
            } ?>" readonly="readonly"/><br />
           <textarea rows="7" cols="55" name="timeline" placeholder="Hey <?php echo $_COOKIE['pseudo_timeline'];?> what's in your mind?"></textarea>
           <br /><br />
           <input type="submit" value="Publiez"/>
         </form>
       </div>
     </div>
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
         $reqmessage = $bdd->query('SELECT post_timeline, pseudo_timeline FROM timeline ORDER BY id_post DESC');
         while($post_message = $reqmessage->fetch())
         {
         echo '<p>' . htmlspecialchars($post_message['pseudo_timeline']) . ' : ' . htmlspecialchars($post_message['post_timeline']) . '</p>';
         }
      ?>
      <?php
      if(isset($no_post)) {
         echo '<font color="red">'.$no_post."</font>";
      }
      ?>
   </body>
</html>

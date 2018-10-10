

<html>
   <head>
      <title>Timeline</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <div align="left">
         <form method="post" action="timeline_post.php">
           <div align="center">
           <label>Pseudo :</label><input type="text" name="pseudo_timeline" value="
           <?php if (isset($_COOKIE['pseudo_timeline']))
             {
               echo $_COOKIE['pseudo_timeline'];
             }else
            {
              echo ' pseudo';
            } ?>" readonly="readonly"/><br />
           <label>Message :</label>
           <textarea rows="7" cols="30" name="timeline">
           </textarea>
           <br /><br />
           <input type="submit" value="Poster !"/>
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
   </body>
</html>

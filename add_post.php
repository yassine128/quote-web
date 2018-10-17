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
      <div align="center">
         <div align="left">
         <form method="post" action="timeline_post.php" enctype="multipart/form-data">
           <div align="center">
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
           <input type="file" name="miniature" />
           <div class="form-field"><button type="submit" name="formconnexion">Publier</button></div>
          </form>
       </div>
     </div>
   </body>
</html>

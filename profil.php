<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Profil de <?php echo $userinfo['pseudo']; ?></title>
      <meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="style3.css">
   </head>
   <body>
     <?php include('s_navbar.php'); ?>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <?php
         if(!empty($userinfo['avatar']))
         {
         ?>
         <div><img src="membres/avatars/<?php echo $userinfo['avatar'];?>" class="avatar"></div>
         <?php
         }
         else
         {
         ?>
         <div><img src="membres/avatars/default.png" class="avatar"></div>
         <?php
         }
         ?>
         </br>
        <div class="Mail"> Mail = <?php echo $userinfo['mail']; ?> </div>
         <br />
         Biographie:<?php echo $userinfo['biographie'] ?><br />
         <a href="add_post.php" class="addpost">+</a>
   </body>
</html>
<?php
}
?>

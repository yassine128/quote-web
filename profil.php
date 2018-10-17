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
      <title>Profi de <?php echo $userinfo['pseudo']; ?></title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style1.css">
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
         <img src="membres/avatars/<?php echo $userinfo['avatar'];?>" style="width: 200px; border-radius: 50%;">
         <?php
         }
         ?>
         </br>
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         Biographie: <br /> <?php echo $userinfo['biographie'] ?><br />
         <a href="add_post.php" class="addpost">+</a>
   </body>
</html>
<?php
}
?>

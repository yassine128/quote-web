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
   </head>
   <body>
     <?php include('navbar.php'); ?>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         Biographie: <br /> <?php echo $userinfo['biographie'] ?>


   </body>
</html>
<?php
}
?>

<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');

if(isset($_POST['formconnexion']))
{
  setcookie('pseudo_timeline', $_POST['pseudoconnect'], time() + 365*24*3600, null, null, false, true);
  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);

  if(!empty($mailconnect) AND !empty($mdpconnect) AND !empty($pseudoconnect))
  {
    $requser = $bdd->prepare("SELECT * FROM membre WHERE mail = ? AND motdepasse = ? AND pseudo = ?");
    $requser->execute(array($mailconnect, $mdpconnect, $pseudoconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['mail'] = $userinfo['mail'];
      header("location: profil.php?id=". $_SESSION['id']);
    }
    else
    {
      $erreur = "Mauvais email,  mot de passe ou mauvais identifiant  ";
    }
  }
  else
  {
    $erreur = "Tous les champs doivent être complétés !";
  }
}
?>
<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style2.css">
   </head>
   <body>
      <div align="center"><?php include('navbar_acceuil.php') ?>
        <div class="conn">
         <h2>Connexion</h2>
         <form method="POST" action="">
            <td align="right">
            <div class="form-field"><input type="email" name="mailconnect" placeholder="Mail"/></div>
            <div class="form-field"><input type="text" name="pseudoconnect" placeholder="pseudo"/></div>
            <div class="form-field"><input type="password" name="mdpconnect" placeholder="mot de passe"/></div>
            <div class="form-field"><button type="submit" name="formconnexion"> Log in</button></div>
            <div class="form-field"></div>
            <br/>
         </form>
       </div>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
         <div class="citation">
           <h1><table><tr>"Let us sacrifice our <br/> today  so that our <br/>children can have a <br/> better tomorrow"</tr></table></h1>
         </div>
      </div>
   </body>
</html>

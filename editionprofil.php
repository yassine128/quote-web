<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
if(isset($_SESSION['id']))
{
  $requser = $bdd->prepare('SELECT * From membre WHERE id = ?');
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();
  if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
  {
    $newpseudo = htmlspecialchars($_POST['newpseudo']);
    $insertpseudo = $bdd->prepare('UPDATE membre SET pseudo = ? WHERE id = ?');
    $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
    header('location: deco_connexion.php');
  }
  if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
  {
    $newmail = htmlspecialchars($_POST['newmail']);
    $insertmail = $bdd->prepare('UPDATE membre SET mail = ? WHERE id = ?');
    $insertmail->execute(array($newmail, $_SESSION['id']));
    header('location: deco_connexion.php');
  }
  if(isset($_POST['biographie']) AND !empty($_POST['biographie']))
  {
    $newbio = htmlspecialchars($_POST['biographie']);
    $insertbio = $bdd->prepare('UPDATE membre SET biographie = ? WHERE id = ?');
    $insertbio->execute(array($newbio, $_SESSION['id']));
    header('location: deco_connexion.php');
  }
  if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
  {
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);
    if($mdp1 == $mdp2)
    {
      $insertmdp = $bdd->prepare('UPDATE membre SET motdepasse = ? WHERE id = ?');
      $insertmdp->execute(array($mdp1, $_SESSION['id']));
     header('location: deco_connexion.php');
    }
    else
    {
      $msg = "Vos deux mot de passes ne correspondent pas !";
    }
  }
  if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
     $tailleMax = 2097152;
     $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
     if($_FILES['avatar']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides)) {
           $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
           $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
           if($resultat) {
              $updateavatar = $bdd->prepare('UPDATE membre SET avatar = :avatar WHERE id = :id');
              $updateavatar->execute(array(
                 'avatar' => $_SESSION['id'].".".$extensionUpload,
                 'id' => $_SESSION['id']
                 ));
              header('Location: profil.php?id='.$_SESSION['id']);
           } else {
              $msg = "Erreur durant l'importation de votre photo de profil";
           }
        } else {
           $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
     } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
     }
  }
if(isset($_FILES['banniere']) AND !empty($_FILES['banniere']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['banniere']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['banniere']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "membres/bannieres/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['banniere']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE membre SET banniere = :banniere WHERE id = :id');
            $updateavatar->execute(array(
               'banniere' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
}
  if(isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo'])
  {
    header('location: profil.php?id='.$_SESSION['id']);
  }
?>
<html>
   <head>
      <title>Profi de <?php echo $userinfo['pseudo']; ?></title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style3.css">
   </head>
   <body>
     <?php include('navbar.php'); ?>
      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="center">
         <form method="post" action="" enctype="multipart/form-data">
           <div class="form-field"><input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"/><br /><br /></div>
           <div class="form-field"><input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>"/><br /><br /></div>
           <div class="form-field"><input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br /></div>
           <div class="form-field"><input type="password" name="newmdp2" placeholder="Confirmation du Mdp"/><br /><br /></div>
           <br /><textarea rows="7" cols="40" name="biographie"> 150 mots maximum !</textarea><br /> <br />
           <div class="form-field"><input type="file" name="avatar" /><br /><br /></div>
           <div class="form-field"><input type="file" name="banniere" /><br /><br /></div>
           <div class="form-field"><button type="submit"/>Enregister</div>
         </form>
         <?php
         if(isset($msg))
         {
           echo $msg;
         }
          ?>
       </div>
      </div>
   </body>
</html>
<?php
}
else
{
  header('location: editionprofil.php');
}
?>

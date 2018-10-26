
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%
}
.topnav {
  overflow: hidden;
  background-color: #2a2929;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 13px 10px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  color: #b4a007;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}
.avatarprofil{
position: absolute;
top: 1px;
left: 200px;
font-size: 18px;
}
.logout{
  position: absolute;
  height: 50px;
  top: 8px;
  right: 100px;
  font-size: 18px;
}
.parametre{
  position: absolute;
  height: 50px;
  top: 8px;
  right: 200px;
  font-size: 18px;
}
.nom{
  position: absolute;
  top: 13px;
  left: 230px;
  font-size: 18px;
}
.scroll{
  position: relative;
  top: -19px;
  left: 750px;
  font-size: 18px;
}

.dropdown {
  position: absolute;
  top: 10px;
  left: 1070px;
  font-size: 18px;
}

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
  }

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: ;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
</style>
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="timeline_retour.php"/><li><img src="https://images.vexels.com/media/users/3/137401/isolated/preview/00300d00be87848b87d820f2664bc7eb-quora-icon-logo-by-vexels.png"  width="40px" height="40px"/></a></li>
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
  $requser->execute(array($getid));
  $userinfoa = $requser->fetch();
  ?>
  <div class="scroll">
     <div class="avatarprofil">
    <?php
           if(!empty($userinfoa['avatar']))
           {
           ?>
           <a href="retour_profile.php"><img src="membres/avatars/<?php echo $userinfoa['avatar'];?>" style="width: 40px; border-radius: 50%;">
           <?php
           }
           ?>
    </div><div class="nom"> <a href="retour_profile.php"><?php echo $_SESSION['pseudo']; ?></a> </div></div>
    <div class="dropdown">
      <button class="dropbtn">
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="editionprofil.php">Paramètre</a>
        <a href="deconnexion.php">Log out</a>
      </div>
    </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script>
window.onscroll = function() {myFunction()};
var header = document.getElementById("myTopnav");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
</body>
</html>

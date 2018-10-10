<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin: 0;}
/* Style the search box inside the navigation bar */
.topnav input[type=text] {
    float: middle;
    padding: 6px;
    border: none;
    margin-top: 8px;
    margin-right: 16px;
    font-size: 17px;
}
ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px){
    ul.topnav li.right,
    ul.topnav li {float: none;}
}
</style>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="timeline.php">Home</a></li>
  <li><a href="editionprofil.php">parametre</a></li>
  <li><a href="retour_profile.php"><?php echo $_SESSION['pseudo']; ?></a></li>
  <li><?php include('searchbar.php'); ?></li>
  <li class="right"><a href="deconnexion.php">Log out</a></li>
</ul>


</body>
</html>

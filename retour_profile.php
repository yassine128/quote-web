<?php
session_start();
header("location: profil.php?id=". $_SESSION['id']);
?>

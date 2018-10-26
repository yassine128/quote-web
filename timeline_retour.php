<?php
session_start();
header("location: timeline.php?id=". $_SESSION['id']);
?>

<?php
session_start();
setcookie("logged", $username, time() - 3600, "/"); // cr
session_destroy();
header('Location: index.php');
exit();
?>

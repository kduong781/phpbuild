<?php
session_start();
setcookie("logged", $username, time() - 3600, "/"); // delete cookie and sessions
session_destroy();
header('Location: index.php'); // go back to login page
exit();
?>

<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  include "include/databaseInfo.php";
  include "data.class.php";

  $database = new Database();
  $url = $_GET["myurl"]; // Gets URL from navbar input
  $token = strtok($url, ","); // tokenizes the url string (uses comma as delimeter)

  while ($token !== false) { 
     $database->query('INSERT INTO Url (url) VALUES (:url)');
     $database->bind(':url', $token);
     $database->execute();
     $token = strtok(",");
  }
  header('Location: filter.php');
} else {
  header('Location: filter.php');
}

?>

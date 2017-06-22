<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  define("DB_HOST", "test.cmxsmmcmpe9w.us-east-1.rds.amazonaws.com");
  define("DB_USER", "admin");
  define("DB_PASS", "mypassword");
  define("DB_PORT", "3306");
  define("DB_NAME", "test");

  include "data.php";

  $database = new Database();
  $url = $_GET["myurl"];
  $database->query('DELETE FROM Url VALUES id=:id');
  $database->bind(':id', $url);
  $database->execute();
  header('Location: filter.php');
} else {
  header('Location: filter.php');
}

?>

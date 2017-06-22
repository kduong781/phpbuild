<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  include "include/databaseInfo.php";

  include "data.class.php";

  $database = new Database();
//  $id = $_GET["id"];
  $id = $_POST["id"];
  $database->query('DELETE FROM Url WHERE idUrl=:id');
  $database->bind(':id', $id);
  $database->execute();
  header('Location: filter.php');
} else {
  //header('Location: filter.php');
}

?>

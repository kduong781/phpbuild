<?php
session_start(); // starts session
$username = $_POST["myuser"]; // retrieves username from login form
$password = $_POST["mypass"]; // retrives pass from login form
$session = "false";
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  $session = "true";
}
if($username != "admin" && $password != "admin" && $session != "true") { //if username && pass does not match go back to login form
  header("Location: index.php");
  exit;
} else { // else continue to filter page
  if($session != "true") {
    $_SESSION['username'] = $username; //stores session info so you dont have to relog
    $_SESSION['mypass'] = $password;
    setcookie("logged", $username, time() + (86400 * 30), "/");
  }
    $loggedIn = "true";

    /* Database Info*/
    include "include/databaseInfo.php";
    include "data.class.php";

    $database = new Database();

    /*Query to get retrive URL list from database*/
    $database->query('SELECT * FROM Url');
    $urlList = $database->resultset();

?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Filter Page</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
  <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>

  <?php
    include 'include/navbar.php';
    ?>

  <div

  <div id="container">
    <h1 class="center">Blocked List</h1>

    <div id="heading" class="row">
        <button type="button" class="btn btn-success left" data-toggle="modal" data-target="#filterForm">Add</button>
        <span class="heading">Filters</span>
        <button id="edit" type="button" class="btn btn-warning right">Edit</button>
    </div>
    <div id="filterList" class="filterList">
      <?php /*Outputs Urls from result set*/
      foreach($urlList as $url) { ?>

        <div class="item">
          <form action="delete.php" method="post">
            <span class="itemDesc"><?php echo $url['url']?></span>
            <input type="hidden" name="id" value="<?php echo $url['idUrl']?>">
            <button type="submit" class="btn-xs btn-danger right remove">Remove</button>
          </form>
          </div>
        <?php      }      ?>

    </div>
</div>



<!-- Modal -->
<div id="filterForm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a Filter</h4>
      </div>
      <form action="insert.php" action="post">
        <div class="modal-body">
          <div class="form-group">
              <label for="filterDesc">URL (Seperate with comma for multiple URL)</label>
              <input type="text" class="form-control" id="filterDesc" name="myurl" placeholder="Enter a URL">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal for opening URL -->
  <div id="urlFrame" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">IFRAME</h4>
        </div>
        <iframe src="">
          Your browser does not support iframes.
        </iframe>
      </div>

    </div>
  </div>
</div>



<?php  include 'include/footer.php'; }?>

  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
</body>
</html>

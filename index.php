<?php
  session_start();

  if($_SESSION['username'] || isset($_COOKIE["logged"])) { // if you were logged in go to filter page
    header("Location: filter.php");
    exit;
  } else {
?>

<!doctype html>
<html>
<head>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
  <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php include 'include/navbar.php';?>

<!-- Form-->
  <div class="container">
    <form class="form-horizontal" action="filter.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Username:</label>
        <div class="col-sm-10">
          <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" name="mypass" class="form-control" id="pwd" placeholder="Enter password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>




  <!-- Footer -->
  <?php  include 'include/footer.php'; ?>


  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

        <?php } ?>


    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php
              if(isset($loggedIn)) {
              ?>
                <li>
                  <form class="navbar-form navbar-right">
                    <div class="input-group">
                      <input id="currentUrl" type="text" class="form-control" placeholder="Enter a URL..">
                      <span class="input-group-btn">
                          <button id="openUrl" class="btn btn-success" type="button" data-toggle="modal" data-target="#urlFrame">Go</button>
                      </span>
                    </div>
                  </form>
                </li>
              <?php
                echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
              } else {
                echo '<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
              }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

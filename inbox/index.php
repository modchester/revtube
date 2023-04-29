<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../assets/mod/meta.php';?>
    <?php include '../assets/mod/db.php';?>
    </head>
    <?php include '../assets/mod/inboxguide.php';?>
  <body>
<?php include '../assets/mod/inboxheader.php';?>
<!-- guide -->
    <div class="container">
 <div class="content">
        <div class="page-header">
          <?php
      if(empty($_GET["msg"])) {
        echo "<p style='display:none;'>no</p>";
      } else if($_GET["msg"] === " ") {
        echo "<p style='display:none;'>no</p>";
      } else { echo '
          <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
      </div>';
    }
          ?>
            <?php include '../assets/mod/inboxalert.php'?>
          <h1>Inbox <small><div id="clockbox"></div></small></h1>
          <?php include '../assets/mod/todaysdate.php'; ?>
        </div>
        
        <div class="row">
        <?php //include './assets/mod/guide.php';?>
          <div class="span10">
            <h2>Latest Mail</h2>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY date DESC");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <table class="condensed-table">
                        <thead>
                          <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>redst0ne</td>
                            <td>Sup brother</td>
                            <td>RESPOND TO MY MESSAGES!!!</td>
                            <td><a href="#">View</a></td>
                          </tr>
                          <tr>
                            <td>redst0ne</td>
                            <td>Hi!!!!!</td>
                            <td>hello sir</td>
                            <td><a href="#">View</a></td>
                          </tr>
                          <tr>
                            <td>redst0ne</td>
                            <td>kys</td>
                            <td>kys NOW!</td>
                            <td><a href="#">View</a></td>
                          </tr>
                        </tbody>
                      </table>';
                    }
                }
                else{
                    echo "You have no mail.";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
            <?php include '../assets/mod/inboxwhatsnew.php'; ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    <?php include '../assets/mod/footer.php'; ?>
  </body>
</html>
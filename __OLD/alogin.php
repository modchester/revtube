<script>window.location.href = "login";</script>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>
</head>

  <body>
<?php require_once './assets/mod/db_init.php';?>
    <?php require_once("./assets/mod/header.php");?>
    <div class="container-flex"> 
                            <?php
                                if(!empty($_POST)){
                                    $username = htmlspecialchars($_POST['name']);
                                    $statement = $mysqli->prepare("SELECT `password`, `strikes` FROM `users` WHERE `username` = ? LIMIT 1");
                                    $statement->bind_param("s", $username);
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    if($result->num_rows !== 0){
                                    while($row = $result->fetch_assoc()){
                                            $hash = $row['password'];
                                            if(password_verify($_POST['password'], $hash)){
                                                if ($row['strikes'] > 3) {
                                                    echo('<script>
                                         window.location.href = "/?err=Your account has been terminated due to too many violations of the <a href=guidelines>Community Guidelines</a>.";
                                         </script>');
                                         die();
                                                }
                                                session_start();
                                                $_SESSION["profileuser3"] = htmlspecialchars($_POST['name']);
                                                echo('<script>
                                                   window.location.href = "/";</script>');
                                             //   echo("<a href='.'>Click here to go home</a>");
                                            }
                                            else {
                                                echo '
                                                <div class="alert-message error loginerror page-alert">
                                                  <p>Username and password combo do not match our records.</p>
                                                </div>';
                                            }
                                        }
                                    }
                                    else{
                                        echo '
                                        <div class="alert-message error loginerror page-alert">
                                        <p>Username and password combo do not match our records.</p>
                                      </div>';
                                    }
                                }
                            ?>
        <div class="col-1-2">
            <br>
            <br>
            <br>
            <br>
            <!-- fun fact: the design of this login page hasn't changed since december 29, 2021 -->
            <center><h3>User Login</h3>
            <br>
            <div class="card blue">
                <form method="post" action="/login">
                    <div class="input-group">
                      <!--  <label for="username">Username: </label>-->
                        <input type="text" name="name" pattern="[^()/><\][\\\x22,;|]+" placeholder="Channel Name" required>
                    </div>
                    <br>
              <!--      <div class="input-group">
                   <!-    <label class="labelcenter" for="email">Email: </label>->
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <br> -->
                    <div class="input-group">
                        <!--<label for="password">Password: </label>-->
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <div></div>
                        <br>
                        <div><button type="submit" class="yt-button" name="reg_user" class="button">Login to Channel</button></div>
                    </div>
                    <br>
                    <a class="yt-button danger" onclick="alert('Contact the team with proof that you own the channel.')">Forgot your password?</a></center>
                    <div class="input-group">
                        <div></div>
                        <div class="red">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="col-1-2">
            <h2>Welcome to SkyTube!</h2>
        </div>-->
    </div>
    <hr>
    <?php require_once("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>
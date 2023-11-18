<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include("assets/mod/db.php"); ?>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>

</style>
</head>
<body>
<?php
                                if(!empty($_POST)){
                                    $username = htmlspecialchars($_POST['name']);
                                    $statement = $mysqli->prepare("SELECT `password` FROM `users` WHERE `username` = ? LIMIT 1");
                                    $statement->bind_param("s", $username);
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    if($result->num_rows !== 0){
                                    while($row = $result->fetch_assoc()){
                                            $hash = $row['password'];
                                            if(password_verify($_POST['password'], $hash)){
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
        <div class="box">
                <h2>Sign in</h2>
                <p>Use your Revid Account</p>
                <form action="" method="POST">
                  <div class="inputBox">
                    <input type="text" name="name" required onkeyup="this.setAttribute('value', this.value);"  value="">
                    <label>Username</label>
                  </div>
                  <div class="inputBox">
                        <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
                        <label>Password</label>
                      </div>
                  <input type="submit" name="submit" value="Sign In">
                </form>
              </div>
</body>
</html>
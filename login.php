<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include("assets/mod/branding.php"); ?>
    <?php include("assets/mod/db.php"); ?>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link href="https://s.imon.fr/css3-youtube-buttons/yt-buttons.css" rel="stylesheet">
  <link href="/assets/css/2013.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>

</style>
</head>
<body class="<?php echo htmlspecialchars($site['siteTheme']); ?>">
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
                                                echo('<div class="alert-message error loginerror page-alert">
                                     <p>Your account has been terminated due to too many violations of the <a style="color:white;"href=guidelines>Community Guidelines</a>.</p>
                                     </div>');
                                            } else {
                                                $_SESSION["profileuser3"] = htmlspecialchars($_POST['name']);
                                                echo('<script>
                                                   window.location.href = "/";</script>');
                                             //   echo("<a href='.'>Click here to go home</a>");
                                            }
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
                <div class="divimg"><img height="76px" style="filter:invert(1);" src="assets/img/logo.png"></div>
                <p>Use your <?php echo $site['name']; ?> Account</p>
                <form action="" method="POST">
                  <div class="inputBox">
                    <input type="text" name="name" required onkeyup="this.setAttribute('value', this.value);"  value="">
                    <label>Username</label>
                  </div>
                  <div class="inputBox">
                        <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
                        <label>Password</label>
                      </div>
                      <center>
                  <input class="yt-button primary" type="submit" name="submit" value="Login"> <a href="passwordresets" class="yt-button danger" onclick="//alert('Contact the team with proof that you own the channel.')">Forgot your password?</a>
                             <br><br>
                              <a href="/aregister" class="link">Don't have a account?</a>
                </center>
                </form>
              </div>
              <p class="footer">&copy <?php echo date("Y"); echo " ".$site['name']; ?></p>
</body>
</html>
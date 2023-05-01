<?php include("./assets/mod/webhook.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php
    if (isset($_POST['submit'])){
        if(!isset($_SESSION['profileuser3'])) {
            die("Login to report....");
        }} ?>
    <?php include("./assets/mod/header.php");?>
    <div class="container-flex"> 
    <?php
$proname = @$_POST["reason"];
$link = @$_POST["sitelink"];
$user = @$_POST["username"];

if(isset($_POST["submit"])){

    $dw = new DiscordWebhook($webhook);
    $username = $_SESSION['profileuser3'];

    $dw->newMessage()
    ->setContent("**".$username."** just submitted a report:")
    ->setTitle("New Report")
    ->setColor("#3238a8")
    ->addFields(
        ["Reason:", $proname, true],
        ["Offending video:", $link, true],
        ["User:", $user, true]
    )
    ->setTimestamp()
    ->setUsername($username)
    ->send(); 
    echo('<script>
              window.location.href = "index?err=Your report has been submitted successfully!";
              </script>');
}
?>
        <div class="col-1-2">
            <br>
            <br>
            <br>
            <br>
            <center><h3>Report a video</h3>
            <br>
            <?php 
            if (isset($_GET['v'])) {
                $video = $_GET['v'];
                $disabled = 'disabled';
            }
            if (isset($_GET['offender'])) {
                $offender = $_GET['offender'];
                $disableda = 'disabled';
            }
            ?>
            <div class="card blue">
                <form method="post" action="">
                    <div class="input-group">
                    <input type="text" name="reason" placeholder="Reason" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="text" name="sitelink" value="<?php echo $video;?>" placeholder="Offending Video" required <?php echo $disabled;?>>
                    </div>
                    <br>
                    <div class="input-group">
                    <input type="text" name="username" value="<?php echo $offender;?>" placeholder="Uploader" required <?php echo $disableda;?>>
                    </div>
                    <br>                   
                    <div class="input-group">
                    <input class="yt-button" type="submit" name="submit" value="Submit Report">
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="col-1-2">
            <h2>Welcome to SkyTube!</h2>
        </div>-->
    </div>
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>
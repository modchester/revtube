<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>
<style>
    .content .span9, .content .span5 {
    min-height: 500px;
}
</style>
  <body>
<?php include './assets/mod/db.php';?>
    <?php include("./assets/mod/header.php"); ?>
<div class="container">
<div class="content">
<div class="page-header">
            <?php include './assets/mod/msg.php'; ?>
            <?php include './assets/mod/alert.php'?>
          <h1>Edit your video <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <?php
                                    $statement = $mysqli->prepare("SELECT * FROM `videos` WHERE `vid` = ? LIMIT 1");
                                    $statement->bind_param("s", $_GET['v']);
                                    $statement->execute();
                                    $result = $statement->get_result();
                                    while($row = $result->fetch_assoc()) {
                                        $idk = strtotime($row['date']);
                                        $upload = date("F d, Y", $idk);
                                        $title = $row['videotitle'];
                                        $desc = $row['description'];
                                    if ($_SESSION['profileuser3'] !== $row['author']) {
                                        echo('<script>window.location.href = "/?err=This is not your video!";</script>');
                                    }
                                }
                                ?>
                            <!-- <br>
            <br>
            <br>
            <br> -->
            <?php
            if(!isset($_SESSION['profileuser3'])) {
              echo('<script>
              window.location.href = "/alogin";
              </script>');
          }
          ?>
          <div class="row">
          <div class="span9">
                <form class="form-stacked" action="" method="post" enctype="multipart/form-data">
                     <br>
                    <div class="input-group">
                       <label for="videotitle">Title </label>
                        <input value="<?php echo $title;?>" class="yt-search-input" type="text" id="videotitle" placeholder="Title" name="videotitle">
                    </div>
                     <br>
                    <div class="input-group">
                  <label for="bio">Description </label> 
                        <textarea class="yt-search-input" style="background-color: var(--inputlol);" name="bio" placeholder="Enter a description for your video here" rows="4" cols="50" required="required"><?php echo $desc;?></textarea>
                    </div>
                    <div class="input-group">
                         <br>
                        <div></div>
                        <div><input type="submit" class="yt-button primary" value="Save" name="submit"></div>
                    </div>
                </form>
                <?php
				if (isset($_POST["submit"])){
					if(!empty($_POST['bio'])){
						$statement = $mysqli->prepare("UPDATE `videos` SET `description` = ? WHERE `vid` = '" . $_GET["v"] . "'");
					    $statement->bind_param("s", $description);
					    $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
					    $statement->execute();
						$webhookurl = $webhook;
						$ndesc = htmlspecialchars($_POST['bio']);
					    $statement->close();
					}
                    if(!empty($_POST['videotitle'])){
						$statement = $mysqli->prepare("UPDATE `videos` SET `videotitle` = ? WHERE `vid` = '" . $_GET["v"] . "'");
					    $statement->bind_param("s", $_POST['videotitle']);
					    $displayname = htmlspecialchars($_POST['videotitle']);
                        $trimmed = substr($videotitle, 0, 27);
					    $statement->execute();
						$webhookurl = $webhook;
						$ntitle = htmlspecialchars($_POST['videotitle']);
					    $statement->close();
					}
                    echo('<script>
             window.location.href = "watch?v='.$_GET['v'].'";
             </script>');
				}
			?>
        </div>
        <div class="span5">
            <h2>Editing "<?php echo $title;?>"</h2>
            <p>Published <?php echo $upload; ?></p>
            <p><em><?php echo $desc; ?></em></p>
            <!-- <div class="banner">UPLOAD IS UNDER MAINTENANCE PLEASE WAIT</div> -->

        </div>
        </div>
            </div>
        </div>
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>
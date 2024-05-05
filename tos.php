<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require_once './assets/mod/meta.php';?>      
</head>

  <body>
<?php require_once './assets/mod/db_init.php';?>
<?php require_once './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php require_once './assets/mod/alert.php';?>
          <h1>Terms of Service <small>Last updated December 28, 2021</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Uploading Rules</h2>
            <ul class="unstyled">
<li>No NSFW content at all. This includes hardcore porn, softcore porn, Rule 34, hentai and, basically any type of porn.</li>
<br>
<li><strong>NO NSFL CONTENT.</strong> Including all types of gore, propaganda, and child porn (goes with no nsfw aswell).</li>
<br>
<li>Uploading any NSFW/NSFL content can result in: video deletion, account deletion, temporary IP ban, or permanent IP ban.</li>
<br>
<li>Additionally, corrupted video metadata, unless staff can go and change the file name and path in the database to fix it, will result in video deletion.</li>
<br>
            </ul>
            <h2>Commenting Rules</h2>
            <ul class="unstyled">
                <li>Please, don't be a jackass/smartass/"edgy kid". It doesn't help anyone, and it's certainly not needed. Doing so will result in your comment deleted and if you keep it up, we'll delete your account (This can also lead to a IP ban).</li>
                <br>
                <li>Do <strong>NOT</strong> spam comments. All that does is clog the comment section and database, which we do not need.</li>
                </ul>
          </div>
          <div class="span4">
<?php require_once './assets/mod/whatsnew.php'; ?>
      </div>

      
    </div> <!-- /container -->
    <?php require_once './assets/mod/footer.php'; ?>
  </body>
</html>
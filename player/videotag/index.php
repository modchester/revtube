<?php
$vid = htmlspecialchars($_GET['v']) ?? die('Invalid arguments.');
?>
<style>
    body, html {
        margin: 0;
    }

    video {
        background: black;
    }
</style>
<video controls width="100%" height="100%">
  <source src="<?php echo $vid; ?>" type="video/mp4" />

  Your browser doesn't support the video tag.
</video>

<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/assets/mod/branding.php");

// this is for the profile terminated error yk
if(!isset($error)) {
  $error = (int)$_GET['code'] ?? 400;
}
if(!isset($message)) {
  $message = $error_messages[$error] ?? $error_messages[400];
}

http_response_code($error);
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Error <?php echo $error; ?></title>
      <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png">
      <link id="css-304759147" rel="stylesheet" href="/yts/cssbin/www-core-vflcZE6_v.css">
  </head>
  <body>
    <div id="error-page"> 
      <div id="error-page-content">
        <img id="error-page-hh-illustration" src="/assets/img/404/<?php echo $site['errorGatoNum']; ?>.png" alt="">
        <p>
          <?php echo $message; ?>
        </p>
        <div id="yt-masthead">
              <a id="logo-container" href="/" title="<?php echo $site['name']; ?> home">
                <img id="logo" src="<?php echo $site['logo_source']; ?>" alt="<?php echo $site['name']; ?> home">
              
                <!--<span class="content-region">PL</span>-->
              </a>
          


  <form id="masthead-search" class="search-form consolidated-form" action="/results" onsubmit="if (_gel('masthead-search-term').value == '') return false;">
<button id="search-btn" tabindex="2" type="submit" class="search-btn-component search-button yt-uix-button yt-uix-button-default" dir="ltr" onclick="if (_gel('masthead-search-term').value == '') return false; _gel('masthead-search').submit(); return false;;return true;" role="button"><span class="yt-uix-button-content">Search </span></button><div id="masthead-search-terms" class="masthead-search-terms-border" dir="ltr"><label><input id="masthead-search-term" autocomplete="off" class="search-term" name="q" value="" type="text" tabindex="1" onkeyup="goog.i18n.bidi.setDirAttribute(event,this)" title="Search"></label></div>  </form>

        </div>
      </div>
      <span id="error-page-vertical-align"></span>
    </div>
  </body>
</html>
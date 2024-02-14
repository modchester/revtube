<?php
if(isset($_GET["v"])) {
$vid = htmlspecialchars($_GET["v"]);
}

//if $vid is null then dont show anything
if ($vid == null) {
require("setVideo.php");
die();
}
?>

<style>
.html5-control-right.yt-uix-button.yt-uix-button-player.html5-watch-on-youtube-button {
    display: none;
}
.el-embedded .html5-info-bar {
    display: none!important;
}
.endscreen-loaded .ytp-thumbnail .video-thumbnail {
    visibility: hidden!important;
}
.endscreen-loaded .html5-endscreen {
    display: none!important;
}
.ytp-button-fullscreen-enter {
    display: block!important;
}
.ytp-play-progress {
background: #1F6CCD !important;
}
.seeking-mode .html5-scrubber-button, .html5-scrubber-button:focus, .html5-scrubber-button:active, .html5-scrubber-button:hover {
    background: #1F6CCD !important;
}
.html5-volume-slider-foreground:before {
  background: #1F6CCD !important;
}
.ytp-large-play-button-image {
background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFUAAAA8CAYAAAAXDvbIAAAAAXNSR0IArs4c6QAABEJJREFUeF7tnM1PE0EUwN/bYuCkeKNqIph4UKnUxMSj9eRR/AvkxAUKnOVgPWJCJHwkfhyoV4yhhmBCYgIejBpNLLRKYqLWRNgSNHxEwmf3yW7Z7faD0qULO7PMHpuZN29++zrz3uy8h2Dx8bZ8PUsS1gKmakHB2tzuElItEeX9XngYpRpQ8ltUoXhzUqIA0mJJMj0UpZQnv61ECSBPAhVKyAMXf5Uky9QIi3VQAULFVgekMD1xhIDVAVzRnmBCm4cEkbW19fDCk6tLxeZVEKoGU0r1AECjK6DYOQmERUAKr61uhHaDmwe1Jjh9HXErAgTVduriOlnqMkPHGgstD1lQTwfjDQrShABaogmQEl3b2AzkWmwWVG/r5GfbN44S9eO4WUTu8902629ArWmL30GiMMeTc0x1VKhxduDyS10BA6q3Lf4TSnaFHNOfzYERE3JvfV0WVG0tBYqyqTEfWkmA/pm++sm05wkANa1f7iEqIT7UZ1NLIimU7L9034DqDcaGhU9a5ssimJD7fTcyUNtiC8KNKhMqAMh9Pu2fj2I9LR+mLoGgIpDsu/AGtQgKttKxrXjKIpCBKjapskCaOwuotqHMCNI9APS2xsaP7JGezWAFVJuBquKYgjrYXAfxmVV4/Hoe/q2nDmC6hyZSO1xh4u8/3HEerp2rhJUNgEfjf6B7NHloFGwdaCcAQG8wRrYK3ocwHareVV5SoOvVHAy9+7sPaQ52YRkqt3BJicr9DVeYtNRcW+PJctVQlQuoZsu9O/QbxmLLDv7Hiw/NHVR9Oh9+rEPXyCy8/77CHFxuobIMl3uoLMJ1DVQzXHXNnZ5ddWxZcB1UneTzj8vQNSLD7OLmocN1LVSdZPfY4UdnroWqhrudL2RHIjLXQdXPDpw8mHENVBZgGgEKbxFVoV1H3ZQ6h2aYOTLk2lKd3OGLuRRcQlVD1JZwwhF3qRT/jCuoLMf7ZthpqAzc9ss9pDYryQtMTWfjPJWBr6mFoPJ0hmoYgXHyzxhULmHqVFmDWn+mEh6MzsHT8flS9gNW27DzNfWm7zi8/bbCjK+53zfG1Hf//U6CtX4ZqO1TD0HBDtYU5FEfA6q4mm7f68tAFak+tlHVU3/ETWrbkAIY91NVmSxc/bFxbo6JMu78a1AZCFUdI2HXwLnZKaeC8UECarJL/lGUk5dHJTJUyjeDvIw/sQSUCXXndEqXYkr4jbVvJ6ip1SjEY5EAITYle+uf5UE92fzpRFVVZUJk/lklmr6Tau6VVURBJKpZBIqwKBEG9OzpPEvVfzjVMnWLPBgWFrsHYFKiEnqacoGqvXat9oOSEhJuVmGwqvu0vrHaU3K1H7MYrZSSJ9UIBAFA9B/pyhVqbSoJIpDyRPYqAFa02Ffue9Krp22XWPKTImkllgpXTDuAymgWl7tdm+uFu3IbFKqmtlNJTc2MtjK8JahWBB/ltv8BXGyQW93TJaEAAAAASUVORK5CYII=') !important;
}
.ytp-thumbnail {
	background-image: url('/content/thumb/<?php echo $_GET['vid']; ?>.jpg') !important;
background-size: cover;
  /* height: 360px !important;
width: 640px !important; */
}
</style>

<!DOCTYPE html>  <html lang="en" dir="ltr"  data-cast-api-enabled="true">
<head><title>RevTube Player</title><link rel="canonical" href="">  <link id="css-4047501374" class="www-embed-player" rel="stylesheet" href="//s.ytimg.com/yts/cssbin/www-embed-player-vfl6VVwMv.css" data-loaded="true">
<script>var ytcsi = {gt: function(n) {n = (n || '') + 'data_';return ytcsi[n] || (ytcsi[n] = {tick: {},span: {},info: {}});},tick: function(l, t, n) {ytcsi.gt(n).tick[l] = t || +new Date();},span: function(l, s, n) {ytcsi.gt(n).span[l] = (typeof s == 'number') ? s :+new Date() - ytcsi.data_.tick[l];},info: function(k, v, n) {ytcsi.gt(n).info[k] = v;}};(function() {var perf = window['performance'] || window['mozPerformance'] ||window['msPerformance'] || window['webkitPerformance'];ytcsi.tick('_start', perf ? perf['timing']['responseStart'] : null);})();if (document.webkitVisibilityState == 'prerender') {ytcsi.info('prerender', 1);document.addEventListener('webkitvisibilitychange', function() {ytcsi.tick('_start');}, false);}try {ytcsi.pt_ = (window.chrome && chrome.csi().pageT ||window.gtbExternal && gtbExternal.pageT() ||window.external && external.pageT);if (ytcsi.pt_) {ytcsi.info('pt', Math.floor(ytcsi.pt_));}} catch(e) {}</script></head>



  <body id="" class="date-20131219 en_US ltr   ytg-old-clearfix  site-left-aligned " dir="ltr">
<div id="player" class="full-frame"></div><div id="player-unavailable" class="ytp-error hid"><div id="unavailable-submessage" class="ytp-error-content"></div></div>  <script id="js-2900126986" class="www-embed-player" src="/www-embed-player-vflUmkt61.js" data-loaded="true"></script>
<script>yt.setConfig({
  EVENT_ID: "RUXDUpmwIoiRiQLA54GABQ",
  VIDEO_ID: "LHdA7Yc-8Rg",
  POST_MESSAGE_ORIGIN: "*",
  EURL: "http://www.itv.com/news/topic/gangnam-style/",
});
yt.setConfig({
  PLAYER_CONFIG: {
    sts: 16057,
    params: {
      allowfullscreen: "true",
      allowscriptaccess: "always",
      bgcolor: "#000000",
    },
    url_v8: "http://s.ytimg.com/yts/swfbin/player-vflqv4MLv/cps.swf",
    min_version: "8.0.0",
    html5: false,
    url: "http://s.ytimg.com/yts/swfbin/player-vflqv4MLv/watch_as3.swf",
    args: {
      enablejsapi: "0",
      iurlmaxres: "./thumbs/<?php echo $vid; ?>.png",
      threed_module: "1",
      ldpj: "-3",
      fexp: "931319,927606,901479,930102,916624,909717,924616,932295,936912,936910,923305,936913,907231,907240,921090",
      hl: "en_US",
      eurl: "http://www.itv.com/news/topic/gangnam-style/",
      el: "off",
      allow_embed: 1,
      avg_rating: 4.57515427974,
      idpj: "-7",
      video_id: "<?php echo $vid; ?>",
      view_count: 5462747,
      allow_ratings: 1,
      cc3_module: "1",
      sw: "1.0",
      iurlsd: "./thumbs/<?php echo $vid; ?>.png",
      cc_module:
        "http://s.ytimg.com/yts/swfbin/player-vflqv4MLv/subtitle_module.swf",
      iurl: "./thumbs/<?php echo $vid; ?>.png",
      cc_font: "Arial Unicode MS, arial, verdana, _sans",
      length_seconds: 253,
      title: "Player",
      cr: "US",
      advideo: "1",
      streaminglib_module: "1",
      rel: "1",
      is_html5_mobile_device: true,
    },
    attrs: { height: "100%", id: "video-player", width: "100%" },
    url_v9as2: "http://s.ytimg.com/yts/swfbin/player-vflqv4MLv/cps.swf",
    assets: {
      js: "//s.ytimg.com/yts/jsbin/html5player-vflG49soT.js",
      html: "/html5_player_template",
      css: "/yts/cssbin/www-player-vflBjKccE.css",
    },
  },
  EMBED_HTML_TEMPLATE:
    '\u003ciframe width="__width__" height="__height__" src="__url__" frameborder="0" allowfullscreen\u003e\u003c/true\u003e',
  EMBED_HTML_URL: "//www.youtube.com/embed/__videoid__",
});
yt.setMsg(
  "FLASH_UPGRADE",
  '\u003cdiv class="yt-alert yt-alert-default yt-alert-error  yt-alert-player"\u003e  \u003cdiv class="yt-alert-icon"\u003e\n    \u003cimg s\u0072c="http://s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" class="icon master-sprite" alt="Alert icon"\u003e\n  \u003c/div\u003e\n\u003cdiv class="yt-alert-buttons"\u003e\u003c/div\u003e\u003cdiv class="yt-alert-content" role="alert"\u003e    \u003cspan class="yt-alert-vertical-trick"\u003e\u003c/span\u003e\n    \u003cdiv class="yt-alert-message"\u003e\n            You need to upgrade your Adobe Flash Player to watch this video. \u003cbr\u003e \u003ca href="http://get.adobe.com/flashplayer/"\u003eDownload it from Adobe.\u003c/a\u003e\n    \u003c/div\u003e\n\u003c/div\u003e\u003c/div\u003e'
);
yt.setMsg(
  "PLAYER_FALLBACK",
  'The Adobe Flash Player or an HTML5 supported browser is required for video playback. \u003cbr\u003e \u003ca href="http://get.adobe.com/flashplayer/"\u003eGet the latest Flash Player\u003c/a\u003e \u003cbr\u003e \u003ca href="/html5"\u003eLearn more about upgrading to an HTML5 browser\u003c/a\u003e'
);
yt.setMsg(
  "QUICKTIME_FALLBACK",
  'The Adobe Flash Player or QuickTime is required for video playback. \u003cbr\u003e \u003ca href="http://get.adobe.com/flashplayer/"\u003eGet the latest Flash Player\u003c/a\u003e \u003cbr\u003e \u003ca href="http://www.apple.com/quicktime/download/"\u003eGet the latest version of QuickTime\u003c/a\u003e'
);
yt.setMsg("AUTOPLAY_MESSAGE", {
  other: "Next video in #",
  case1: "Next video in 1",
});

writeEmbed();
</script>    <script>
ytcsi.span('st', 8);yt.setConfig({'TIMING_ACTION': "",'TIMING_INFO': {"e": "931319,927606,901479,930102,916624", "yt_lt": "cold", "ei": "RUXDUpmwIoiRiQLA54GABQ", "yt_li": 0, "yt_spf": 0}});    </script>
</body></html>
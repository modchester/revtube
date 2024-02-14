<?php
if(isset($_GET["v"])) {
$vid = htmlspecialchars($_GET["v"]);
}

//if $vid is null then dont show anything
if ($vid == null) {
require($_SERVER['DOCUMENT_ROOT'] . "/setVideo.php");
die();
}
?>
<!DOCTYPE html>  <html lang="en" dir="ltr" data-cast-api-enabled="true">
<head>
<title>2016 YouTube video player</title><meta name="viewport" content="width=device-width, initial-scale=1">
<style name="www-roboto">
a.ytp-youtube-button.ytp-button {
    display: none;
}
.ytp-chrome-top {
	display: none!important;
}
/* .ytp-chrome-top, .ytp-chrome-bottom {
	background: #1B1B1B;
    width: 640px !important;
    margin-left: -12px;
} */
@font-face{font-family:'Roboto';font-style:normal;font-weight:400;src:local('Roboto Regular'),local('Roboto-Regular'),url(//web.archive.org/web/20160614154433im_/https://fonts.gstatic.com/s/roboto/v15/zN7GBFwfMP4uA6AR0HCoLQ.ttf)format('truetype');}@font-face{font-family:'Roboto';font-style:normal;font-weight:500;src:local('Roboto Medium'),local('Roboto-Medium'),url(//web.archive.org/web/20160614154433im_/https://fonts.gstatic.com/s/roboto/v15/RxZJdnzeo3R5zSexge8UUaCWcynf_cDxXwCLxiixG1c.ttf)format('truetype');}@font-face{font-family:'Roboto';font-style:italic;font-weight:500;src:local('Roboto Medium Italic'),local('Roboto-MediumItalic'),url(//web.archive.org/web/20160614154433im_/https://fonts.gstatic.com/s/roboto/v15/OLffGBTaF0XFOW1gnuHF0Z0EAVxt0G0biEntp43Qt6E.ttf)format('truetype');}@font-face{font-family:'Roboto';font-style:italic;font-weight:400;src:local('Roboto Italic'),local('Roboto-Italic'),url(//web.archive.org/web/20160614154433im_/https://fonts.gstatic.com/s/roboto/v15/W4wDsBUluyw0tK3tykhXEfesZW2xOQ-xsNqO47m55DA.ttf)format('truetype');}</style><script name="www-roboto">if (document.fonts && document.fonts.load) {document.fonts.load("400 10pt Roboto", "");document.fonts.load("500 10pt Roboto", "");}</script>
<link rel="stylesheet" href="./2016/www-embed-player-vflboaRA4.css" name="www-embed-player">
<script>__yt_experimental_now = __spf_experimental_now = true;</script><script>var ytcsi = {gt: function(n) {n = (n || '') + 'data_';return ytcsi[n] || (ytcsi[n] = {tick: {},span: {},info: {}});},now: window.performance && window.performance.timing &&window.performance.now ? function() {return window.performance.timing.navigationStart + window.performance.now();} : function() {return (new Date()).getTime();},tick: function(l, t, n) {ytcsi.gt(n).tick[l] = t || ytcsi.now();},span: function(l, s, e, n) {ytcsi.gt(n).span[l] = (e ? e : ytcsi.now()) - ytcsi.gt(n).tick[s];},setSpan: function(l, s, n) {ytcsi.gt(n).span[l] = s;},info: function(k, v, n) {ytcsi.gt(n).info[k] = v;},setStart: function(s, t, n) {ytcsi.info('yt_sts', s, n);ytcsi.tick('_start', t, n);}};(function(w, d) {ytcsi.setStart('dhs', w.performance ? w.performance.timing.responseStart : null);var isPrerender = (d.visibilityState || d.webkitVisibilityState) == 'prerender';var vName = d.webkitVisibilityState ? 'webkitvisibilitychange' : 'visibilitychange';if (isPrerender) {ytcsi.info('prerender', 1);var startTick = function() {ytcsi.setStart('dhs');d.removeEventListener(vName, startTick);};d.addEventListener(vName, startTick, false);}if (d.addEventListener) {d.addEventListener(vName, function() {ytcsi.tick('vc');}, false);}})(window, document);</script></head>

<style>
.ytp-thumbnail-overlay {
	background-image: url('/content/thumb/<?php echo $_GET['vid']; ?>.jpg') !important;
}
</style>
  <body id="" class="date-20160613 en_US ltr  exp-responsive exp-scrollable-guide   site-center-aligned site-as-giant-card  not-yt-legacy-css " dir="ltr">
<div id="player" class="full-frame"></div><div id="player-unavailable" class="ytp-error"><div id="unavailable-submessage" class="ytp-error-content"></div></div>  
<script src="./2016/www-embed-player.js?<?php echo rand(1, 9999); ?>" type="text/javascript" name="www-embed-player/www-embed-player"></script>
  <script src="./2016/base.js?<?php echo rand(1, 9999); ?>" name="player/base"></script>
<script>yt.setConfig({
	'EVENT_ID': "YSZgV-bRBqSH_AOkhIWYDQ",
	'VIDEO_ID': "test",
	'ENABLE_CAST_API': true,
	'MDX_ENABLE_CASTV2': true,
	'POST_MESSAGE_ORIGIN': "*",
	'EURL': "http:\/\/web.archive.org\/web\/20160614154433\/https:\/\/youtube.googleblog.com\/",
	'REVERSE_MOBIUS_PERCENT': 100
});
yt.setConfig({
	'PLAYER_CONFIG': {
		"args": {
			"loaderUrl": "http:\/\/web.archive.org\/web\/20160614154433\/https:\/\/youtube.googleblog.com\/",
			"eventid": "YSZgV-bRBqSH_AOkhIWYDQ",
			"cr": "US",
			"view_count": 0,
			"gapi_hint_params": "m;\/_\/scs\/abc-static\/_\/js\/k=gapi.gapi.en.PQWOXwGAyXQ.O\/m=__features__\/rt=j\/d=1\/rs=AHpOoo-SsKefX_tnkYaztI7tux9JZAkUgw",
			"ssl": "1",
			"enablejsapi": "1",
			"host_language": "en",
			"player_error_log_fraction": "1.0",
			"innertube_api_key": "AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8",
			"idpj": "-6",
			"hl": "en_US",
			"c": "WEB",
			"video_id": "<?php echo $_GET['v'] ?>" ,
			"innertube_api_version": "v1",
			"rel": "1",
			"enablecastapi": "1",
			"iurl": "test.png",
			"fflags": "html5_idle_preload_secs=0\u0026cards_drawer_auto_open_duration=-1\u0026tv_player_heartbeats=true\u0026video_metadata_provider_with_query_id=true\u0026dash_html5_max_request_size_factor=1.0\u0026kids_enable_columbia_lp=true\u0026native_controls_assume_media_volume=true\u0026legacy_autoplay_flag=true\u0026product_listing_ads_cards_drawer_auto_open=true\u0026html5_deadzone_multiplier=1.0\u0026html5_background_cap_idle_secs=0\u0026kids_enable_latam_lp=true\u0026html5_tight_max_buffer_allowed_impaired_time=0.0\u0026cards_drawer_auto_open_offset=-10000\u0026gaming_mweb=true\u0026gaming_i18n=true\u0026html5_longer_seek_delay=true\u0026html5_max_buffer_duration=0\u0026html5_live_disable_dg_pacing=true\u0026html5_reseek_on_infinite_buffer=true\u0026beacon_abandoned_only=true\u0026html5_request_sizing_multiplier=0.8\u0026html5_background_quality_cap=0\u0026kids_enable_onboarding_existing_users_android=false\u0026kids_enable_onboarding_existing_users_ios=false\u0026html5_throttle_rate=0.0\u0026html5_check_for_reseek=true\u0026html5_live_only_stick_to_head=true\u0026chrome_promo_enabled=true\u0026sidebar_renderers=true\u0026html5_multicam=true\u0026yto_feature_hub_channel=false\u0026yto_enable_unlimited_landing_page_yto_features=true\u0026flex_theater_mode=true\u0026enable_mrm_channel_approve=true\u0026disable_new_pause_state3=true\u0026yto_enable_watch_offer_module=true\u0026generate_shopping_companions_on_desktop=true\u0026html5_tight_max_buffer_allowed_bandwidth_stddevs=0.0\u0026legacy_poster_behavior=true\u0026html5_dash_mpd_version=4\u0026enable_mweb_ypc_promotion_renderer=true\u0026firefox_eme=true\u0026feeds_on_innertube=true\u0026launch_new_wallet_api=true\u0026live_chunk_readahead=3\u0026log_it_display_tree=true\u0026enable_yt_music_lp=true\u0026dynamic_ad_break_seek_threshold_sec=0\u0026html5_sticky_quality_duration_secs=604800\u0026html5_bandwidth_window_size=0\u0026yto_enable_ytr_promo_refresh_assets=true\u0026mpu_visible_threshold_count=2\u0026high_res_timestamps=true\u0026html5_auto_format_cap_on_battery=0\u0026html5_request_delay_cutoff=0.0\u0026html5_strip_emsg=true\u0026html5_playing_event_buffer_underrun=true\u0026dynamic_ad_break_pause_threshold_sec=0\u0026enable_audio_cast=true\u0026yt_unlimited_special_offers_offer_ids=element:'unlimited.P.1462582356814744',element:'unlimited.P.1462582568961775',element:'unlimited.P.1462582932821829',element:'unlimited.P.1462583256800336',element:'unlimited.P.1462583542437412',element:'unlimited.P.1462583711646004',element:'unlimited.P.1462838921272750'\u0026fix_backfill_mpu_api_stats_ads=true\u0026legacy_cast=true",
			"allow_ratings": 1,
			"avg_rating": 4.9256128487,
			"el": "embedded",
			"fexp": "9416126,9416891,9422596,9428398,9431012,9433096,9433223,9433946,9434676,9435527,9435876,9437066,9437553,9438338",
			"innertube_context_client_version": "1.20160609",
			"origin": "*",
			"apiary_host": "",
			"title": "2016 YouTube video player",
			"ldpj": "-25",
			"is_html5_mobile_device": false,
			"allow_embed": 1,
			"cver": "1.20160609",
			"adformat": null,
			"apiary_host_firstparty": ""
		},
		"html5": true,
		"sts": 16965,
		"min_version": "8.0.0",
		"assets": {
			"css": "\/\/s.ytimg.com\/yts\/cssbin\/www-player-vflgPZnJ5.css",
			"js": "\/\/s.ytimg.com\/yts\/jsbin\/player-en_US-vflBUz8b9\/base.js"
		},
		"url_v8": "http:\/\/web.archive.org\/web\/20160614154433\/https:\/\/s.ytimg.com\/yts\/swfbin\/player-vflGuPl8j\/cps.swf",
		"attrs": {
			"width": "100%",
			"height": "100%",
			"id": "video-player"
		},
		"url_v9as2": "",
		"params": {
			"allowscriptaccess": "always",
			"allowfullscreen": "true",
			"bgcolor": "#000000",
			"wmode": "opaque"
		},
		"url": "http:\/\/web.archive.org\/web\/20160614154433\/https:\/\/s.ytimg.com\/yts\/swfbin\/player-vflGuPl8j\/watch_as3.swf",
		"messages": {
			"player_fallback": ["Adobe Flash Player or an HTML5 supported browser is required for video playback.\u003cbr\u003e\u003ca href=\"http:\/\/get.adobe.com\/flashplayer\/\"\u003eGet the latest Flash Player \u003c\/a\u003e\u003cbr\u003e\u003ca href=\"\/html5\"\u003eLearn more about upgrading to an HTML5 browser\u003c\/a\u003e"]
		}
	},
	'EXPERIMENT_FLAGS': {
		"log_window_onerror_fraction": 0.1,
		"enable_negative_ticks": true,
		"beacon_abandoned_only": true,
		"player_swfcfg_cleanup": true,
		"gfeedback_for_signed_out_users_enabled": true,
		"consent_url_override": "",
		"legacy_cast": true
	}
});
writeEmbed();</script><script>ytcsi.info('st', 27);yt.setConfig({'CSI_SERVICE_NAME': "youtube",'TIMING_ACTION': "",'TIMING_INFO': {"e":"9416126,9416891,9422596,9428398,9431012,9433096,9433223,9433946,9434676,9435527,9435876,9437066,9437553,9438338","yt_lt":"cold","yt_li":0,"cver":"1.20160609","c":"WEB"}});</script><noscript><div class="player-unavailable"><h1 class="message">An error occurred.</h1><div class="submessage"><a href="http://web.archive.org/web/20160614154433/http://www.youtube.com/watch?v=lpXgJGGfeqs" target="_blank">Try watching this video on www.youtube.com</a>, or enable JavaScript if it is disabled in your browser.</div></div></noscript></body></html>
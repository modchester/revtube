<?php
// get_video_data thing made by succulent64 for JarkTube
// This is minutes of looking at format maps in use.
//modified version
if(isset($_GET['video_id'])) {
$fmt_map = array(
//the map that plays videos
'itag' => '43',
'url' => $_GET['video_id'],
'sig' => 'jark' . rand(1, 8) . '-' . bin2hex(random_bytes(5)),
'fallback_host' => 'tc.v14.cache3.c.youtube.com',
'quality' => 'hd720',
'type' => "video/mp4; codecs=\"avc1.4d002a\""
);
$url_encoded_fmt_stream_map = http_build_query($fmt_map);
$other_map = array(
// the map that doesn't store video urls
'hl' => 'en_US',
'cc_module' => 'ass.swf',
'track_embed' => '1',
'video_verticals' => '[933, 8, 930]',
'vq' => 'hd720',
'title' => "2016 YouTube video player",
'sendtmp' => '1',
'avg_rating' => '5.0',
'caps' => 'asr',
'expire' => time() + 7,
'sparams' => 'asr_langs,caps,v,expire',
'v' => 'kylarz was here',
'key' => 'yt1',
'asr_langs' => 'ko,de,pt,en,nl,ja,ru,es,fr,i$$t',
'url_encoded_fmt_stream_map' => $url_encoded_fmt_stream_map,
'view_count' => '0',
'cc_asr' =>  '0',
'token' => 'vjVQa1PpcFPQw_h19VxFJZdJZbKkh5-obrhC9M93j-E',
'no_get_video_log' => '0',
'muted' => '0',
'allow_ratings' => '1',
'keywords' => 'kylarz was here',
'account_playback_token' => '',
'video_id' => 'kylarz was here',
'thumbnail_url' => $_GET['vid'],
'status' => 'ok',
'has_cc' => 'False',
'fexp' => '907063,919329,913565,920704,912806,902000,922403,922405,929901,913605,925006,908529,920201,930101,911116,926403,910221,901451,919114',
'ftoken' => '',
'cc_font' => 'Arial Unicode MS, arial, verdana, _sans',
'allow_embed' => '1',
'author' => 'kylarz',
'length_seconds' => '000',
'storyboard_spec' => '',
'abd' => '1',
'cc3_module' => 'ass.swf',
'tmi' => '1',
'ptk' => 'youtube_none',
'endscreen_module' => 'ass.swf',
'fmt_list' => '45/1280x720/99/0/0,22/1280x720/9/0/115,44/854x480/99/0/0,35/854x480/9/0/115,43/640x360/99/0/0,34/640x360/9/0/115,18/640x360/9/0/115,5/320x240/7/0/0,36/320x240/99/0/0,17/176x144/99/0/0×tamp=1361203689',
);
echo http_build_query($other_map);
// var_export($other_map);
} else {
	echo "status=fail&reason=Invalid+parameters.&errorcode=2";
}
?>

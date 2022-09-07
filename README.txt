=======================================
||                                   ||
||    Patched 2012 YouTube player    ||
||        by billyisreal.com         ||
||                                   ||
=======================================

How To Use:

You need a web server like apache or nginx

Make sure to hide php extensions (I included a .htaccess for apache users)

Edit get_video_info.php

Put your thumbnails in content/thumb and your videos in content/video (examples are included)

Also there are some optional modifications on embed.php you can do

URL Parameters:
    v: The video file (no file path)
    t: The file for the thumbnail (no file path)

To test your player go to http://localhost/embed?v=Sneed%20Ballmer%20Goes%20Crazy.mp4&t=mountballmore.png
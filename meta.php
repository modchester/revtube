<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>RevTube</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-dropdown.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="just a small video site">
    <meta name="author" content="redst0netech, thewinapi">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="https://s.imon.fr/css3-youtube-buttons/yt-buttons.css" rel="stylesheet">
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }
      
      .logost {
                font-family: 'Red Hat Display', sans-serif;
      }
      
      .video-thumbnail{
    flex: 0 0 120px;
    border: 1px solid var(--colw);
    outline: 1px solid var(--colg);
    background: var(--colbl);
    width: 120px;
    height: 72px;
    padding: 0px;
    display: block;
    margin: auto;
    float: left;
    margin-right: 10px;
}
.video-thumbnail video{
    width: 100%;
    height: 100%;
}
.videoinfo {
  float: left;
}
video {
  background: black;
}
.topbar > .fill > .container {
  background-size: auto 100%;
  animation: animatedBackground 110s linear infinite alternate;
  background-image: url(assets/skylinewhite.png);
}
    </style>

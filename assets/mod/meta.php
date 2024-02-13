<?php include("branding.php"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title><?php echo $site['name']; ?></title>
    <style>      
    .logost {
        content: url('<?php echo $site['logo_source']; ?>') !important;
        height: 28px;
        margin-top: -2px !important;
        /* margin-right: -13px !important; */
        margin-right: 99px !important;
        margin-left: -36px !important; 
        margin-bottom: -1px;
        /* filter: invert(1); */
    } </style>
	  <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="220x220" href="/assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-twipsy.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-tabs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The world's smallest video sharing community">
    <meta name="author" content="neroidev, skyiebox/Cattskit">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/yt-buttons.css" rel="stylesheet">
	  <link href="/assets/css/misc.css" rel="stylesheet">
    <link href="/assets/css/2013.css" rel="stylesheet">
    <?php if($site['siteTheme'] !== 'default') { ?>
      <link href="/assets/css/theme?cache=<?php echo rand(1,9999); ?>" rel="stylesheet">
    <?php } ?>
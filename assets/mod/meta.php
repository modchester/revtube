<?php include("branding.php"); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title><?php echo $sitename; ?></title>
    <style>      .logost {
        content: url('<?php echo $logosrc; ?>') !important;
        /* thanks to «John» for the logo */
        height: 23px;
        margin-top: -2px !important;
        margin-right: -13px !important;
        margin-left: -35px !important;
        margin-bottom: -1px;
        /* filter: invert(1); */
    } </style>
	  <link rel="icon" type="image/x-icon" href="/assets/img/johnfavi.png">
    <link rel="apple-touch-icon-precomposed" sizes="220x220" href="/assets/img/johnfavicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-twipsy.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-tabs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="upload your funny video">
    <meta name="author" content="Redst0neTech, Cattskit">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://s.imon.fr/css3-youtube-buttons/yt-buttons.css" rel="stylesheet">
	<link href="/assets/css/misc.css" rel="stylesheet">
  <link href="/assets/css/2013.css" rel="stylesheet">
  <script>
    const fluentUIeligibility = localStorage.getItem("fluentUIenabled");
     if (fluentUIeligibility !== "true") {
    localStorage.setItem("fluentUIenabled", "false");
     }
     if (fluentUIeligibility == "true") {
      document.write('<link href="/assets/css/fluent.css" rel="stylesheet">');
     }
</script>
<?php
  error_reporting(0); 
  ?>
  <?php 
  if(isset($_SESSION['profileuser3'])) {
            $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $statement->bind_param("s", $_SESSION['profileuser3']);
            $statement->execute();
            $result = $statement->get_result();
            while($row = $result->fetch_assoc()) {
                if($row['strikes'] == 3) {
                  echo('<script>window.location.href = "logout";</script>');
				}
			}
    }
    ?>
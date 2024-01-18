<?php include("branding.php"); ?>
<footer class="yt-footer">
<style>      .footerlogost {
        content: url('<?php echo $site['logo_source']; ?>') !important;
        height: 23px;
        margin-top: -2px !important;
        margin-right: -13px !important;
        margin-bottom: -1px;
        /* to make it look like similar to the 2012 footer somewhat? idfk */
        filter: grayscale(1);
        opacity: 0.6;
    } </style>
    <h3><a class="footerlogost" href="/"><strong><?php echo $site['name']; ?></strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a></h3>
    <?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
?>
    <?php
            $sql = "SELECT COUNT(*) FROM users";
            $result = mysqli_query($mysqli, $sql);
            $usercount = mysqli_fetch_assoc($result)['COUNT(*)'];
            $sql2 = "SELECT COUNT(*) FROM videos";
            $result2 = mysqli_query($mysqli, $sql2);
            $videocount = mysqli_fetch_assoc($result2)['COUNT(*)'];
            $sql3 = "SELECT COUNT(*) FROM comments";
            $result3 = mysqli_query($mysqli, $sql3);
            $commentcount = mysqli_fetch_assoc($result3)['COUNT(*)'];
            $phpver = phpversion();
            ?>
    <p><abbr title="semi-2013 made by skyiebox and neroidev">&copy; <?php echo $site['name']; ?> 2021-<?php echo date("Y"); ?></abbr> <?php if(isset($debugmsg)) { echo $debugmsg; } ?> <a>Help</a> <a>Developers</a> <a>Discord</a></p>
    <!-- almost ready for launch i guess -neroidev 05/04/23 -->
    <!-- will people ever be willing to actually use this? -neroidev 06/17/23 -->
    <!-- maybe? -neroidev 11/22/23 -->
    <!-- yea probably -neroidev 01/18/24 -->
</footer>


<?php require_once("branding.php"); ?>
<footer class="yt-footer">
<style>      .footerlogost {
        content: url('<?php echo $site['logo_source']; ?>') !important;
        height: 28px;
        margin-top: -2px !important;
        margin-right: -13px !important;
        margin-bottom: -1px;
    } </style>
    <h3>
        
        <a class="footerlogost" href="/"><strong><?php echo $site['name']; ?></strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a>
        <!-- buttons -->
        <ul class="footer-buttons">
            <li><a class="pull-left yt-button" href="#" onclick="alert('Translations aren\'t implemented.')"><i class="bi bi-14 bi-globe-americas"></i> Language: <b>English</b> <i class="bi bi-caret-down-fill"></i></a></li> 
            <li><a class="pull-left yt-button" href="#" onclick="alert('Country-specific settings aren\'t implemented.')">Country: <b>Worldwide</b> <i class="bi bi-caret-down-fill"></i></a></li> 
            <li><a class="pull-left yt-button" href="#" onclick="alert('Safety settings aren\'t implemented.')">Safety: <b>Off</b> <i class="bi bi-caret-down-fill"></i></a></li>  
            <li><a class="pull-left yt-button" href="#" onclick="alert('No help for you.')"><i class="bi bi-14 bi-question-circle-fill"></i> Help <i class="bi bi-caret-down-fill"></i></a></li>  
        </ul>
            
     </h3>
    <?php
/*$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);*/
?>
    <p>
       <!-- links -->
        <ul class="footer-links">
            <li><a href="/info/about">About</a></li> 
            <li><a href="/info/developers">Developers</a></li>
            <li><a href="//discord.gg/EnQ5ht83MS">Discord</a></li>
            <li><a href="/blog">Blog</a></li>
                
            <!-- second ! -->
            <br>
            <li class="second-footer-link"><a href="/guidelines">Community Guidelines</a></li>
            <li class="second-footer-link"><a href="/stats">Statistics</a></li>
            <li class="second-footer-link"><a href="/info/partners">Partners</a></li>
            <?php if(isset($debugmsg)) { ?><?php echo $debugmsg; ?><?php } ?>
            <li class="second-footer-link footer-copyright"><span dir="ltr">© cattowithtea and ky-1,  2021-<?php echo date("Y"); ?></span></li>
        </ul>
    </p>
    
    <p> </p>
    <!-- almost ready for launch i guess -neroidev 05/04/23 -->
    <!-- will people ever be willing to actually use this? -neroidev 06/17/23 -->
    <!-- maybe? -neroidev 11/22/23 -->
    <!-- yea probably -neroidev 01/18/24 -->
</footer>


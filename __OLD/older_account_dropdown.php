"<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\" data-dropdown=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\"><span class='huname'>".htmlspecialchars($row["username"])."</span> <img style='margin-top: -7px; vertical-align: middle;' alt='".htmlspecialchars($row["username"])."' height='32px' width='32px' src='/content/pfp/".getUserPic($row["id"])."'></a>
              <ul class=\"dropdown-menu dropdown-menu-profile\">
              <li></li>
                <li><a href=\"./profile?user=".htmlspecialchars($row["username"])."\">Your Channel</a></li>
                <!--<li><a href=\"upload\">Upload</a></li>-->
                <li><a href='my_videos'>Studio</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"account\">Settings</a></li>
                ".$adminlink."
                <li><a href=\"logout?url=".htmlspecialchars($_SERVER['REQUEST_URI'])."\">Logout ".htmlspecialchars($row["username"])."</a></li>
              </ul>
            </li>
          </ul><!--<br><div style=\"color: white\" class=\"pull-right\"><strong><a href=\"./profile?id=".$row["id"]."\">".htmlspecialchars($row["username"])."</a></strong> - <a href=\"./account\">Manage Account</a> - <a href=\"./alogout\">Logout</a></div>-->";
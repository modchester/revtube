<!DOCTYPE html>
<html>
    <head>
        <title>RevTube</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: "Roboto", "Segoe UI", "SF Display", Arial, Helvetica, sans-serif;
                font-weight: 300;
            }
            .navbar {
                background-color: #EEEEEE;
                padding: 8px;
                margin: -8px;
                height: 30px !important;
                border-bottom: 2px solid #E9E9E9;
                display: flex;
            }
            .navbar > .brand {
                text-decoration: none;
                vertical-align: middle;
                color: #333;
                font-size: 20px;
                margin-top: 4px !important;
                margin-left: 4px !important;
                display: inline-block;
            }
            #hamburg {
                color: #333;
                font-size: 22px !important;
                margin-top: 4px !important;
                margin-left: 4px !important;
                text-decoration: none;
                vertical-align: middle;
            }
            #hamburgmenu {
                height: 100vh !important;
                display: none; 
                background: #333;
                color: #FFF;
                width: 200px;
                margin-left: -8px;
                margin-top: -66px !important;

                padding: 10px;
            }
            #hamburgmenu > h1 > .bi {
                float: right;
            }
            </style>
            </head>
            <body>
                <div class="navbar"><a href="#" onclick="showhamburg();" id="hamburg"><i class="bi bi-list"></i></a> <a class="brand" href=".">RevTube</a></div>
        <div id="hamburgmenu"><h1>Sign In <i onclick="hidehamburg();" class="bi bi-x-lg"></i></h1></div>
        
        <script>
            function showhamburg() {
   document.getElementById('hamburgmenu').style.display = "block";
}
function hidehamburg() {
   document.getElementById('hamburgmenu').style.display = "none";
}
</script>
            </body>
        </html>
<?php

session_start();
include_once("../private/sessions.php");
if (!isset($_SESSION["admin"]))
{
    header("Location: ./sasdaw_wasdasdas_config_login.php");
    exit();
}
else
{
    if (!$sessionator->validate($_SESSION["admin"]))
    {
        header("Location: ./sasdaw_wasdasdas_config_login.php");
        exit();
    }
}

$CONFIG_FILE = file_get_contents("../private/config.json");
$CONFIG = json_decode($CONFIG_FILE);
$THEME_COLOR = "#ed0e58";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Config</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                border: 0;
                font-family: sci-fi;
                outline: none;
            }
            body{
                background-color: black;
            }
            .form{
                text-align: center;
                margin: 0 auto;
                margin-top: 40px;
                width: 100%;
                max-width: 1000px;
            }
            .form input{
                width: 100%;
                height: 35px;
                font-size: 25px;
                font-weight: bold;
                background: transparent;
                border-bottom: 4px solid <?php echo $THEME_COLOR; ?>;
                color: <?php echo $THEME_COLOR; ?>;
                margin-bottom: 2px;
            }
            .form input[type="text"], .form input[type="password"]{
                padding: 0 10px;
                width: calc(100% - 20px);
            }
            .form input[type="submit"]{
                border: 0;
                background-color: <?php echo $THEME_COLOR; ?>;
                color: black;
            }
            .form input[type="submit"]:hover{
                cursor: pointer;
            }
            .form h1, label{
                color: <?php echo $THEME_COLOR; ?>;
            }
            .form label{
                float: left;
                font-size: 14px;
                font-weight: bold;
            }
            .logout_button{
                position: absolute;
                top: 5px;
                right: 5px;
                height: 35px;
                padding: 0 5px;
                background-color: <?php echo $THEME_COLOR; ?>;
                color: black;
                font-weight: bold;
                cursor: pointer;
                font-weight: bold;
            }
            .logout_button a{
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <button class="logout_button"><a href="./sasdaw_wasdasdas_logout.php">LOGOUT</a></button>
        <div class="form">
            <h1>CONFIGURATION SETTINGS</h1>
            <form method="POST" action="./sasdaw_wasdasdas_set_config.php">
                <label>PAGE TITLE</label>
                <input type="text" name="title" value="<?php echo $CONFIG->title; ?>"/>
                <label>PAGE ICON</label>
                <input type="text" name="icon" value="<?php echo $CONFIG->icon; ?>"/>
                <label>OG SITE NAME</label>
                <input type="text" name="og_site_name" value="<?php echo $CONFIG->og_site_name; ?>"/>
                <label>OG TITLE</label>
                <input type="text" name="og_title" value="<?php echo $CONFIG->og_title; ?>"/>
                <label hidden="hidden">OG TYPE</label>
                <input hidden="hidden" type="text" name="og_type" value="<?php echo $CONFIG->og_type; ?>"/>
                <label>OG URL</label>
                <input type="text" name="og_url" value="<?php echo $CONFIG->og_url; ?>"/>
                <label>OG DESCRIPTION</label>
                <input type="text" name="og_description" value="<?php echo $CONFIG->og_description; ?>"/>
                <label>OG IMAGE</label>
                <input type="text" name="og_image" value="<?php echo $CONFIG->og_image; ?>"/>
                <label hidden="hidden">TWITTER CARD</label>
                <input hidden="hidden" type="text" name="twitter_card" value="<?php echo $CONFIG->twitter_card; ?>"/>
                <input type="submit" value="SET CONFIG"/>
            </form>
        </div>
    </body>
</html>

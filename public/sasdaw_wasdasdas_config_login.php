<?php

session_start();
include_once("../private/logger.php");
include_once("../private/sessions.php");

if (isset($_SESSION["admin"]))
{
    if ($sessionator->validate($_SESSION["admin"]))
    {
        header("Location: ./sasdaw_wasdasdas_config.php");
        exit();
    }
}

$THEME_COLOR = "#ed0e58";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Login</title>
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
               position: absolute;
               top: 50%;
               left: 50%;
               transform: translate(-50%, -50%);
               width: 100%;
               max-width: 450px;
            }
            .form input{
                width: 100%;
                height: 35px;
                font-size: 25px;
                font-weight: bold;
                margin-bottom: 2px;
            }
            .form input[type="text"], .form input[type="password"]{
                padding: 0 10px;
                width: calc(100% - 20px);
                background: transparent;
                border-bottom: 4px solid <?php echo $THEME_COLOR; ?>;
                color: <?php echo $THEME_COLOR; ?>;
            }
            .form input[type="submit"]{
                background-color: <?php echo $THEME_COLOR; ?>;
                color: black;
                
            }
            .form input[type="submit"]:hover{
                cursor: pointer;
            }
            .form label{
                font-size: 14px;
                float: left;
                font-weight: bold;
                color: <?php echo $THEME_COLOR; ?>;
            }
            .form h1{
                width: 100%;
                color: <?php echo $THEME_COLOR; ?>;
                margin: 15px 0;
            }
        </style>
    </head>
    <body>
        <div class="form">
            <h1>Configuration Authentication</h1>
            <form method="POST" action="sasdaw_wasdasdas_authenticate.php">
                <label>USERNAME</label>
                <input type="text" name="username"/>
                <label>PASSWORD</label>
                <input type="password" name="password"/>
                <input type="submit" value="Authenticate"/>
            </form>
        </div>
    </body>
</html>

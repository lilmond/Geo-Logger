<?php

include_once("../private/logger.php");

if (isset($_POST["latitude"], $_POST["longitude"]))
{

    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $logger->logGeoLocation($latitude, $longitude);

}

?>

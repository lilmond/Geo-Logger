<?php

session_start();

include_once("../private/logger.php");
include_once("../private/sessions.php");

if (isset($_SESSION["admin"]))
{
    if ($sessionator->validate($_SESSION["admin"]))
    {
        $sessionator->removeSessions();
        session_destroy();
        header("Location: ./sasdaw_wasdasdas_config_login.php");
        exit();
    }
}

header("Location: ./index.php");
exit();

?>

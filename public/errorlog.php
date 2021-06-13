<?php

include_once("../private/logger.php");

if(isset($_POST["err"]))
{

    $err = $_POST["err"];
    $logger->logError($err);
    echo "OK";
    
}

?>

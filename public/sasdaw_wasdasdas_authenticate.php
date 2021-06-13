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

$admin_username = "root";
$admin_password = "lalalallalalalalallalalalalalalwahahahaha";

function HTMLEncode($text)
{

    return htmlspecialchars(trim($text), ENT_QUOTES, "UTF-8");

}

function generateString($length)
{

    $randchars = "";
    $chars = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    $charlength = strlen($chars);
    for ($i = 0; $i < $length; $i++)
    {
        $randchars .= $chars[rand(0, $charlength - 1)];
    }
    return $randchars;

}

if (isset($_POST["username"], $_POST["password"]))
{

    $username = HTMLEncode($_POST["username"]);
    $password = HTMLEncode($_POST["password"]);
    
    if ($username == $admin_username and $password == $admin_password)
    {
        $session_id = generateString(77);
        
        $sessionator->addSession($session_id);
        
        $_SESSION["admin"] = $session_id;
        header("Location: ./sasdaw_wasdasdas_config.php");
        exit();
    }

}

header("Location: ./sasdaw_wasdasdas_config_login.php");
exit();

?>

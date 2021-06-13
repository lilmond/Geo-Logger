<?php

include_once("../private/logger.php");
$CONFIG_PATH = "../private/config.json";

function HTMLEncode($text)
{

    return htmlspecialchars(trim($text), ENT_QUOTES, "UTF-8");

}

if (isset($_POST["title"], $_POST["icon"], $_POST["og_site_name"], $_POST["og_title"], $_POST["og_type"], $_POST["og_url"], $_POST["og_description"], $_POST["og_image"], $_POST["twitter_card"]))
{

    $title = HTMLEncode($_POST["title"]);
    $icon = HTMLEncode($_POST["icon"]);
    $og_site_name = HTMLEncode($_POST["og_site_name"]);
    $og_title = HTMLEncode($_POST["og_title"]);
    $og_type = HTMLEncode($_POST["og_type"]);
    $og_url = HTMLEncode($_POST["og_url"]);
    $og_description = HTMLEncode($_POST["og_description"]);
    $og_image = HTMLEncode($_POST["og_image"]);
    $twitter_card = HTMLEncode($_POST["twitter_card"]);
    
    $configJSON = array(
        "title" => $title,
        "icon" => $icon,
        "og_site_name" => $og_site_name,
        "og_title" => $og_title,
        "og_type" => $og_type,
        "og_url" => $og_url,
        "og_description" => $og_description,
        "og_image" => $og_image,
        "twitter_card" => $twitter_card,
    );
    $configJSONString = json_encode($configJSON);
    $configFile = fopen($CONFIG_PATH, "w");
    fwrite($configFile, $configJSONString);
    fclose($configFile);
    header("Location: ./sasdaw_wasdasdas_config.php");
    exit();
}

?>

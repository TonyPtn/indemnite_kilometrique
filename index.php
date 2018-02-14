<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 13:34
 */

//Start session
session_start();

//Load constants file
require_once "tools/constants.php";

//Load class loader file
require_once _TOOLS_."classLoader.php";

//Load config file
$config = new Config();

//Set default url
if(!isset($_GET['url']))
{
    $_GET['url'] = "accueil";
}

//Rpute GET request
Router::routeRequest($_GET['url']);
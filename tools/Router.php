<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 13:36
 */

class Router
{
    //Url route request function
    public static function routeRequest($url)
    {
        //Route GET request
        self::routeMVC($url);
    }

    //Route to requested page function
    public static function routeMVC($url)
    {
        if (file_exists(_MVC_ . $url . "/" . _CONTROLLER_))
        {
            require_once _MVC_ . $url . "/" . _CONTROLLER_;

            $controller = new Controller();
        }
        else
        {
            echo "error";
        }
    }
}
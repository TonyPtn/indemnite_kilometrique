<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 07/02/2018
 * Time: 09:40
 */

class Utils
{
    public static function refreshPage()
    {
        header("Location: ".$_GET['url']);
    }
}
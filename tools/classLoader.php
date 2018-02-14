<?php

function __autoload_tools($class)
{
    if(file_exists(_TOOLS_ . $class . ".php"))
    {
        include_once _TOOLS_ . $class . ".php";
    }
}

function __autoload_classes($class)
{
    if(file_exists(_CLASSES_ . $class . ".php"))
    {
        include_once _CLASSES_ . $class . ".php";
    }
}


spl_autoload_register("__autoload_tools");
spl_autoload_register("__autoload_classes");
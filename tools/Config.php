<?php
class Config {

    public function __construct ()
    {
        $this->SetZone();
        $this->SetEncodage();
        $this->setErrorDisplay('on');
    }

    private function SetZone ()
    {
        date_default_timezone_set('Europe/Paris');
    }

    private function SetEncodage ()
    {
        ini_set( 'default_charset', 'UTF-8' );
    }

    private function setErrorDisplay($state)
    {
        ini_set('display_errors', $state);
    }
}
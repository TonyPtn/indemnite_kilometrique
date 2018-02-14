<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 13:50
 */

class NavBar
{
    /**  Attributes **/
    private $navBarHTML;
    private $navBarCSS;

    /** Methods **/
    public function __construct()
    {
        /** Create GlyphIcons **/
        $homeGlyph = BootstrapGenerator::genGlyphIcon("home", "navGlyph", "navHomeGlyph", null);
        $logoutGlyph = BootstrapGenerator::genGlyphIcon("log-out", "navGlyph", "navLogoutGlyph", null);

        /** Create disconnection form **/
        $disconnectForm = "<form method='post' action='accueil-admin'><button type='submit' name='disconnect' id='discoBtn'>".$logoutGlyph."</button></form>";

        //Create navbar text
        $navText = BootstrapGenerator::genNavbarElement("Application de calcul d'indemnité de frais de déplacement kilométrique", 'text', null, "navText", null);

        /** Create navbar content div **/
        $col1div = BootstrapGenerator::genColDiv(null, "md-1", null, null, null);
        $col10div = BootstrapGenerator::genColDiv($col1div.$navText.$col1div, "md-10", null, "navContent", null);
        $navContent = BootstrapGenerator::genColDiv($col1div.$col10div.$col1div, "md-12", null, null, null);

        //Create navbar
        $navbar = BootstrapGenerator::genNavbar($navContent, false, null, null, null);

        //Create row
        $row = BootstrapGenerator::genRow($navbar, null, null, null);

        //Create container
        $container = BootstrapGenerator::genContainer($row, true, null, null, null);

        //Set navBarHTML
        $this->navBarHTML = $container;

        //Set navbar css
        $this->navBarCSS = "<link rel='stylesheet' href='"._NAVBARCSS_."'>";
    }

    public function getNavBarHTML()
    {
        return $this->navBarHTML;
    }

    public function getNavBarCSS()
    {
        return $this->navBarCSS;
    }
}
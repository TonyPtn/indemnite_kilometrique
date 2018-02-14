<?php
/**
 * User: tonypiton
 *
 * Description : Bootstrap HTML elements generator
 */


class BootstrapGenerator
{
    //Set bootstrap sources
    public static function setSources()
    {
        //Set HTML
        $sources = "<link rel='stylesheet' href='"._BOOTSTRAPDIR_._BOOTSTRAPCSS_."'>
                    <script src='"._BOOTSTRAPDIR_._JQUERY_."'></script>
                    <script src='"._BOOTSTRAPDIR_._BOOTSTRAPJS_."'></script>";

        //Retrun HTML with sources
        return $sources;
    }


    //Generate Jumbotron with content
    public static function genJumbotron($content, $class, $id, $attributes)
    {
        //Set HTML Jumbotron with attributes
        $jumbo = "<div class='jumbotron ".$class."' id='".$id."' $attributes>".$content."</div>";

        //Return HTML Jumbotron
        return $jumbo;
    }


    //Generate Container
    public static function genContainer($content, $fluid, $class, $id, $attributes)
    {
        //Prepare Container variable
        $container = null;

        //If fluid, add fluid to class
        if($fluid)
            $container = "<div class='container-fluid ".$class."' id='".$id."' $attributes>".$content."</div>";
        else
            $container = "<div class='container ".$class."' id='".$id."'>".$content."</div>";

        //Return HTML Container
        return $container;
    }

    //Generate Col div
    public static function genColDiv($content, $size, $class, $id, $attributes)
    {
        //Set HTML Col Div element
        $colDiv = "<div class='col-".$size." ".$class."' id='".$id."' ".$attributes.">".$content."</div>";

        //Return HTML Col Div
        return $colDiv;
    }


    //Generate Navbar
    public static function genNavbar($content, $inverse, $class, $id, $attributes)
    {
        //Prepare Navbar variable
        $navbar = null;

        //If inverse, add inverse to class
        if($inverse)
            $navbar = "<nav class='navbar navbar-inverse ".$class."' id='".$id."' $attributes>".$content."</nav>";
        else
            $navbar = "<nav class='navbar navbar-default ".$class."' id='".$id."' $attributes>".$content."</nav>";

        //Return HTML Navbar
        return $navbar;
    }


    //Generate Navbar elements
    public static function genNavbarElement($content, $type, $class, $id, $attributes)
    {
        //Prepare Navbar element variable
        $navbarElement = null;

        //Select element type
        switch ($type)
        {
            case 'brand':
                $navbarElement = "<a class='navbar-brand ".$class."' id='".$id."' $attributes>".$content."</a>";
                break;
            case 'form':
                $navbarElement = "<form class='navbar-form ".$class."' id='".$id."' $attributes>".$content."</form>";
                break;
            case 'form-group':
                $navbarElement = "<div class='form-group ".$class."' id='".$id."' $attributes>".$content."</div>";
                break;
            case 'button':
                $navbarElement = "<button class='navbar-btn btn ".$class."' id='".$id."' $attributes>".$content."</button>";
                break;
            case 'text':
                $navbarElement = "<p class='navbar-text ".$class."' id='".$id."' $attributes>".$content."</p>";
                break;
        }

        //Return HTML navbar element
        return $navbarElement;
    }


    //Generate Row div
    public static function genRow($content, $class, $id, $attributes)
    {
        //Set HTML div
        $row = "<div class='row ".$class."' id='".$id."' $attributes>".$content."</div>";

        //Return HTML row div
        return $row;
    }


    //Generate Table
    public static function genTable($content, $type, $head, $center, $class, $id, $attributes)
    {
        //Prepare header variable
        $header = null;

        if(!is_null($head))
        {
            //Fill table header
            foreach ($head as $headElement)
            {
                //Add head element
                $header .= "<th";
                $center ? $header.= " class='text-center'": $header = $header;
                $header.=">".$headElement."</th>";
            }
        }

        //Prepare content variable
        $cont = null;

        //Fill content
        if (isset($content))
        {
            foreach ($content as $row)
            {
                //Add row
                $cont .= "<tr>";

                foreach ($row as $rowElement)
                {
                    //add row element
                    $cont .= "<td";
                    $center ? $cont .= " class='text-center'" : $cont = $cont;
                    $cont .= ">" . $rowElement . "</td>";
                }

                //Close row
                $cont .= "</tr>";

            }
        }

        //Set HTML Table
        $table = "<table class='table ".$type." ".$class."' id='".$id."' ".$attributes."><thead>".$header."</thead>".$cont."</table>";

        //Return HTML Table
        return $table;
    }

    //Generate Glyphicon
    public static function genGlyphIcon($type, $class, $id, $attributes)
    {
        //Set HTML GlyphIcon element
        $glyphicon = "<span class='glyphicon glyphicon-".$type." ".$class."' id='".$id."' ".$attributes."></span>";

        //Return HTML GlyphIcon
        return $glyphicon;
    }

    //Generate Button
    public static function genButton($content, $type, $class, $id, $attributes)
    {
        //Set HTML Button element
        $button = "<button class='btn btn-".$type." ".$class."' id='".$id."' ".$attributes.">".$content."</button>";

        //Return HTML button
        return $button;
    }
}
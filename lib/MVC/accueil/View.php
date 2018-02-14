<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 13:53
 */

class View extends ViewPattern
{
    /** Attributes **/
    protected $htmlTemplate;
    //Allowance value
    private $allowance = null;
    //HP value
    private $HP;
    //Distance value
    private $distance;
    //String array for HP
    private $HPStringArray;
    //Examples array
    private $examples;

    public function __construct()
    {
        //Set navbar
        $this->navbar = new NavBar();
        //Set hp string array
        $this->HPStringArray = _HP_STRINGS_;
        //Call parent construct
        parent::__construct();
    }

    protected function setHead()
    {
        return BootstrapGenerator::setSources()."<link rel='stylesheet' href='"._MVC_ . $_GET['url'] . "/css/style.css"."'><script src ='"._MVC_ . $_GET['url'] . "/js/script.js'></script>".$this->navbar->getNavBarCSS();
    }

    protected function setTitle()
    {
        return "Frais kilométriques";
    }

    protected function setNav()
    {
        return $this->navbar->getNavBarHTML();
    }

    protected function setContent()
    {
        //Set page title
        $title = "<h2 class='text-center'>Calcul d'indemnité de frais de déplacement kilométrique</h2>";
        //Set page title row
        $titleRow = BootstrapGenerator::genRow($title, null, null, null);

        /** Create form **/
        //Create distance input
        $distanceInput = "<label>Distance parcourue : <input type='number' name='distance' id='distance' step='0.001' required> km</label>";
        //Create HP option inputs
        $HPInput1 = "<option value='0'>3 CV et moins</option>";
        $HPInput2 = "<option value='1'>4 CV</option>";
        $HPInput3 = "<option value='2'>5 CV</option>";
        $HPInput4 = "<option value='3'>6 CV</option>";
        $HPInput5 = "<option value='4'>7 CV et plus</option>";
        //Create HP select input
        $HPSelect = "<select name='HP'>".$HPInput1.$HPInput2.$HPInput3.$HPInput4.$HPInput5."</select>";
        //Create HP input
        $HPInput = "<label>Puissance fiscale du véhicule : ".$HPSelect."</label>";

        //Create inputs div
        $inputsDiv = "<div>".$distanceInput."<br>".$HPInput."</div>";

        //Create submit button
        $submitButton = "<input type='submit' name='submit' class='btn btn-primary' value='Calculer mes indemnités'>";

        //Create form
        $form = "<form method='post' action='"._URL_."'>".$inputsDiv.$submitButton."</form>";
        //Cretae form div
        $formDiv = BootstrapGenerator::genColDiv($form, "md-8", null, null, null);

        //Create form row
        $formRow = BootstrapGenerator::genRow($formDiv, null, "formRow", null);

        //prepare allowance row
        $allowanceRow = null;

        //If allowance is set, set allowance row
        if(isset($this->allowance))
        {
            $allowanceRow = $this->setAllowanceDisplay();
        }

        //Prepare examples row
        $examplesRow = null;

        //If examples array isset, set examples row
        if(isset($this->examples))
        {
            $examplesRow = $this->setExampleDisplay();
        }

        //Create Container
        $container = BootstrapGenerator::genContainer($titleRow.$formRow.$allowanceRow.$examplesRow, false, null, null, null);


        //Return content container
        return $container;
    }

    protected function setFooter()
    {
        /** Create form **/
        //Create submit button
        $submitButton = "<input type='submit' name='exemple' class='btn btn-info' value=\"Visualiser une plage d'exemples avec \">";

        //Create distance option inputs
        $distOption1 = "<option value='1'>1</option>";
        $distOption2 = "<option value='2'>2</option>";
        $distOption3 = "<option value='3'>3</option>";
        $distOption4 = "<option value='4'>4</option>";
        $distOption5 = "<option value='5'>5</option>";

        //Create distance select input
        $distSelect = "<label>".$submitButton."<select name='dist'>".$distOption1.$distOption2.$distOption3.$distOption4.$distOption5."</select> distance(s)</label>";

        //Create form
        $form = "<form method='post' action='"._URL_."'>".$distSelect."</form>";
        //Cretae form div
        $formDiv = BootstrapGenerator::genColDiv($form, "md-8", null, null, null);

        //Create form row
        $formRow = BootstrapGenerator::genRow($formDiv, null, "formRow", null);

        //return form
        return $formRow;
    }

    //Set allowance display function
    private function setAllowanceDisplay()
    {
        //Create allowance text to display
        $allowanceText = "<p class='text-info bg-info text-center'>Pour une distance de ".$this->distance."km avec un véhicule d'une puissance fiscale de " . $this->HPStringArray[$this->HP] . "
                           , vos indemnités kilométriques s'élevent à " . $this->allowance . " euros";

        //Create allowance row
        $allowanceRow = BootstrapGenerator::genRow($allowanceText, null, 'allowanceRow', null);

        //Return allowance row
        return $allowanceRow;
    }

    //Set examples display
    private function setExampleDisplay()
    {
        //Retrieve allowances from example
        $allowances = $this->examples->getAllowances();
        //Retrieve distances from example
        $distances = $this->examples->getRandomTable();
        //Set table head
        $Thead = array("Nombre de chevaux fiscaux");
        //Add values to table head
        foreach ($distances as $distance)
        {
            array_push($Thead, $distance . " km");
        }

        //Set table content
        $Tcontent = array();

        //Fill table content
        foreach ($allowances as $allowance)
        {
            //Create table row
            $Trow = array();

            //Add HP info
            array_push($Trow, $allowance[0]);

            for($i = 1; $i < sizeof($allowance); $i++)
            {
                array_push($Trow, $allowance[$i]->getAllowance() . " euros");
            }

            array_push($Tcontent, $Trow);
        }

        //Create table
        $table = BootstrapGenerator::genTable($Tcontent, "table-hover table-bordered", $Thead, true, null, null, null);

        //Return table
        return $table;
    }

    //Set HP function
    public function setHP($HP)
    {
        $this->HP = $HP;
    }

    //Set distance function
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    //Set allowance function
    public function setAllowance($allowance)
    {
        $this->allowance = $allowance;
    }

    //Set examples function
    public function setExamples($examples)
    {
        $this->examples= $examples;
    }
}
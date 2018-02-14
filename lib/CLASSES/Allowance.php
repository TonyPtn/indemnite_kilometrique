<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 14/02/2018
 * Time: 15:10
 */

class Allowance
{
    /** Attributes **/
    //HP var
    private $HP = null;
    //Distance var
    private $distance = null;
    //Distance index var
    private $distanceIndex = null;
    //Allowance variable
    private $allowance = null;

    /** Methods **/
    public function __construct($hp, $distance)
    {
        //Set HP and distance values
        $this->setHP($hp);
        $this->setDistance($distance);

        //Set distance index
        $this->distanceIndex = $this->getDistanceIndex();

        //Calculate allowance
        $this->calculateAllowance();

        //Check for additionnal coeff for allowance
        $this->checkForCoef();
    }

    //Get distance index function
    private function getDistanceIndex()
    {
        //Check for distance value
        if($this->distance <= 5000)
            return 0;
        elseif($this->distance <= 20000)
            return 1;
        else
            return 2;
    }

    //Allowance calculation
    private function calculateAllowance()
    {
        //Calculate allowance
        $this->allowance = _SIMPLE_COEFF_ARRAY_[$this->HP][$this->distanceIndex] * $this->distance;
    }

    //Additional coeff calcuclation
    private function checkForCoef()
    {
        if($this->distanceIndex == 1)
        {
            $this->allowance += _ADDITION_COEFF_ARRAY_[$this->HP];
        }
    }

    /** Setters **/
    //Set distance function
    private function setDistance($distance)
    {
        $this->distance = $distance;
    }

    //Set HP function
    private function setHP($HP)
    {
        $this->HP = $HP;
    }


    /** Getters **/
    //Get distance function
    public function getDistance()
    {
        return $this->distance;
    }

    //Get HP function
    public function getHP()
    {
        return $this->HP;
    }

    //Get allowance function
    public function getAllowance()
    {
        return $this->allowance;
    }
}
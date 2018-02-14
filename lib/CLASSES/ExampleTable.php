<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 14/02/2018
 * Time: 16:14
 */

class ExampleTable
{
    /** Attributes **/
    //Random values table
    private $randomTable;
    //Allowances array
    private $allowances;

    /** Methods **/
    public function __construct($randomTable)
    {
        //Set random table
        $this->randomTable = $randomTable;
        $this->setAllowances();
        $this->calcuteAllowances();
    }

    //Create allowances calulations
    public function calcuteAllowances()
    {
        //Create HP strings array
        $HPstringsArray = array();

        //Create allowances for each array each HP)
        for ($i = 0; $i < 5; $i++)
        {
            //Create HP array
            $HP = array();
            //Add HP string
            array_push($HP, _HP_STRINGS_[$i]);
            //Add allowance for each distance
            foreach ($this->randomTable as $dist)
            {
                array_push($HP, new Allowance($i, $dist));
            }

            //Add distance array to allowances
            array_push($this->allowances, $HP);
        }
    }

    /** Setters **/
    //Set random table
    public function setRandomTable($randomTable)
    {
        $this->randomTable = $randomTable;
    }

    //Set allowances array
    public function setAllowances()
    {
        //Create array with 5 array (each one assigned to HP)
        $this->allowances = array();
    }

    /** Getters **/
    public function getAllowances()
    {
        return $this->allowances;
    }

    public function getRandomTable()
    {
        return $this->randomTable;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 13:57
 */

class Controller
{
    private $model;
    private $view;
    //Allowance object
    private $allowance = null;
    //Example table
    private $exampleTable = null;

    public function __construct()
    {
        require_once _MODEL_;
        require_once _VIEW_;

        //Create model
        $this->model = new Model();
        //Create view
        $this->view = new View();

        //If form is submitted
        if(isset($_POST['submit']))
        {
            //Set allowance object
            $this->allowance = new Allowance($_POST['HP'], $_POST['distance']);

            //Set view vars
            $this->view->setHP($this->allowance->getHP());
            $this->view->setDistance($this->allowance->getDistance());
            $this->view->setAllowance($this->allowance->getAllowance());
        }
        elseif (isset($_POST['exemple']))
        {
            //Set example table object
            $this->exampleTable = new ExampleTable($this->generateRandomTable($_POST['dist']));
            //Set view examples
            $this->view->setExamples($this->exampleTable);
        }

        //Display page
        $this->view->displayView();
    }

    private function generateRandomTable($numOfRecords)
    {
        //Create array with 5 array (each one assigned to HP)
        $randomArray = array();

        //Add random values (between 1000 and 50 000)
        for ($n = 0; $n < $numOfRecords; $n++)
        {
            $array = array();
            array_push($randomArray, rand(1000, 50000));
        }

        //Return example table
        return $randomArray;
    }
}
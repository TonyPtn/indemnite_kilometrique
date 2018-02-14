<?php

/** General config **/

const _URL_ = "http://localhost/IFTS/Frais_kilometrique/";

const _CONTROLLER_ = "Controller.php";

const _VIEW_ = "View.php";

const _MODEL_ = "Model.php";

const _TOOLS_ = "tools/";

const _MVC_ = "lib/MVC/";

const _CLASSES_ = "lib/CLASSES/";

const _AUDIO_ = "Files/Audios/";

const _IMG_ = "Files/Images/";

/** Bootstrap genearator config **/

const _BOOTSTRAPDIR_ = _TOOLS_ . "bootstrapGenerator/bootstrap-3.3.7-dist/";

const _BOOTSTRAPCSS_ = "css/bootstrap.css";

const _BOOTSTRAPJS_ = "js/bootstrap.js";

const _JQUERY_ = "js/jquery-3.3.1.js";

/** Navbar config **/

const _NAVBAR_ = _TOOLS_ . "navbar/";

const _NAVBARCSS_ = _NAVBAR_ . "navBar.css";

/** Calculation constants */

const _SIMPLE_COEFF_ARRAY_ = array(
                                    //3 HP or less coeff
                                    array(0.41, 0.245, 0.285),
                                    //4 HP coeff
                                    array(0.493, 0.27, 0.332),
                                    //5 HP coeff
                                    array(0.543, 0.305, 0.364),
                                    //6 HP coeff
                                    array(0.568, 0.32, 0.382),
                                    //7 HP or more coeff
                                    array(0.595, 0.337, 0.401)
                                    );

const _ADDITION_COEFF_ARRAY_ = array(
                                    //3 HP or less coeff
                                    824,
                                    //4 HP coeff
                                    1082,
                                    //5 HP coeff
                                    1188,
                                    //6 HP coeff
                                    1244,
                                    //7 HP or more coeff
                                    1288,
                                    );

/** String constants **/
const _HP_STRINGS_ = array(
    "3 chevaux fiscaux ou moins",
    "4 chevaux fiscaux",
    "5 chevaux fiscaux",
    "6 chevaux fiscaux",
    "7 chevaux fiscaux ou plus"
);
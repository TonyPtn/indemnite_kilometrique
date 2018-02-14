<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 07/11/2017
 * Time: 14:49
 */

class BDD
{
    /**
     * Contient l'adresse de la base de données
     */
    private $dbhost;
    /**
     * Contient le nom de la base de données
     */
    private $dbname;
    /**
     * Contient le nom d'utilisateur de la base de données
     */
    private $dblogin;
    /**
     * Contient le mot de passe de l'utilisateur de la base de données
     */
    private $dbpass;
    /**
     * Contient l'objet mysqli
     */
    private $mysqli;
    /**
     * Contient le résultat de la dernière requête effectuée
     */
    private $res;


    /**
     * Initialise les attributs lors de l'instanciation
     */
    public function __construct()
    {
        $jsonCredentials = file_get_contents(_TOOLS_ . "/db_credentials.txt");

        $credentials = json_decode($jsonCredentials);

        $this->dbhost = $credentials->{"host"};
        $this->dbname = $credentials->{"database"};
        $this->dblogin = $credentials->{"login"};
        $this->dbpass = $credentials->{"pass"};

        $this->mysqli = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpass, $this->dbname);
        $this->mysqli->set_charset("utf-8");
        $this->mysqli->query("SET NAMES utf8");
    }

    /**
     * Méthode d'éxécution de requqête
     */
    public function BDD_request($request)
    {
        $this->res = $this->mysqli->query($request);
    }

    /**
     * Méthode de récupération de résultat de requête
     */
    public function BDD_request_result()
    {
        if(isset($this->res))
        {
            return $this->res->fetch_array();
        }
    }

    public function BDD_request_multiple_results()
    {
        if(isset($this->res))
        {
            $results = array();

            while($result = $this->res->fetch_assoc())
            {
                $results[] = $result;
            }

            return $results;
        }
    }

    /**
     * Méthode de récupération du resultat
     */
    public function getRes()
    {
        return $this->res;
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }

    /**
     * Méthode de déconnexion à la bas de données
     */
    public function disconnect()
    {
        $this->mysqli->close();
    }

    /**
     * Méthode de renvoi de chaîne traitée
     */
    public function returnEscapedString($string)
    {
        return mysqli_real_escape_string($this->mysqli, $string);
    }
}
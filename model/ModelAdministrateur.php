<?php

require_once("Model.php");

class ModelAdministrateur extends Model
{

    private $idAdmin;
    private $nomAdmin;
    private $prenomAdmin;
    private $emailAdmin;
    private $mdpAdmin;


    protected static $table = 'administrateur'; //nom de la table (bd)
    protected static $primary = 'idAdmin';


    public function __construct($idAdmin = NULL, $nomAdmin = NULL, $prenomAdmin = NULL, $emailAdmin = NULL, $mdpAdmin = NULL)
    {

        if (!is_null($idAdmin) && !is_null($nomAdmin) && !is_null($prenomAdmin) && !is_null($emailAdmin) && !is_null($mdpAdmin)) {

            $this->idAdmin = $idAdmin;
            $this->nomAdmin = $nomAdmin;
            $this->prenomAdmin = $prenomAdmin;
            $this->emailAdmin = $emailAdmin;
            $this->mdpAdmin = $mdpAdmin;
        }
    }
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function getNomAdmin()
    {
        return $this->nomAdmin;
    }

    public function getPrenomAdmin()
    {
        return $this->prenomAdmin;
    }

    public function getEmailAdmin()
    {
        return $this->emailAdmin;
    }

    public function getMdpAdmin()
    {
        return $this->mdpAdmin;
    }
}
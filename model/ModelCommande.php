<?php
require_once("Model.php");


class ModelCommande extends Model
{
    private $idCommande;
    private $dateCommande;
    private $nbrHeure;
    private $prixTotal;
    private $heureDebut;

    protected static $table = 'commande';
    protected static $table2 = 'annonceMateriel';
    protected static $table3 = 'client';
    protected static $primary = 'idCommande';
    protected static $primary2 = 'idMateriel';
    protected static $primary3 = 'idClient';


    public function __construct($idCommande = NULL, $dateCommande = NULL, $heureDebut = NULL, $nbrHeure = NULL, $prixTotal = NULL)
    {

        if (
            !is_null($idCommande) && !is_null($dateCommande) && !is_null($heureDebut) &&  !is_null($nbrHeure) && !is_null($prixTotal)
        ) {

            $this->idCommande = $idCommande;
            $this->dateCommande = $dateCommande;
            $this->heureDebut = $heureDebut;
            $this->nbrHeure = $nbrHeure;
            $this->prixTotal = $prixTotal;
        }
    }

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    public function getNbrHeure()
    {
        return $this->nbrHeure;
    }

    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    public function getIdMateriel()
    {
        return $this->idMateriel;
    }

    public function getNomMateriel()
    {
        return $this->nomMateriel;
    }
    public function getIdClient()
    {
        return $this->idClient;
    }



    public function getCategories()
    {
        return $this->categorie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getPhoto()
    {
        return $this->photo;
    }


    public function getPrixHeure()
    {
        return $this->prixHeure;
    }
}// end class modelCommand
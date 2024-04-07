<?php
require_once("Model.php");


class ModelContact extends Model
{
    private $idContact;
    private $nom;
    private $prenom;
    private $email;
    private $objet;
    private $message;
    private $dateAjout;

    protected static $table = 'contact';
    protected static $primary = 'idContact';



    public function __construct($idContact = NULL, $nom = NULL, $prenom = NULL, $email = NULL, $objet = NULL, $message = NULL, $dateAjout = NULL)
    {

        if (
            !is_null($idContact) && !is_null($nom) && !is_null($prenom) && !is_null($email) && !is_null($objet) && !is_null($message) && !is_null($dateAjout)
        ) {

            $this->idContact = $idContact;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->objet = $objet;
            $this->message = $message;
            $this->dateAjout = $dateAjout;
        }
    }

    public function getIdContact()
    {
        return $this->idContact;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getobjet()
    {
        return $this->objet;
    }


    public function getMessage()
    {
        return $this->message;
    }

    public function getDateAjout()
    {
        return $this->dateAjout;
    }
}
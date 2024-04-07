<?php

require_once("Model.php");

class ModelClient extends Model
{

  private $idClient;
  private $nom;
  private $prenom;
  private $emailClient;
  private $mdpClient;
  private $telephone;
  private $sexe;
  protected static $table = 'client'; //nom de la table (bd)
  protected static $table2 = 'commande'; //nom de la table (bd)
  protected static $table3 = 'annoncemateriel'; //nom de la table (bd)
  protected static $primary = 'idClient';


  public function __construct($idClient = NULL, $nom = NULL, $prenom = NULL, $emailClient = NULL, $mdpClient = NULL, $telephone = NULL, $sexe = NULL)
  {

    if (!is_null($nom) && !is_null($prenom) && !is_null($emailClient) && !is_null($mdpClient) && !is_null($telephone) && !is_null($sexe)) {

      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->emailClient = $emailClient;
      $this->mdpClient = $mdpClient;
      $this->telephone = $telephone;
      $this->sexe = $sexe;
    }
  }
  public function getIdClient()
  {
    return $this->idClient;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getEmailClient()
  {
    return $this->emailClient;
  }

  public function getMdpClient()
  {
    return $this->mdpClient;
  }

  public function getTelephone()
  {
    return $this->telephone;
  }
  public function getSexe()
  {
    return $this->sexe;
  }
} //ends class 
<?php
require_once("Model.php");

class ModelAnnonceMateriel extends Model
{
  public $idMateriel;
  private $nomMateriel;
  private $categories;
  private $description;
  private $adresse;
  private $photo;
  private $dateAjout;
  private $prixHeure;
  private $etat;






  protected static $table = 'annonceMateriel'; //nom de la table (bd)
  protected static $table2 = 'client';
  protected static $table3 = 'commande';
  protected static $primary2 = 'idClient';
  protected static $primary = 'idMateriel';


  public function __construct(
    $idMateriel = NULL,
    $nomMateriel = NULL,
    $categorie = NULL,
    $description = NULL,
    $adresse = NULL,
    $photo = NULL,
    $dateAjout = NULL,
    $prixHeure = NULL,
    $etat = NULL
  ) {

    if (
      !is_null($idMateriel) && !is_null($nomMateriel) && !is_null($categorie) && !is_null($description) && !is_null($adresse) && !is_null($photo)
      && !is_null($dateAjout) && !is_null($prixHeure) && !is_null($etat)
    ) {

      $this->idMateriel = $idMateriel;
      $this->nomMateriel = $nomMateriel;
      $this->categorie = $categorie;
      $this->description = $description;
      $this->adresse = $adresse;
      $this->photo = $photo;
      $this->dateAjout = $dateAjout;
      $this->prixHeure = $prixHeure;
      $this->etat = $etat;
    }
  }


  public function getIdMateriel()
  {
    return $this->idMateriel;
  }

  public function getNomMateriel()
  {
    return $this->nomMateriel;
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

  public function getDateAjout()
  {
    return $this->dateAjout;
  }
  public function getPrixHeure()
  {
    return $this->prixHeure;
  }

  public function getEtat()
  {
    return $this->etat;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getIdClient()
  {
    return $this->idClient;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getEmailClient()
  {
    return $this->emailClient;
  }

  public function getTelephone()
  {
    return $this->telephone;
  }
}// fin classe  ModelAnnonceMateriel
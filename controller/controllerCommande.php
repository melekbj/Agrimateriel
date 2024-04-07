<?php


// $controller = commande;

require_once("{$ROOT}{$DS}model{$DS}ModelCommande.php"); // chargement du modèle commande
require_once("{$ROOT}{$DS}model{$DS}ModelAnnonceMateriel.php");

if (isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else $action = "create";



switch ($action) {

        // *************************************************
        // ****************************   affiche formulaire de commande************************************************************************
        // ******************************************************************************* */
    case "create":

        $connexion = Model::init();
        $idMateriel = $_REQUEST['idMateriel'];
        $tab = ModelAnnonceMateriel::select3($idMateriel);
        $pagetitle = "Passer Commande";
        $view = "create";
        require("{$ROOT}{$DS}view{$DS}view.php");
        break;


        // *************************************************
        // ****************************   envoyer  les données du commande à la confirmation ************************************************************************
        // ******************************************************************************* */

    case "envoyer":

        if (
            isset($_REQUEST['dateCommande']) && isset($_REQUEST['heureDebut']) && isset($_REQUEST['nbrHeure'])
        ) {
            $idCommande = "0";
            $dateCommande = $_REQUEST["dateCommande"];
            $heureDebut = $_REQUEST["heureDebut"];
            $nbrHeure = $_REQUEST["nbrHeure"];
            $idClient = $_SESSION['idClient'];
            $idMateriel = $_REQUEST['idMateriel'];
            $prixTotal = "0";

            $connexion = Model::init();

            $tab = ModelAnnonceMateriel::select3($idMateriel);

            $pagetitle = "confirmation de commande";
            $view = 'confirmation';
            require("{$ROOT}{$DS}view{$DS}view.php");
        }


        // *************************************************
        // ****************************  insertion de la commande  ************************************************************************
        // ******************************************************************************* */


    case "insert":
        if (
            isset($_REQUEST['dateCommande']) && isset($_REQUEST['heureDebut']) && isset($_REQUEST['nbrHeure'])
        ) {
            $connexion = Model::init();
            $idMateriel = $_REQUEST['idMateriel'];
            $idCommande = "0";
            $dateCommande = $_REQUEST["dateCommande"];
            $heureDebut = $_REQUEST["heureDebut"];
            $nbrHeure = $_REQUEST["nbrHeure"];
            $idClient = $_SESSION['idClient'];



            $c = new ModelCommande($idCommande, $dateCommande, $heureDebut, $nbrHeure, $prixTotal, $idMateriel, $idClient);
            $tab_commande = array(
                "idCommande" => $idCommande,
                "dateDebut" => $dateCommande,
                "heureDebut" => $heureDebut,
                "nbrHeure" => $nbrHeure,
                "prixTotal" => $prixTotal,
                "idMateriel" => $idMateriel,
                "idClient" => $idClient
            );

            $c->insert($tab_commande);

            $_SESSION['flash']['insertCommande'] = "votre commande a été envoyée ";
        }
        $pagetitle = "Liste des matériels";
        header('Location: index.php?controller=annonceMateriel&action=readAll');
        break;
}
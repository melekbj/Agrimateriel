<?php
    //$controller=administrateur
;

require_once("{$ROOT}{$DS}model{$DS}ModelAdministrateur.php"); // chargement du modèle annonceMateriel 

if (isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else $action = "connect";

switch ($action) {

    case "create":
        $pagetitle = "create administrateur";
        $view = "create";
        require("{$ROOT}{$DS}view{$DS}view.php");
        break;

    case "created":
        if (
            isset($_REQUEST['idAdmin']) &&
            isset($_REQUEST['nomAdmin']) && isset($_REQUEST['prenomAdmin']) && isset($_REQUEST['emailAdmin']) && isset($_REQUEST['mdpAdmin'])
        ) {
            $idAdmin = $_REQUEST["idAdmin"];
            $nomAdmin = $_REQUEST["nomAdmin"];
            $prenomAdmin = $_REQUEST["prenomAdmin"];
            $emailAdmin = $_REQUEST["emailAdmin"];
            $mdpAdmin = $_REQUEST["mdpAdmin"]; // crypter le mot passe en 35 caractére 

            $connexion = Model::init();

            $a = new ModelAdministrateur($idAdmin, $nomAdmin, $prenomAdmin, $emailAdmin, $mdpAdmin);
            $tab_admin = array(
                "idAdmin" => $idAdmin,
                "nomAdmin" => $nomAdmin,
                "prenomAdmin" => $prenomAdmin,
                "emailAdmin" => $emailAdmin,
                "mdpAdmin" => $mdpAdmin,

            );
            $a->insert($tab_admin);
            $tabl = ModelAdministrateur::getAll();
        } //end if
        $pagetitle = "Liste des administrateurs";
        $_SESSION['flash']['create'] = "L'administrateur a été ajouter";
        $view = "readAll";
        require("{$ROOT}{$DS}view{$DS}view.php");
        break;



    case "readAll":
        $connexion = Model::init();
        $tabl = ModelAdministrateur::getAll();
        $pagetitle = "Liste des administrateurs";
        $view = "readAll";
        require("{$ROOT}{$DS}view{$DS}view.php");

        break;


    case "connect":
        $pagetitle = "connexion admin";
        $view = "connect";
        require("{$ROOT}{$DS}view{$DS}view.php");
        break;


    case "connected":
        $connexion = Model::init();
        if (isset($_REQUEST['email']) && isset($_REQUEST['mdp'])) {
            $emailAdmin = $_REQUEST["email"];
            $mdpAdmin = $_REQUEST["mdp"];

            $tab = array(
                "emailAdmin" => $emailAdmin,
                "mdpAdmin" => $mdpAdmin
            );


            $rep = ModelAdministrateur::verifConxAdmin($emailAdmin, $mdpAdmin);

            if ($rep == NULL) {
                $pagetitle = "Connexion";
                $_SESSION['flash']['connectClient'] = "L'adresse e-mail ou le mot de passe est invalide. Veuillez ressayer";
                $view = 'connect';
            } else {

                // affichage  les informations de l'admin connectée 
                foreach ($rep as $user) {
                    $idAdmin = $user->getIdAdmin();
                    $nomAdmin = $user->getNomAdmin();
                    $prenomAdmin = $user->getPrenomAdmin();
                }
                // enregistrer les informations de l'admin dans la  session 
                $_SESSION['idAdmin'] = $idAdmin;
                $_SESSION['nomAdmin'] = $nomAdmin;
                $_SESSION['prenomAdmin'] = $prenomAdmin;
            }
            $tabl = ModelAdministrateur::getAll();
            $pagetitle = "Liste des client";
            header("Location: index.php?controller=client&action=readAll&admin=1");
        }
        break;

    case "deconnexion":
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        $view = "connect";
        $pagetitle = "connexion";
        require_once("{$ROOT}{$DS}view{$DS}view.php");
        break;



    case "update":
        if (isset($_REQUEST['idAdmin'])) {

            $idAdmin = $_REQUEST['idAdmin'];
            $connexion = Model::init();
            $up = ModelAdministrateur::select2($idAdmin);

            if ($up != null) {
                $pagetitle = "Modifier l'administrateur";
                $view = "update";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }
        }
        break;


    case "updated":
        if (
            isset($_REQUEST['idAdmin']) && isset($_REQUEST['nomAdmin']) && isset($_REQUEST['prenomAdmin']) && isset($_REQUEST['emailAdmin']) && isset($_REQUEST['mdpAdmin'])
        ) {
            $oldid = $_REQUEST['idAdmin'];
            $tab = array(
                "idAdmin" => $_REQUEST["idAdmin"],
                "nomAdmin" => $_REQUEST['nomAdmin'],
                "prenomAdmin" => $_REQUEST['prenomAdmin'],
                "emailAdmin" => $_REQUEST['emailAdmin'],
                "mdpAdmin" => $_REQUEST['mdpAdmin']

            );

            $connexion = Model::init();
            $u = ModelAdministrateur::update($tab, $oldid);

            $pagetitle = "Liste des administrateurs";
            $tabl = ModelAdministrateur::getAll();
            $_SESSION['flash']['update'] = "L'administrateur a été bien modifier";
            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");
        }
        break;


    case "delete":
        if (isset($_REQUEST['idAdmin'])) {
            $idAdmin = $_REQUEST['idAdmin'];
            $connexion = Model::init();
            $del = ModelAdministrateur::select2($idAdmin);
            if ($del != null) {
                $del = ModelAdministrateur::delete($idAdmin);
            }
            $tabl = ModelAdministrateur::getAll();
            $_SESSION['flash']['delet'] = "L'administrateur a été bien supprimer";
            $pagetitle = "Liste des administrateurs";

            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");
        }
        break;
}
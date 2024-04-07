<?php


// $controller = commande;

require_once("{$ROOT}{$DS}model{$DS}ModelContact.php"); // chargement du modèle contact


if (isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else $action = "create";


if (isset($_GET['admin']) && isset($_GET['admin']) == 1) {

    switch ($action) {

        case "readAll":
            $connexion = Model::init();
            $tab_contact = ModelContact::getAll();
            $pagetitle = "Les contacts";
            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");

            break;
    }
} else {



    switch ($action) {

        case "create":
            $pagetitle = "Contact";
            $view = "create";
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;


        case "contacter":
            if (isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['email']) && isset($_REQUEST['objet']) && isset($_REQUEST['message'])) {

                $idContact = "0";
                $nom = $_REQUEST["nom"];
                $prenom = $_REQUEST["prenom"];
                $email = $_REQUEST["email"];
                $objet =  $_REQUEST["objet"];
                $message = $_REQUEST["message"];
                $dateAjout = date('Y-m-d H:i:s');

                $connexion = Model::init();
                $c = new ModelContact($idContact, $nom, $prenom, $email, $objet, $message, $dateAjout);
                $tab_contact = array(
                    "idContact" => "0",
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "email" => $email,
                    "objet" => $objet,
                    "message" => $message,
                    "dateAjout" => $dateAjout
                );
                $c->insert($tab_contact);
                header('Location: index.php?controller=client&action=accueil');
            }
    }
}
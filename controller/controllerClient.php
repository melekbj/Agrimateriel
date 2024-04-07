<?php


//$controller=client; 

require_once("{$ROOT}{$DS}model{$DS}ModelClient.php"); // chargement du modèle client 
require_once("{$ROOT}{$DS}model{$DS}ModelAnnonceMateriel.php");
require_once("{$ROOT}{$DS}model{$DS}ModelCommande.php");


if (isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else $action = "accueil";

//ken 3ta action f url yemchi ye5demha makenech bch ye5dem readAll 

// **************les actions de l'admin ****************************

if (isset($_GET['admin']) && isset($_GET['admin']) == 1) {

    switch ($action) {

        case "readAll":
            $pagetitle = "Liste des clients";


            $connexion = Model::init();
            $tab = ModelClient::getAll();
            $pagetitle = "Les clients";
            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");

            break;

        case "create":
            $pagetitle = "ajouter un utilisateur";
            $view = "create";
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;


        case "created":
            if (
                isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['emailClient']) && isset($_REQUEST['mdpClient']) && isset($_REQUEST['telephone'])
                && isset($_REQUEST['sexe'])
            ) {

                $idClient = "0";
                $nom = $_REQUEST["nom"];
                $prenom = $_REQUEST["prenom"];
                $emailClient = $_REQUEST["emailClient"];
                $mdpCl = $_REQUEST["mdpClient"];
                $mdpClient = md5($mdpCl); // crypter le mot passe en 35 caractére 
                $telephone =  $_REQUEST["telephone"];
                $sexe = $_REQUEST["sexe"];


                $connexion = Model::init();
                $recherche = ModelClient::select2($emailClient);
                if ($recherche == null) {
                    $u = new ModelClient($idClient, $nom, $prenom, $emailClient, $mdpClient, $telephone, $sexe);
                    $tab = array(
                        "idClient" => "0",
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "emailClient" => $emailClient,
                        "mdpClient" => $mdpClient,
                        "telephone" => $telephone,
                        "sexe" => $sexe,
                    );

                    $u->insert($tab);
                    $tab = ModelClient::getAll();
                    $_SESSION['flash']['ajout'] = "Le client a été ajouter";

                    $pagetitle = "Les clients";
                    $view = 'readAll';
                    require("{$ROOT}{$DS}view{$DS}view.php");
                }
            }
            break;


        case "update":
            if (isset($_REQUEST['idClient'])) {

                $idClient = $_REQUEST['idClient'];

                $connexion = Model::init();
                $up = ModelClient::select2($idClient);
                if ($up != null) {
                    $pagetitle = "Modifier l'utilisateur";
                    $view = "update";
                    require("{$ROOT}{$DS}view{$DS}view.php");
                }
            }
            break;

        case "updated":
            if (
                isset($_REQUEST['idClient']) && isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['emailClient'])
                && isset($_REQUEST['mdpClient'])  && isset($_REQUEST['telephone']) && isset($_REQUEST['sexe'])
            ) {
                $oldid = $_REQUEST['idClient'];
                $tab = array(

                    "idClient" => $_REQUEST["idClient"],
                    "nom" => $_REQUEST['nom'],
                    "prenom" => $_REQUEST['prenom'],
                    "emailClient" => $_REQUEST['emailClient'],
                    "mdpClient" => md5($_REQUEST['mdpClient']),
                    "telephone" => $_REQUEST['telephone'],
                    "sexe" => $_REQUEST['sexe']

                );

                $connexion = Model::init();
                $u = ModelClient::update($tab, $oldid);

                $pagetitle = "Utilisateur modifié";
                $tab = ModelClient::getAll();
                $_SESSION['flash']['modif'] = "Le client a été bien modifier";

                $view = "readAll";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }
            break;


        case "delete":

            if (isset($_REQUEST['idClient'])) {
                $idClient = $_REQUEST['idClient'];
                $connexion = Model::init();
                $del = ModelClient::select2($idClient);

                if ($del != null) {
                    $del = ModelClient::delete2($idClient);
                }
                $tab = ModelClient::getAll();
                $_SESSION['flash']['suppresion'] = "Le client a été bien supprimer";
                $pagetitle = "Les clients";
                $view = 'readAll';
                require("{$ROOT}{$DS}view{$DS}view.php");
            }

            break;
    } //end switch 
} else



    // **************les actions de clients ****************************
    switch ($action) {


            /***************************************
         * ****************************   Create client  affiche formulaire inscrit******************************************************************************
         ******************************************************************************* */

        case "create":
            $pagetitle = "Inscription client";
            $view = "create";
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;





        case "created":
            if (
                isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['emailClient']) && isset($_REQUEST['mdpClient']) && isset($_REQUEST['telephone'])
                && isset($_REQUEST['sexe'])
            ) {



                $idClient = "0";
                $nom = $_REQUEST["nom"];
                $prenom = $_REQUEST["prenom"];
                $emailClient = $_REQUEST["emailClient"];
                $mdpCl = $_REQUEST["mdpClient"];
                $mdpClient = md5($mdpCl); // crypter le mot passe en 35 caractére 
                $telephone =  $_REQUEST["telephone"];
                $sexe = $_REQUEST["sexe"];


                $connexion = Model::init();
                $rep = ModelClient::select($emailClient);
                if ($rep == NULL) {
                    $u = new ModelClient($idClient, $nom, $prenom, $emailClient, $mdpClient, $telephone, $sexe);
                    $tab = array(
                        "idClient" => "0",
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "emailClient" => $emailClient,
                        "mdpClient" => $mdpClient,
                        "telephone" => $telephone,
                        "sexe" => $sexe,
                    );



                    $u->insert($tab);

                    $rep = ModelClient::select($emailClient);


                    // affichage  les informations de client connectée 
                    foreach ($rep as $user) {
                        $idClient = $user->getIdClient();
                        $nom = $user->getNom();
                        $prenom = $user->getPrenom();
                        $emailClient = $user->getEmailClient();
                        $mdpClient = $user->getMdpClient();
                        $telephone = $user->getTelephone();
                        $sexe = $user->getSexe();
                    }


                    // enregistrer les donnes de clients dans le session 
                    $_SESSION['idClient'] = $idClient;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['emailClient'] = $emailClient;
                    $_SESSION['mdpClient'] = $mdpClient;
                    $_SESSION['telephone'] = $telephone;
                    $_SESSION['sexe'] = $sexe;


                    //affichage des annonces de clients connecté 
                    $id = $_SESSION['idClient'];
                    $tab = ModelAnnonceMateriel::readAnnonceClient($id);


                    //affichage les commande de clients connecté 
                    $tab_commande = ModelCommande::readCommandeClient($id);

                    //   enregetrer la msg de succes dans la session

                    $_SESSION['flash']['insertCompte'] = "Bienvenue " . $_SESSION['nom'] . "  " . $_SESSION['prenom'] . " , votre compte a été créer ";
                    $pagetitle = "mon profil";
                    $view = 'profil';
                    require("{$ROOT}{$DS}view{$DS}view.php");
                } else
                    $_SESSION['flash']['email existe'] = "Votre e-mail est existe déjà ";
                $view = "create";
                $pagetitle = "Inscription";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }
            break;






            /***************************************
             * ****************************   affichage page connexion client ******************************************************************************
             ******************************************************************************* */
        case "connect":
            $pagetitle = "connexion client";
            $view = "connect";
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;



            /***************************************
             * ****************************   connexon client (avec session ) authentification  ******************************************************************************
             ******************************************************************************* */

        case "connected":
            if (isset($_REQUEST['email']) && isset($_REQUEST['mdp'])) {
                $email = $_REQUEST["email"];
                $mdp = md5($_REQUEST["mdp"]);

                $tab = array(
                    "emailClient" => $email,
                    "mdpClient" => $mdp,
                );

                $connexion = Model::init();
                $rep = ModelClient::verifConx($email, $mdp);

                if ($rep == NULL) {
                    $pagetitle = "Connexion";
                    $_SESSION['flash']['connectClient'] = "L'adresse e-mail ou le mot de passe est invalide. Veuillez ressayer";
                    $view = 'connect';
                } else {


                    // affichage  les informations de client connectée 
                    foreach ($rep as $user) {
                        $idClient = $user->getIdClient();
                        $nom = $user->getNom();
                        $prenom = $user->getPrenom();
                        $emailClient = $user->getEmailClient();
                        $mdpClient = $user->getMdpClient();
                        $telephone = $user->getTelephone();
                        $sexe = $user->getSexe();
                    }

                    // enregistrer les informations de client dans la  session 
                    $_SESSION['idClient'] = $idClient;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['emailClient'] = $emailClient;
                    $_SESSION['mdpClient'] = $mdpClient;
                    $_SESSION['telephone'] = $telephone;
                    $_SESSION['sexe'] = $sexe;


                    //pour l'affichage des annonces client connectée 
                    $id = $_SESSION['idClient'];
                    $tab = ModelAnnonceMateriel::readAnnonceClient($id);
                    $tab_commande = ModelCommande::readCommandeClient($id);

                    $pagetitle = "mon profil";
                    $view = 'profil';
                    $_SESSION['flash']['profilClient'] = "Bienvenue dans notre site";
                }
            }

            require_once("{$ROOT}{$DS}view{$DS}view.php");
            break;




            /***************************************
             * ****************************   deconnexion  ******************************************************************************
             ******************************************************************************* */

        case "deconnexion":


            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();

            require_once("{$ROOT}{$DS}view{$DS}accueil.php");
            break;



            /***************************************
             * ****************************   ouvre page a propos   ******************************************************************************
             ******************************************************************************* */


        case "apropos":
            $pagetitle = "a propos";
            require_once("{$ROOT}{$DS}view{$DS}apropos.php");
            break;



            /***************************************
             * ****************************   ouvre page accueil ******************************************************************************
             ******************************************************************************* */
        case "accueil":
            $pagetitle = "accueil";
            require_once("{$ROOT}{$DS}view{$DS}accueil.php");
            break;

            /***************************************
             * ****************************   affichage profil client ******************************************************************************
             ******************************************************************************* */

        case "profil":
            $pagetitle = "Mon profil";
            $view = "profil";
            if (isset($_SESSION['idClient'])) {
                $id = $_SESSION['idClient'];

                $connexion = Model::init();
                $tab = ModelAnnonceMateriel::readAnnonceClient($id);
                $tab_commande = ModelCommande::readCommandeClient($id);
            }
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;




        case "update":
            if (isset($_SESSION['idClient'])) {
                $idClient = $_SESSION['idClient'];
                $connexion = Model::init();
                $up = ModelClient::select2($idClient);
                if ($up != null) {
                    $pagetitle = "Paramètres généraux du compte";
                    $view = "profil";
                    require("{$ROOT}{$DS}view{$DS}view.php");
                }
            }
            break;


        case "updated":

            if (
                isset($_REQUEST['idClient']) && isset($_REQUEST['nom']) && isset($_REQUEST['prenom']) && isset($_REQUEST['emailClient'])
                && isset($_REQUEST['mdpClient'])  && isset($_REQUEST['telephone']) && isset($_REQUEST['sexe'])
            ) {
                $oldid = $_SESSION['idClient'];
                $tab = array(

                    "idClient" => $_REQUEST["idClient"],
                    "nom" => $_REQUEST['nom'],
                    "prenom" => $_REQUEST['prenom'],
                    "emailClient" => $_REQUEST['emailClient'],
                    "mdpClient" => md5($_REQUEST['mdpClient']),
                    "telephone" => $_REQUEST['telephone'],
                    "sexe" => $_REQUEST['sexe']

                );
                $connexion = Model::init();
                $u = ModelClient::update($tab, $oldid);

                // // enregistrer les informations de client dans la  session 

                $_SESSION['nom'] = $_REQUEST['nom'];
                $_SESSION['prenom'] = $_REQUEST['prenom'];
                $_SESSION['emailClient'] = $_REQUEST['emailClient'];
                $_SESSION['mdpClient'] = $_REQUEST['mdpClient'];
                $_SESSION['telephone'] = $_REQUEST['telephone'];
                $_SESSION['sexe'] = $_REQUEST['sexe'];

                $_SESSION['flash']['updateCompte'] = "Mise a jours de compte";
                $id = $_SESSION['idClient'];

                $tab = ModelAnnonceMateriel::readAnnonceClient($id);
                $tab_commande = ModelCommande::readCommandeClient($id);

                $pagetitle = "Utilisateur modifié";
                $view = "profil";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }
            break;
            //ends switch
    }
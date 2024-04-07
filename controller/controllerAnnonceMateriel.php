<?php
//$controller=annonceMateriel; 

require_once("{$ROOT}{$DS}model{$DS}ModelAnnonceMateriel.php"); // chargement du modèle annonceMateriel 

if (isset($_REQUEST['action']))
    $action = $_REQUEST['action'];
else $action = "readAll";

if (isset($_GET['admin']) && isset($_GET['admin']) == 1) {

    switch ($action) {

        case "readAll":
            $connexion = Model::init();
            $tab_materiel = ModelAnnonceMateriel::selectJoin1(); //appel au modèle pour gerer la BD
            $pagetitle = "Liste des materiels";
            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");

            break;
        case "accepte":
            if (isset($_REQUEST['idMateriel'])) {
                $idMateriel = $_REQUEST['idMateriel'];
                $etat = "1";
                $connexion = Model::init();
                $u = ModelAnnonceMateriel::update_etat($idMateriel, $etat);
                $tab_materiel = ModelAnnonceMateriel::selectJoin1(); //appel au modèle pour gerer la BD
                $_SESSION['flash']['accepte'] = "L'annonce a été accepter";
                $pagetitle = "Liste des materiels";
                $view = "readAll";
                require("{$ROOT}{$DS}view{$DS}view.php");
                break;
            }

        case "refuse":
            if (isset($_REQUEST['idMateriel'])) {
                $idMateriel = $_REQUEST['idMateriel'];
                $etat = "2";
                $connexion = Model::init();
                $u = ModelAnnonceMateriel::update_etat($idMateriel, $etat);
                $tab_materiel = ModelAnnonceMateriel::selectJoin1(); //appel au modèle pour gerer la BD
                $_SESSION['flash']['refuse'] = "L'annonce a été refuser";
                $pagetitle = "Liste des materiels";
                $view = "readAll";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }
    }
} else {

    switch ($action) {

            // *************************************************
            // ****************************   affiche tous les annonces de materiels ************************************************************************
            // ******************************************************************************* */
        case "readAll":

            $connexion = Model::init();
            $tab_materiel = ModelAnnonceMateriel::selectJoin1(); //appel au modèle pour gerer la BD
            $pagetitle = "Liste des materiels";
            $view = "readAll";
            require("{$ROOT}{$DS}view{$DS}view.php");

            break;




            // *************************************************
            // **************************** affiche formulaire creation annonce Materiel************************************************************************
            // ******************************************************************************* */
        case "create":
            $pagetitle = "création annonce";
            $view = "create";
            require("{$ROOT}{$DS}view{$DS}view.php");
            break;




            /***************************************
             * ****************************   creation de l'annoonce de materiel ******************************************************************************
             ******************************************************************************* */

        case "created":

            if (isset($_REQUEST['nom']) && isset($_REQUEST['categorie']) && isset($_REQUEST['description'])   && isset($_REQUEST['adresse']) && isset($_REQUEST['prixHeure'])) {

                $uploaddir = "{$ROOT}{$DS}image{$DS}uploads{$DS}"; //nom de dossier
                $ren =  "id" . $_SESSION['idClient'] . "_" . date('dmYHis'); //renommer image avec :idClient.date
                $newfilename = $ren . "_" . str_replace(" ", "", basename($_FILES["photo"]["name"]));
                move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir . $newfilename);

                $idMateriel = "0";
                $nomMateriel = $_REQUEST["nom"];
                $categorie = $_REQUEST["categorie"];
                $description = $_REQUEST["description"];
                $adresse = $_REQUEST["adresse"];
                $photo = $newfilename;
                $dateAjout = date('Y-m-d H:i:s');
                $prixHeure = $_REQUEST["prixHeure"];
                $etat = "0";
                $idClient = $_SESSION['idClient'];

                $connexion = Model::init();
                $m = new ModelAnnonceMateriel($idMateriel, $nomMateriel, $categorie, $description, $adresse, $photo, $dateAjout, $prixHeure, $etat, $idClient);
                $tab_materiel = array(
                    "idMateriel" => $idMateriel,
                    "nomMateriel" => $nomMateriel,
                    "categorie" => $categorie,
                    "description" => $description,
                    "adresse" => $adresse,
                    "photo" => $photo,
                    "dateAjout" => $dateAjout,
                    "prixHeure" => $prixHeure,
                    "etat" => $etat,
                    "idClient" => $idClient
                );
                $m->insert($tab_materiel);
                $_SESSION['flash']['insertAnnonce'] = "Votre annonce a été envoyée à l'administrateur,   vous devez attendre l'acceptation de l'annonce. ";

                $tab_materiel = ModelAnnonceMateriel::selectJoin1();
                $id = $_SESSION['idClient'];
                $tab = ModelAnnonceMateriel::readAnnonceClient($id);

                $pagetitle = "Liste des matériels";
                $view = "readAll";
                require("{$ROOT}{$DS}view{$DS}view.php");
                break;
            }






        case "update":
            if (isset($_REQUEST['idMateriel'])) {
                $idMateriel = $_REQUEST['idMateriel'];
                $connexion = Model::init();
                $up = ModelAnnonceMateriel::select2($idMateriel);
                if ($up != null) {
                    $pagetitle = "Modifier l'annoce ";
                    $view = "update";
                    require("{$ROOT}{$DS}view{$DS}view.php");
                }
            }
            break;

        case "updated":

            if (
                isset($_REQUEST['idMateriel']) && isset($_REQUEST['nom']) && isset($_REQUEST['categorie']) && isset($_REQUEST['description'])
                && isset($_REQUEST['adresse'])  && isset($_REQUEST['prixHeure'])
            ) {
                $uploaddir = "{$ROOT}{$DS}image{$DS}uploads{$DS}"; //nom de dossier
                $ren =  "id" . $_SESSION['idClient'] . "_" . date('dmYHis'); //renommer image avec :idClient.date
                $newfilename = $ren . "_" . str_replace(" ", "", basename($_FILES["photo"]["name"]));
                move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir . $newfilename);

                $oldid = $_REQUEST['idMateriel'];
                $tab = array(
                    "idMateriel" => $_REQUEST["idMateriel"],
                    "nomMateriel" => $_REQUEST["nom"],
                    "categorie" => $_REQUEST["categorie"],
                    "description" => $_REQUEST["description"],
                    "adresse" => $_REQUEST["adresse"],
                    "photo" => $newfilename,
                    "prixHeure" => $_REQUEST["prixHeure"],
                );
                $connexion = Model::init();

                $u = ModelAnnonceMateriel::update($tab, $oldid);
                $_SESSION['flash']['updateAnnonce'] = "Mise a jours de l'annonce";
                $pagetitle = "Mon profil ";

                header("Location: index.php?controller=client&action=profil");
            }
            break;




        case "delete":
            if (isset($_REQUEST['idMateriel'])) {
                $idMateriel = $_REQUEST['idMateriel'];

                echo $idMateriel;
                $connexion = Model::init();
                $del = ModelAnnonceMateriel::delete3($idMateriel);
                $pagetitle = "Mon profil ";

                header('Location: index.php?controller=client&action=profil');
                $_SESSION['flash']['deleteAnnonce'] = "L'annonce a été bien supprimée
                ";
            }
            break;


            //i*************************************************Rechercher**************************************************
            /***************************************************************************************************/
            /***************************************************************************************************/

        case "recherche":

            //recherche par nom, categorie, adresse
            if (!empty($_REQUEST['nom']) && ($_REQUEST['categorie'] != "Sélectionner une Categorie") && ($_REQUEST['adresse']) != "Sélectionner une ville") {
                $nomMateriel = $_REQUEST["nom"];
                $categorie = $_REQUEST["categorie"];
                $adresse = $_REQUEST["adresse"];
                $connexion = Model::init();
                $tab_materiel = ModelAnnonceMateriel::select_rech3($nomMateriel, $categorie, $adresse);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }


            //recherche par adresse et nom
            else   if (!empty($_REQUEST['nom']) && (($_REQUEST['adresse']) != "Sélectionner une ville") && (($_REQUEST['categorie']) == "Sélectionner une Categorie")) {
                $nomMateriel = $_REQUEST["nom"];
                $adresse = $_REQUEST["adresse"];
                $connexion = Model::init();
                $var1 = "nomMateriel";
                $var2 = "adresse";
                $tab_materiel = ModelAnnonceMateriel::select_rech2($nomMateriel, $adresse, $var1, $var2);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }


            //recherche par adresse et categorie
            else   if (empty($_REQUEST['nom']) && (($_REQUEST['adresse']) != "Sélectionner une ville") && (($_REQUEST['categorie']) != "Sélectionner une Categorie")) {
                $categorie = $_REQUEST["categorie"];
                $adresse = $_REQUEST["adresse"];
                $connexion = Model::init();
                $var1 = "categorie";
                $var2 = "adresse";
                $tab_materiel = ModelAnnonceMateriel::select_rech2($categorie, $adresse, $var1, $var2);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }


            // recherche par categorie et nom
            else    if (!empty($_REQUEST['nom']) && (($_REQUEST['adresse']) == "Sélectionner une ville") && (($_REQUEST['categorie']) != "Sélectionner une Categorie")) {
                $nomMateriel = $_REQUEST["nom"];
                $categorie = $_REQUEST["categorie"];
                $connexion = Model::init();
                $var1 = "nomMateriel";
                $var2 = "categorie";
                $tab_materiel = ModelAnnonceMateriel::select_rech2($nomMateriel, $categorie, $var1, $var2);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }


            // recherche par nom
            else       if (isset($_REQUEST['nom']) && (($_REQUEST['adresse']) == "Sélectionner une ville") && (($_REQUEST['categorie']) == "Sélectionner une Categorie")) {
                $nomMateriel = $_REQUEST["nom"];
                $connexion = Model::init();
                $var1 = "nomMateriel";
                $tab_materiel = ModelAnnonceMateriel::select_rech1($nomMateriel, $var1);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }


            //recherche par categorie
            else      if (empty($_REQUEST['nom']) && (($_REQUEST['adresse']) == "Sélectionner une ville") && (($_REQUEST['categorie']) != "Sélectionner une Categorie")) {
                $categorie = $_REQUEST["categorie"];
                $connexion = Model::init();
                $var1 = "categorie";
                $tab_materiel = ModelAnnonceMateriel::select_rech1($categorie, $var1);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }



            // recherche par adresse
            else     if (empty($_REQUEST['nom']) && (($_REQUEST['adresse']) != "Sélectionner une ville") && (($_REQUEST['categorie']) == "Sélectionner une Categorie")) {
                $adresse = $_REQUEST["adresse"];
                $connexion = Model::init();
                $var1 = "adresse";
                $tab_materiel = ModelAnnonceMateriel::select_rech1($adresse, $var1);
                if (empty($tab_materiel)) {
                    $_SESSION['erreur']['recherche'] = "Le matériel n’existe pas";
                }
                $view = "readAll";
                $pagetitle = "Liste des materiels";
                require("{$ROOT}{$DS}view{$DS}view.php");
            }

            break;
    } //ends switch 
}
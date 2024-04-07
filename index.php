<?php

$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;


$controleur_default = "client";

if (!isset($_REQUEST['controller']))
	$controller = $controleur_default;
else
	$controller = $_REQUEST['controller'];

switch ($controller) {


	case "client":
		require("{$ROOT}{$DS}controller{$DS}controllerClient.php");
		break;

	case "annonceMateriel":
		require("{$ROOT}{$DS}controller{$DS}controllerAnnonceMateriel.php");
		break;

	case "commande":
		require("{$ROOT}{$DS}controller{$DS}controllerCommande.php");
		break;

	case "administrateur":
		require("{$ROOT}{$DS}controller{$DS}controllerAdministrateur.php");
		break;

	case "contact":
		require("{$ROOT}{$DS}controller{$DS}controllerContact.php");
		break;
}
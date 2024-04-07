<?php
require_once("{$ROOT}{$DS}config{$DS}Conf.php");
session_start();
class Model
{

	//connexion à la base de donnée agrimateriel
	private static $pdo;
	protected static $table;
	protected static $table2;
	protected static $table3;
	protected static $primary;
	protected static $primary2;
	protected static $primary3;


	//function connexion à la base de données  
	public static function Init()
	{
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try {
			self::$pdo = new pdo("mysql:host=$host;dbname=$dbname", $login, $pass);
			//echo "connexion effectuée";

		} catch (PDOException $e) {
			die($e->getMessage());
			//echo "connexion n'est pas effectuée";
		}
	}


	/******************************** getAll (afficher tt les champs)*****************************************
	 * ********************************************************************************************
	 **************************************************************************************************/
	public static function getAll()
	{
		$SQL = "SELECT * FROM " . static::$table;
		$rep = Model::$pdo->query($SQL);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));

		//les données eli jebnehil men rep bch nrécuperiwha f model.esm Classe
		//PDP:FETCH =>Le mode de récupération doit être une des constantes PDO::FETCH_*.
		//Model => om de la class 
		//unfirst => First uppercase 
		return $rep->fetchAll();
	}




	/******************************** insert (ajouter)
	 * **********************************************************
	 **************************************************************************************************/

	public function insert($tab)
	{

		$sql = "INSERT INTO " . static::$table . " VALUES(";
		foreach ($tab as $cle => $valeur) {
			$sql .= " :" . $cle . ","; // : 3malneha bech ba3ed ki n3ayto lel  prepare temchi tet3awedh b les valeurs 
		}
		$sql = rtrim($sql, ",");
		$sql .= ");";
		// echo " <br> <br>" . $sql;
		$req1 = Model::$pdo->prepare($sql);
		$values = array();
		foreach ($tab as $cle => $valeur)
			$values[":" . $cle] = $valeur;
		$req1->execute($values);
		// print_r($req1);
	}






	/******************************** select avec un jointure (1)******************************************
	 * *******************************************************************************
	 **************************************************************************************************/

	public static function selectJoin1()
	{
		//select * from annonceMateriel,client  where client.idClient = annonceMateriel.idClient
		$SQL = "SELECT * from " . static::$table . "," . static::$table2 . " WHERE " . static::$table2 . "." . static::$primary2 . " = " . static::$table . "." . static::$primary2;
		$rep = Model::$pdo->query($SQL);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}





	/**************************************** connexion verifie si le client est deja inscrit ou non  ******************************************
	 * ***************************************************************************************************
	 **************************************************************************************************/
	public static function verifConx($email, $mdp)
	{
		$SQL = "SELECT * from " . static::$table . " WHERE '" . $email . "' = emailClient and '" . $mdp . "' = mdpClient";
		$rep = Model::$pdo->query($SQL);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}


	/**************************************** connexion verifie si l'admin  est deja inscrit ou non  ******************************************
	 * ***************************************************************************************************
	 **************************************************************************************************/
	public static function verifConxAdmin($email, $mdp)
	{
		$SQL = "SELECT * from " . static::$table . " WHERE '" . $email . "' = emailAdmin and '" . $mdp . "' = mdpAdmin";
		$rep = Model::$pdo->query($SQL);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}



	/******************************** affiche les annonces d'un seul client******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/

	public static function readAnnonceClient($cle_primaire)
	{ //SELECT * from   client,annonceMateriel WHERE annonceMateriel.idClient = 1  and annonceMateriel.idClient = client.idClient 
		$sql = "SELECT * from " . static::$table2 . " , " . static::$table . " WHERE " . static::$table . "." . static::$primary2 . "  =  " . $cle_primaire . "  and  " . static::$table . "." . static::$primary2 . " = " . static::$table2 . "." . static::$primary2;
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}

	public static function readCommandeClient($cle_primaire)
	{
		//select * from commande as co, client as c, annoncemateriel as a WHERE co.idClient=c.idClient and co.idMateriel=a.idMateriel commande.idClient=Client.idClient
		$sql = "SELECT * from " . static::$table . " , " . static::$table2 . " , " . static::$table3 . " WHERE " . static::$table . "." . static::$primary2  . " = " . static::$table2 . "." . static::$primary2 . " AND " . static::$table . "." . static::$primary3 . "=" . static::$table3 . "." . static::$primary3 . " AND " . static::$table . "." . static::$primary3  . " = " . $cle_primaire;
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}




	/******************************** selection  ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	public static function select($email)
	{
		$SQL = "SELECT * from " . static::$table . " WHERE '" . $email . "' = emailClient ";
		$rep = Model::$pdo->query($SQL);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}



	public static function select2($cle_primaire)
	{
		$sql = "SELECT * from " . static::$table . " WHERE " . static::$primary . "=:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));

		if ($req_prep->rowCount() == 0) {
			return null;
		} else {
			return  $req_prep->fetch();
		}
	}




	public static function update($tab, $cle_primaire)
	{
		$sql = "UPDATE " . static::$table . " SET";
		foreach ($tab as $cle => $valeur) {
			$sql .= " " . $cle . "=:new" . $cle . ",";
		}

		$sql = rtrim($sql, ",");
		$sql .= " WHERE " . static::$primary . "=:oldid;";

		$req_prep = Model::$pdo->prepare($sql);
		$values = array();

		foreach ($tab as $cle => $valeur) {
			$values[":new" . $cle] = $valeur;
		}
		$values[":oldid"] = $cle_primaire;
		$req_prep->execute($values);
		return $req_prep;
	}


	/******************************** suppression ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	//delete table simple
	public  static function delete($cle_primaire)
	{
		$sql = "DELETE FROM " . static::$table . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}

	//delete from 3 tables (pour la suppression de client)
	public  static function delete2($cle_primaire)
	{
		//delete from table commande
		$sql = "DELETE FROM " . static::$table2 . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();

		//delete from table annonceMateriel
		$sql = "DELETE FROM " . static::$table3 . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();

		//delete from table client
		$sql = "DELETE FROM " . static::$table . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}


	//delete from 2 tables (pour la suppression de l'annonce)
	public  static function delete3($cle_primaire)
	{
		//delete from table commande
		$sql = "DELETE FROM " . static::$table3 . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();

		//delete from table annonceMateriel
		$sql = "DELETE FROM " . static::$table . " WHERE " . static::$primary . " =:cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}




	/******************************** recherche par 3 critéres ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	public static function select_rech3($nomMateriel, $categorie, $adresse)
	{
		//SELECT * from annonceMateriel , client WHERE nomMateriel = 'sarra' AND categorie = 'tracteurs' AND adresse ='Kairouan' AND client.idClient = annonceMateriel.idClient

		$sql = "SELECT * from " . static::$table . " , " . static::$table2 . " WHERE nomMateriel ='" . $nomMateriel . "'  AND categorie =  '" . $categorie . "' AND adresse ='" . $adresse . "' AND " . static::$table2 . "." . static::$primary2 . " = " . static::$table . "." . static::$primary2;
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}


	/******************************** recherche par 2 critéres  ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	public static function select_rech2($nomMateriel, $adresse, $var1, $var2)
	{
		$sql = "SELECT * from " . static::$table . " , " . static::$table2 . " WHERE " . $var1 . " ='" . $nomMateriel . "' AND " . $var2 . " ='" . $adresse . "' AND " . static::$table2 . "." . static::$primary2 . " = " . static::$table . "." . static::$primary2;
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}



	/******************************** recherche par 1 critére  ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	public static function select_rech1($nomMateriel, $var1)
	{
		$sql = "SELECT * from " . static::$table . " , " . static::$table2 . " WHERE " . $var1 . " ='" . $nomMateriel . "' AND "  . static::$table2 . "." . static::$primary2 . " = " . static::$table . "." . static::$primary2;
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}

	/******************************** accepter annonce  ******************************************
	 * *******************************************************************************************
	 **************************************************************************************************/
	public static function update_etat($idMateriel, $etat)
	{
		$sql = "UPDATE " . static::$table . " SET etat = '" . $etat . "' WHERE  idMateriel= '" . $idMateriel . "'";
		$rep = Model::$pdo->query($sql);
		$rep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));
		return $rep->fetchAll();
	}



	public static function select3($cle_primaire)
	{
		$sql = "SELECT * from " . static::$table . " , " . static::$table2 . " WHERE " . static::$table . "." . static::$primary2 . "=" . static::$table2 . "." . static::$primary2 . " AND " . static::$table . "." . static::$primary . " = :cle_primaire";
		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model' . ucfirst(static::$table));

		if ($req_prep->rowCount() == 0) {
			return null;
		} else {
			return  $req_prep->fetch();
		}
	}
} //ends class model
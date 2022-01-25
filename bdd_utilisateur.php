<?php

function connexion(){

// spécifie votre login et le mot de passe ici 

	$host = "acer";
	$nomUtilisateur = "------";
	$motDePasse = "------";
	$name = $nomUtilisateur;

	//chaine de connexion pour PDO (ne pas modifier)

	$bdn = "mysql:host=$host;name=$name";

	//connexion au serveur de bases de données 

	$bd = new PDO($bdn, $nomUtilisateur, $motDePasse);

	return $bd;
}

function requete($bd, $requeteSQL){

	//appel de la methode query() sur l'objet de base de données
	//la requete est traité par le serveur et retourne un pointeur de résultat 

	$result = $bd->query($requeteSQL);

	//on demande à ce pointeur d'aller chercher toutes les données de résultat 
	//d'un coup on obtien un tableau de types tableaux associatifs (un par ling de la table)
	//note: dans le cas d'une insertion, on ne récupère pas le résultat

	if($result){
		$tableau = $result->fetchAll(PDO::FETCH_ASSOC);
		//on retourne ce tableau 
		return $tableau;
	}
}

function creation_table1(){
	$madb = connexion();
	$maRequeteCreation = "CREATE TABLE utilisateur (id integer AUTO_INCREMENT, nomUtilisateur varchar(20), motDePasse varchar(20), PRIMARY KEY(id)) CHARACTAR SET UTF8";
	$monResultat = requete($madb, $maRequeteCreation);
}

//insérer des données d'exemple dans la table 

function insertion_exemples(){
	$madb = connexion();
	$maRequeteCreation = "INSERT INTO utilisateur VALUES"
		. "(DEFAULT, 'admin1', 'admin1'),"
		. "(DEFAULT, 'admin2', 'admin2'),"
		. "(DEFAULT, 'admin3', 'admin3'),"
		. "(DEFAULT, 'admin4', 'admin4'),"
		. "(DEFAULT, 'admin5', 'admin5'),"
		. "(DEFAULT, 'admin6', 'admin6'),"
		. "(DEFAULT, 'admin7', 'admin7'),"
		. "(DEFAULT, 'admin8', 'admin8'),"
		. "(DEFAULT, 'admin9', 'admin9'),"
	$monResultat = requete($madb, $maRequeteCreation);


}
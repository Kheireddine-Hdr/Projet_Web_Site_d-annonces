<?php
//on informe le client qu'on va lui renvoyer des données au format JSON
header('content-type: application/json');
include('bdd.php');

function affichage(){
	$search = $_REQUEST['search'];
	$bd = connexion();
	$donnees = Array("annonce" => Array());
	$recherche = "'%$search%'";
	$requete = "SELECT * FROM annonce where titre like $recherche OR pseudo like $recherche";
	$query = $bd->query($requete);
	$donnees['annonce'] = $query->fetchAll(PDO::FETCH_ASSOC);

	return $donnees;
} 

$annonce = affichage();
//on informe le client que tout s'est bien passé (code 200)
http_response_code(200);

// on envoie les données encodées au format JSON, sur la sortie standard
echo json_encode($annonce);



?>
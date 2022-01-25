<?php
//on informe le client qu'on va lui envoyer les données en format JSON
header('Content-Type : application/json');


$nomUtilisateur = $_REQUEST['identifiant'];
$motDePasse = $_REQUEST['mdp'];

//include('bdd.php');


//$bd= connexion();

/*include('bdd_utilisateur.php');



$requeteSQL = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$nomUtilisateur' AND motDePasse = '$motDePasse'";

$resultat = requete($bd, $requeteSQL);*/

$resultat = ($nomUtilisateur == "" && $motDePasse == "");

if(!$resultat)
{
	http_response_code(401);
}
else{
	session_start();
	$_SESSION['nomUtilisateur'] = $nomUtilisateur;
	echo json_encode($nomUtilisateur);
}

<?php

header('Content-Type: application/json');
include('bdd.php');

try{

	$bd = connexion();
}

catch (Exception $e){
	//Entête HTTP pour spécifier le code de retour, 500 signifie "erreur.interne.du.serveur"

	http_response_code(500);

	//on envoie l'erreur (qu'on récupère dans $e) au client, histoire qu'il ait des précisions 
	//sur pourquoi ça ne marche pas

	echo json_encode(array('Erreur' => $e->getMessage()));

	//et on sort du prgramme, car on est dans un cas d'erreur

	exit; 
}

//debug: affichage des données envoyer par le client (pseudo et message)
//print_r($_REQUEST);

	$titre=$_REQUEST['titre'];
	$description=$_REQUEST['description'];
	$categorie=$_REQUEST['categorie'];
	$pseudo=$_REQUEST['pseudo'];
	$prix=$_REQUEST['prix'];
	$photo=$_REQUEST['photo'];
	$rdv_lat=$_REQUEST['rdv_lat'];
	$rdv_lon=$_REQUEST['rdv_lon'];
	$date=$_REQUEST['date'];

$req = $bd ->prepare("INSERT INTO annonce(titre, description, categorie, pseudo, prix, photo, rdv_lat, rdv_lon, date) VALUES (:titre, :description, :categorie, :pseudo, :prix, :photo, :rdv_lat, :rdv_lon, :date)");

$yes = $req->execute(array('titre'=>$titre, 'description'=>$description, 'categorie' =>$categorie, 'pseudo' =>$pseudo, 'prix' =>$prix, 'photo' =>$photo, 'rdv_lat' =>$rdv_lat, 'rdv_lon' =>$rdv_lon, 'date' =>$date));

//si la requête d'insertion a fonctioné 

if ($yes){
	//entête code de succès 
	http_response_code(200);

	//on renvoie true, ça ne sert pas a grand chose mais tant qu'a faire..
	echo json_encode($yes); 

}else{//sinon la requête d'insertion a echouée 
	//entête code d'erreur 
	http_response_code(500);

	//on envoie une erreur explicite

	echo json_encode(array('Erreur' => 'la requête a échoué'));

}


?>
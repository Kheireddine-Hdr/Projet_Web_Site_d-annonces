<?php
session_start();
if(isset($_SESSION['nomUtilisateur']))
{
header('content-Type: application/json');
include('bdd.php');
	$bd = connexion();
	$id = $_REQUEST['delete'];
	$Requete = "DELETE FROM annonce WHERE id='$id'";
    $result = $bd->query($Requete);
	echo json_encode($result);
// DELETE FROM ANNONCE WHERE id = '1'
}else{
	echo 'vous ne pouvez pas supprimer l\'annonce';
	http_response_code(403);
}
?>
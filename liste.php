<?php
include('annoncesConnexion.php');
?>
	<main>
		<center><h2>Annonces</h2> </center>

  	<?php
  	include('bdd.php');
  	$resultat = lecture();
  	foreach ($resultat as $ligne) {
  		echo '<div class="annonce">
  			<h2>
  				' .$ligne['titre'].'
  			</h2>
  		<div classe="image_annonce">
  			<a target="_blank" href="'.$ligne['photo'].'"><img src="'.$ligne['photo'].'"/></a>
  		</div>
  		<div classe="caracteristiques">
  			<b> Description:</b> '.$ligne['description'].'<br/>
  			<b> Categorie:</b> '.$ligne['categorie'].'<br/>
  			<b> Pseudo:</b> '.$ligne['pseudo'].'<br/>
  			<b> Prix:</b> '.$ligne['prix'].'<br/>
  			<b> Coordonnées GPS:</b> <br/> Latitude:'.$ligne['rdv_lat'].'<br/> Longitude '.$ligne['rdv_lon'].'<br/>: 
  			<b>Date:</b> '.$ligne['date'].'<br/>
  		</div>';
  		
  	}

  	?>
	</main>

	<?php
		include('footerPage.php');
	?>
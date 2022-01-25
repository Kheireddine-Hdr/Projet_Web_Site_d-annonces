<?php 
include('annoncesConnexion.php');
?>

	<main>
		<form id="authentification">

			<input type="text" name="identifiant" id="identifiant" placeholder="Nom d'utilisateur"><br/>
			 <input type="password" name="mdp" id="myInput" placeholder="Mot de Passe"><br/>
			<input type="checkbox" onclick="myFunction()">Show Passeword <br/>
			<button type="submit" class="btn btn-primary">Se Connecter</button>

		</form>

	</main>


<?php

include('footerPage.php');

?>
<?php
include('annoncesConnexion.php');

?>
<main>
	<div id="recherche">
		<button id="btn" type="submit" class="btn btn-primary">Rechercher les données</button>
		<input type="text" id="recherche_2">

		<center><h2>Annonce</h2></center>
			<form id="recherche_3" method="POST" action="wsAjout.php">
				<input type="text" id="titre"  name="titre" placeholder="titre"> </br>

				<textarea name="description" id="description" rows="10" cols="30">
				Description de l'article.								
                </textarea>	
				 </br>

				


				<div class="form-group">
  
				<label for="cat">Catégorie:</label>
  				<select class="form-control" id="cat" name="categorie">
    			<option>Electro-menager</option>
    			<option>Automobiles</option>
    			<option>Vêtements</option>
    			<option>Immobiliers</option>
    			<option>Cosmétiques</option>

  				</select>
				</div>	
				</br>			
				<input type="text" id="pseudo"  name="pseudo" placeholder="nom/pseudo"> </br>	

		
				<input type="text" class="form-control" id="prix"  name="prix" placeholder="prix en euro"> </br>

				<input type="text" alt="show image" src="" name="photo" id="photo" placeholder="URL photo"> </br>



				<input type="text" id="latitude"  name="rdv_lat" placeholder="latitude"> </br>	
				<input type="text" id="longitude"  name="rdv_lon" placeholder="longitude"> </br>	
				<input type="date" id="date" name="date" ></br>

				

				<input type="submit"  value="Soumettre" id="Soumettre" >



			</form>

	</div>
	<div id="affichage_annonce"></div>

</main>

<?php
include('footerPage.php');
?>
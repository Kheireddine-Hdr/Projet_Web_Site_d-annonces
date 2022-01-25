// toujours placer le code Javascript à l'intérieur 
//de l'écoutur d'événement "DOMContentloaded"

document.addEventListener('DOMContentLoaded', function(){

	function build_annonce_html(annonce){
	//console.log(annonce);
		var bcd = '';
		bcd += '<div classe="annonce" id="annonce.id">'
		bcd += '<h2>' + annonce.titre +'</h2>';
		bcd += '<div classe="caracteristiques">';
		bcd += '<b> Description:</b>'+annonce.description+'<br/><br/>';
		bcd += '<b> Categorie:</b>' +annonce.categorie+'<br/><br/>';
		bcd += '<b> Pseudo:</b>' +annonce.pseudo+ '<br/><br/>';
		bcd += '<b> Prix:</b>' +annonce.prix+'<br/><br/>';
		bcd += '<img src ="'+annonce.photo+'"/><br/><br/>';
		bcd += '<b> Coordonnées GPS:</b> <br/> lattitude: '+annonce.rdv_lat+'<br/><br/>';
		bcd += '<b> longitude:' +annonce.rdv_lon+ '<br/><br/>';
		bcd += '<b>Date:</b>' +annonce.date+'<br/><br/>';
		bcd += '<button data-id = "'+annonce.id+'" class="supp_annonce" type="submit">supprimer</button>';
		bcd += '</div>';
		return bcd;
	}

		 


	//cette fonction va chercher les annonces en appelant le webservice wsAffichage.php
	function refresh(){
		//on prépare une requête AJAX
		var request = new XMLHttpRequest();
		//on d"finit ce qu'elle fera lorsqu'elle aura reçu une réponse 
		request.addEventListener('load', function(data){
			//debug: on affiche les données dans la console 
			// console.log(data.target.responseText);
			//on décode les données renvoyés par le webservice
			var bcd = JSON.parse(data.target.responseText);
			var new_html = '';
			//pour chaque message du jeu de données renvoyé, on construit une portion de html
			for (var i = 0; i<bcd.annonce.length; i++){
				//new_html += annonce_html(bcd.annonce[i]);	
				new_html += build_annonce_html(bcd.annonce[i]);

			}

			document.querySelector('#affichage_annonce').innerHTML = new_html;
		var btn_supp = document.getElementsByClassName('supp_annonce');
		for(i = 0; i<btn_supp.length; i++){
			btn_supp[i].addEventListener("click", function(event) {
			var ida = this.getAttribute('data-id');

				supprimer_annonce(ida);
					event.preventDefault();
		});
	}


		});
		// lancer la requête AJAX !
		var rech = document.getElementById('recherche_2');
		request.open("GET", "wsAffichage.php?search="+rech.value);
		request.send();
	}


	var btn = document.getElementById('btn');
	if (btn) {
		btn.addEventListener("click", function(event){
			refresh();
			//on n'execute pas l'action par defaut
			event.preventDefault();

		});
	} // else rien

		

/*///////////////////code ajout /////////////////////////////////////////////////////*/

	var form = document.getElementById('recherche_3');
	if (form) {
		form.addEventListener("submit", function(event) {
			//refresh();
			//on n'execute pas l'acction par défaut

			event.preventDefault();

			//on prépare une reqête AJAX
			var request = new XMLHttpRequest();

			//on défini ce qu'elle fera lorsqu'il aura reçu la réponse 
			request.addEventListener('load', function(data){
				console.log(JSON.parse(data.target.responseText));

				//si le code de retour est erreur du serveur 

				if (data.target.status == 500){
					//on fait sauter une erreur explicite au visage de l'utilisateur(il serait
					//mieux d'afficher un message plus discrès dans la page)
					alert("veuillez renseigner les champs s'il vous plait");

				}else if (data.target.status == 200){

					var titre= document.getElementById('titre');
					titre.value = '';

					var description= document.getElementById('description');
					description.value = '';

					var categorie= document.getElementById('cat');
					categorie.value = '';

					var pseudo= document.getElementById('pseudo');
					pseudo.value = '';

					var prix= document.getElementById('prix');
					prix.value = '';

					var photo= document.getElementById('photo');
					photo.value = '';

					var rdv_lat= document.getElementById('latitude');
					rdv_lat.value = '';

					var rdv_lon= document.getElementById('longitude');
					rdv_lon.value = '';

					var date= document.getElementById('date');
					date.value = '';
					refresh();
				}

			});


				
			//on envoie la requête avec la methode POST (car on transmet les données)

			request.open("POST", "wsAjout.php");

			//on envoie les données que l'utilisateur a tapé dans le formulaire 

			request.send(new FormData(form)); //FormData() : permet de construire facilement un ensemble de paire
			//clès/valeur représentant les champs du formulaire et leur valeurs

		});
	}

/////////////////////**********suppression d'annonces****************//////////////////////////////

	function supprimer_annonce(idannoce){
		if(confirm("voulez-vous vraiment supprimer cette annonce?")){
			var request = new XMLHttpRequest();
			request.addEventListener('load', function(data) {
			//console.log(JSON.parse(data.target.responseText));
			if(data.target.status == 500){
				//on fait sauter une erreur explicite au yeux de l'utilisateur
				//(il serait mieux d'afficher un message plus discrès dans la page)
				alert("erreur lors de l'envoi de message!!");

			}else if(data.target.status == 403){
				alert("vous ne pouvez pas supprimer l'annonce!");

				}else{
					refresh();
				}
			});
			
		request.open("GET", "wsSupprimer.php?delete=" + idannoce);
		request.send();


		}

	}




	var form = document.getElementById('authentification');
	if (form) {
		form.addEventListener("submit", function(event) {
			//refresh();
			//on n'execute pas l'acction par défaut

			event.preventDefault();

			//on prépare une reqête AJAX
			var request = new XMLHttpRequest();

			//on défini ce qu'elle fera lorsqu'il aura reçu la réponse 
			request.addEventListener('load', function(data){
				//console.log(JSON.parse(data.target.responseText));

				//si le code de retour est erreur du serveur 

				if (data.target.status == 500){
					//on fait sauter une erreur explicite au visage de l'utilisateur(il serait
					//mieux d'afficher un message plus discrès dans la page)
					alert("erreur");

				}else if (data.target.status == 401){
					alert("mot de passe incorrect");

				}else if (data.target.status == 200){
					var reponse = JSON.parse(data.target.responseText);
					var identifiant = document.getElementById('identifiant');
					identifiant.value = '';
					var motDePasse = document.getElementById('myInput');
					motDePasse.value = '';

					if(reponse != 0){
						alert('Bonjour Kheireddine/ ' +reponse+'');
						document.location.href='annoncesConnexion.php';
					}
				}
			});

			request.open("POST", "wsAuthentification.php");
			request.send(new FormData(form));

		});
	}


});



/////////////////////////////////////////  My Fonction PasseWord /////////////////////////////////////////////////////////////////



function myFunction() {
  var x = document.getElementById("myInput");
  	if (x.type === "password") {
   	 	x.type = "text";
  } else {
    	x.type = "password";
  }
} 





	




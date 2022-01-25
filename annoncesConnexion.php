<!DOCTYPE html>
<html>
<head>
	<title>CheckCKH</title>
	<meta charset="utf-8">
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="ajax.js"></script>
	
	

</head>

<body>
	<header>
	<div id="titre">
	<h1>WELCOME TO CheckCKH</h1>
	</div>
	<div id="logo">
	<img src="image/logo.jpg" height="100" width="100" >
	</div>
	<nav>
	<ul > 
		<li><a href="char.php" style="text-decoration: none">Accueil</a></li>	
		<li><a href="recherche.php" style="text-decoration: none">Rechercher/Ajouter</a></li>
		<li> <a href="liste.php" style="text-decoration: none">liste</a></li>
		<?php session_start(); ?>
		<?php if (isset($_SESSION['nomUtilisateur'])){?>
		<li style="float: right"><a classe="active" style="text-decoration: none" href="deconnexion.php">deconnexion</a></li><?php } else {?>
		<li style="float: right"><a classe="active" style="text-decoration: none" href="identificationForm.php">connexion</a></li>
		<?php } ?>
	</ul>
	</nav>
	
</header>
	
</body>
</html>

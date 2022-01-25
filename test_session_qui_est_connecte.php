<?php

session_start();
if ($_SESSION['test'] != "") {
	echo "Quelqu'un est connecté !";
} else {
	echo "<button>Connectez-vous !</button>";
}

?>
<?php

include "../managers/GestionProject.php";

// Trouver tous les employés depuis la base de données 
$gestionProjects = new GestionProject();
$projects = $gestionProjects->RechercherTous();

if(!empty($_POST)){
	$project = new Project();
	$project->setNom($_POST['Nom']);
	$project->setDescription($_POST['Description']);
	$gestionProjects->Ajouter($project);
	
	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/style.css">
	<title>Gestion des employés</title>
	
</head>
<body class="bg-light">


<div class="container w-50">
<h1 class="text-center mt-5 mb-5">Ajouter un project</h1>


<form method="post" action="">
	<div>
		<label for="Nom">Nom</label>
		<input type="text" required="required" id="Nom" name="Nom" 
		placeholder="Nom" aria-label="First name" class="form-control">
	</div>
	<div>
		<label for="Description">Description</label>
		<input type="text" required="required" id="Description" name="Description" 
		placeholder="Description"  aria-label="Description" class="form-control">
	</div>
	<div class="text-center" >
		<button type="submit" class="btn btn-primary w-50 mt-5" >Ajouter</button>
		<a href="../index.php" class="btn btn-warning w-50 mt-2">Annuler</a>
	</div>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php

include "managers/GestionProject.php";

    // Trouver tous les employés depuis la base de données 
    $gestionProject = new GestionProject();
    $projects = $gestionProject->RechercherTous();
    // print_r($projects);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./UI/Styles/style.css">
    <title>Gestion des employés</title>
</head>
<body class="bg-light">

<div class="container w-75 text-center card mt-5">
    <div class="text-center">

        <a href="UI/ajouter.php"  class="btn btn-primary w-50 mt-3 mb-4 ">Ajouter un projet</a>
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
                    foreach($projects as $project){
    ?>
    <tr>
      <td><?= $project->getNom() ?></td>
      <td><?= $project->getDescription() ?></td>
      <td>
      <a href="UI/editerProject.php?id=<?php echo $project->getId() ?>" class="btn btn-warning">Éditer</a>
                    <a href="UI/supprimerProject.php?id=<?php echo $project->getId() ?>" class="btn btn-danger">Supprime</a>
                    <a href="UI/projectTask.php?id=<?php echo $project->getId() ?>" class="btn btn-success">ajouter un task</a>
      
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
</div>

       

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
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
    <link rel="stylesheet" href="./UI/Styles/style.css">
    <title>Gestion des employés</title>
</head>
<body>
    <div>
        <a href="UI/ajouter.php">Ajouter un employé</a>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
            </tr>
            <?php
                    foreach($projects as $project){
            ?>

            <tr>
                <td><?= $project->getNom() ?></td>
                <td><?= $project->getDescription() ?></td>
                <td>
                    <a href="UI/editer.php?id=<?php echo $project->getId() ?>">Éditer</a>
                    <a href="UI/supprimer.php?id=<?php echo $project->getId() ?>">Supprime</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
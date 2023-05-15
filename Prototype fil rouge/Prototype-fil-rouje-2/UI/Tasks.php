<?php
include "../managers/GestionTask.php";

    // Trouver tous les employés depuis la base de données 
    $gestiontask = new GestionTask();
    $tasks = $gestiontask->RechercherTous();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/style.css">
    <script
      src="https://kit.fontawesome.com/c7a60e43cd.js"
      crossorigin="anonymous"
    ></script>
    <title>Gestion des tasks</title>
</head>
<body>
    <div class="container text-center w-75">
        <h1 class="mt-5 mb-4">toute les tasks</h1>
        <table class="table">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php
                    foreach($tasks as $task){
            ?>

            <tr>
                <td><?= $task->getNom() ?></td>
                <td><?= $task->getDescription() ?></td>
                <td>
                    <a href="editer.php?id=<?php echo $task->getId() ?>" class="btn btn-warning">Éditer</a>
                    <a href="supprimerTask.php?id=<?php echo $task->getId() ?>" class="btn btn-danger">Supprime</a>

                </td>
            </tr>
            <?php }?>
        </table>
    <div class="d-flex justify-content-end">
    <a rel="stylesheet" href="../index.php" class="btn btn-info"><i class="fa-solid fa-arrow-left-long"></i> Ajouter une project</a>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php


// include('../UI/GestionProject.php');
include "../managers/GestionProject.php";




$gestionProjects = new GestionProject();


if(isset($_GET['id'])){
    $project = $gestionProjects->RechercherParId($_GET['id']);
}


if(isset($_POST['modifier'])){

    $id = $_POST['Id'];
    $nom = $_POST['Nom'];
    $description = $_POST['Description'];
    $gestionProjects->Modifier($id,$nom,$description);
    header('Location: ../index.php');
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
    <title>Modifier : </title>
</head>
<body class="bg-light">
<div class="container w-50 mt-5 card">


<h1 class="text-center">Modification de Projet : <?=$project->getNom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id"   
        value=<?php echo $project->getId()?> class="form-control">

    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="Nom" name="Nom"  placeholder="Nom" 
        value=<?php echo $project->getNom()?> class="form-control">
    </div>
    <div>
        <label for="Description">Description</label>
        <input type="text" required="required" 
        id="Description" name="Description" placeholder="Description"
        value=<?php echo htmlspecialchars(nl2br($project->getDescription()), ENT_QUOTES); ?> class="form-control">
    </div>

    <div class="text-center">
        <input name="modifier" type="submit" class="btn btn-success w-50 mt-5" value="Modifier">
        <a href="../index.php" class="btn btn-danger w-50 mt-2">Annuler</a>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
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
    <link rel="stylesheet" href="Style/style.css">
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de l'employé : <?=$project->getNom() ?></h1>
<form method="post" action="">
    <input type="text" required="required" 
        id="Id" name="Id"   
        value=<?php echo $project->getId()?> >

    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="Nom" name="Nom"  placeholder="Nom" 
        value=<?php echo $project->getNom()?> >
    </div>
    <div>
        <label for="Description">Description</label>
        <input type="text" required="required" 
        id="Description" name="Description" placeholder="Description"
        value=<?php echo htmlspecialchars(nl2br($project->getDescription()), ENT_QUOTES); ?>>
    </div>

    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="index.php">Annuler</a>
    </div>
</form>
</body>
</html>
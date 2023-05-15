<?php 

require_once('../managers/GestionTask.php');

$gestion_task = new GestionTask();

$query = $_GET['q'];

if ($query == "") {
  $tasks = $gestion_task->RechercherTous();
} else {
  $tasks = $gestion_task->RechercherParNom($query);
}

$html = "";


$html = "<table class='table mt-5'>";
$html .= "<thead><tr><th scope='col'>Nom</th><th scope='col'>Description</th><th scope='col'>Actions</th></tr></thead>";
$html .= "<tbody>";
foreach ($tasks as $task) {
    $html .= "<tr>";
    $html .= "<td>".$task->getNom()."</td>";
    $html .= "<td>".$task->getDescription()."</td>";
    $html .= "<td>";
    $html .= "<a href='editer.php?id=".$task->getId()."' class='btn btn-warning'>Éditer</a>";
    $html .= "<a href='supprimerTask.php?id=".$task->getId()."' class='btn btn-danger'>Supprime</a>";
    $html .= "</td>";
    $html .= "</tr>";
}
$html .= "</tbody>";
$html .= "</table>";


echo $html;


?>
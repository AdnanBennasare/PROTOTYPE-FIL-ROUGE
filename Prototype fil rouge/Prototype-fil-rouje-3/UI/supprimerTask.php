<?php
    include "../managers/GestionTask.php";

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestiontask = new GestionTask();
    $id = $_GET['id'] ;
    $gestiontask->Supprimer($id);
        
    header('Location: Tasks.php');
}
?>
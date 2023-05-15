<?php
// include('../UI/GestionProject.php');
include "../managers/GestionProject.php";



    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionproject = new GestionProject();
    $id = $_GET['id'] ;
    $gestionproject->Supprimer($id);
        
    header('Location: ../index.php');
}
?>
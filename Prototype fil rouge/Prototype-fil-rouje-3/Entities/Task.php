<?php

class Task{
    private $Id;
    private $Nom;
    private $Description;

    private $project_id;

    

    // function __construct($nom,$prenom,$dateNaissance) {
    //     $this->Nom = $nom;
    //     $this->Prenom = $prenom;
    //     $this->DateNaissance = $dateNaissance;
    // }

    // function __construct() {
       
    // }

    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($nom) {
        $this->Nom = $nom;
    }

    public function getDescription() {
        return $this->Description;
    }
    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function getProject_id() {
        return $this->project_id;
    }
    public function setProject_id($Project_id) {
        $this->project_id = $Project_id;
    }

   

}
     
?>
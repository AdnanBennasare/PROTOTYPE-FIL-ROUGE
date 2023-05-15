<?php

class Project{
    private $Id;
    private $Nom;
    private $Description;


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

   

}
     
?>
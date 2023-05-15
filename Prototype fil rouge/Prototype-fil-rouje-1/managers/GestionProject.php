<?php


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entities/Project.php');


 
class GestionProject{

    private $Connection = Null;

    private function getConnection(){
        if(is_null($this->Connection)){
            $this->Connection = mysqli_connect('localhost', 'root', '', 'gestionprojects');
            // Vérifier l'ouverture de la connexion avec la base de données
            if(!$this->Connection){
                $message =  'Erreur de connexion: ' . mysqli_connect_error(); 
                throw new Exception($message); 
            }
        }
        
        return $this->Connection;
        
    }

    public function Ajouter($project){

        $nom = $project->getNom();
        $description = $project->getDescription();
        // requête SQL
        $sql = "INSERT INTO projects(Nom, Description) 
                                VALUES('$nom', '$description')";

        mysqli_query($this->getConnection(), $sql);
    }

    public function Supprimer($id){
        $sql = "DELETE FROM projects WHERE Id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }


    public function Modifier($id,$nom,$description)
    {
        // Requête SQL
        $sql = "UPDATE projects SET 
        Nom='$nom', Description='$description'
        WHERE Id= $id";

        //  
        mysqli_query($this->getConnection(), $sql);

        //
        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous(){
        $sql = 'SELECT Id, Nom, Description FROM projects';
        $query = mysqli_query($this->getConnection() ,$sql);
        $projects_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $projects = array();
        foreach ($projects_data as $project_data) {
            $project = new Project();
            $project->setId($project_data['Id']);
            $project->setNom($project_data['Nom']);
            $project->setDescription($project_data['Description']);
            array_push($projects, $project);
        }
        return $projects;
    }

    public function RechercherParId($id){
        $sql = "SELECT * FROM projects WHERE Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $project_data = mysqli_fetch_assoc($result);
        $project = new Project();
        $project->setId($project_data['Id']);
        $project->setNom($project_data['Nom']);
        $project->setDescription ($project_data['Description']);
        
        return $project;
    }


    
}




?>
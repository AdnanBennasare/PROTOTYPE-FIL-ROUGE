<?php

include "../Entities/Task.php";


class GestionTask{
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


    public function Modifier($id,$nom,$description)
    {
        // Requête SQL
        $sql = "UPDATE tasks SET 
        task_name='$nom', task_description='$description'
        WHERE task_id= $id";

        //  
        mysqli_query($this->getConnection(), $sql);

        //
        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    public function RechercherParId($id){
        $sql = "SELECT * FROM tasks WHERE task_id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $task_data = mysqli_fetch_assoc($result);
        $task = new task();
        $task->setId($task_data['task_id']);
        $task->setNom($task_data['task_name']);
        $task->setDescription ($task_data['task_description']);
        
        return $task;
    }

    public function RechercherTous(){
        $sql = 'SELECT task_id, task_name, task_description FROM tasks';
        $query = mysqli_query($this->getConnection() ,$sql);
        $tasks_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $tasks = array();
        foreach ($tasks_data as $task_data) {
            $task = new task();
            $task->setId($task_data['task_id']);
            $task->setNom($task_data['task_name']);
            $task->setDescription($task_data['task_description']);
            array_push($tasks, $task);
        }
        return $tasks;
    }

    public function AjouterTasktoProject($task){

        $nom = $task->getNom();
        $project_id = $task->getProject_id();
        $description = $task->getDescription();
        // requête SQL
        $sql = "INSERT INTO tasks(task_name, project_id, task_description) 
                                VALUES('$nom', '$project_id', '$description')";

        mysqli_query($this->getConnection(), $sql);
    }

    public function Supprimer($id){
        $sql = "DELETE FROM Tasks WHERE task_id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherParProjet($project_id){
        $sql = "SELECT task_id, task_name, task_description FROM tasks WHERE project_id= $project_id";
        $query = mysqli_query($this->getConnection(), $sql);
        if (!$query) {
        // handle the error, e.g.:
        die(mysqli_error($this->getConnection()));
        }
        $tasks = array();
        while ($task_data = mysqli_fetch_assoc($query)) {
        $task = new task();
        $task->setId($task_data['task_id']);
        $task->setNom($task_data['task_name']);
        $task->setDescription($task_data['task_description']);
        array_push($tasks, $task);
        }
        return $tasks;
        }
    
    public function RechercherParProjetPagines($project_id, $page_size, $offset){
        $sql = "SELECT task_id, task_name, task_description FROM tasks WHERE project_id= $project_id LIMIT $page_size OFFSET $offset";
        $query = mysqli_query($this->getConnection() ,$sql);
        $tasks_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
        $tasks = array();
        foreach ($tasks_data as $task_data) {
            $task = new task();
            $task->setId($task_data['task_id']);
            $task->setNom($task_data['task_name']);
            $task->setDescription($task_data['task_description']);
            array_push($tasks, $task);
        }
        return $tasks;
    }
    
    public function RechercherTousPagines($page_size, $offset){
        $sql = "SELECT task_id, task_name, task_description FROM tasks LIMIT $page_size OFFSET $offset";
        $query = mysqli_query($this->getConnection() ,$sql);
        $tasks_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
        $tasks = array();
        foreach ($tasks_data as $task_data) {
            $task = new task();
            $task->setId($task_data['task_id']);
            $task->setNom($task_data['task_name']);
            $task->setDescription($task_data['task_description']);
            array_push($tasks, $task);
        }
        return $tasks;
    }
    }
    
    ?>
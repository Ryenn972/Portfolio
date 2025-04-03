<?php

namespace Repositories;

class ProjectRepository {
    
    public function getAllProjects():array{
        $pdo = getConnexion();
        $query = $pdo->prepare('SELECT * FROM projects');
        $query->execute();
        
        $projectsData = $query->fetchAll();
        
        // Transformer les données en classe Model Project
        $projectsArray = [];
        foreach ($projectsData as $data){
            $project = new \Models\Project();
            $project->sanitize($data);
            $projectsArray[] = $project;
            
        }
        
        return $projectsArray;
    }
}
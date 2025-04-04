<?php

namespace Repositories;

class ProjectRepository {
    
    public function getProjectById(int $id): ?\Models\Project {
    $pdo = getConnexion();

    // Requête SQL pour récupérer un projet et sa catégorie
    $query = $pdo->prepare("
        SELECT p.*, c.name AS category_name
        FROM projects p
        LEFT JOIN categories c ON p.id_categories = c.id
        WHERE p.id = :id
    ");
    $query->execute(['id' => $id]);
    $projectData = $query->fetch();

    if (!$projectData) {
        return null; // Retourne null si aucun projet trouvé
    }

    // Créer l'objet Project
    $project = new \Models\Project();
    $project->sanitize($projectData);
    $project->setCategoryName($projectData['category_name']);

    // Récupérer les labels associés
    $queryLabels = $pdo->prepare("
        SELECT l.name 
        FROM labels l
        INNER JOIN projects_labels pl ON l.id = pl.id_label
        WHERE pl.id_project = :id
    ");
    $queryLabels->execute(['id' => $id]);
    $labels = $queryLabels->fetchAll();

    $project->setLabels($labels);

    return $project;
}
    
    public function getAllProjects():array{
        $pdo = getConnexion();
        $query = $pdo->prepare('SELECT p.*, c.name AS category_name FROM projects p LEFT JOIN categories c ON p.id_categories = c.id');
        $query->execute();
        
        $projectsData = $query->fetchAll();
        
        // Transformer les données en classe Model Project
        $projectsArray = [];
        foreach ($projectsData as $data){
            $project = new \Models\Project();
            $project->sanitize($data);
            $project->setCategoryName($data['category_name']);
            
            $queryLabels = $pdo->prepare('SELECT l.name FROM labels l INNER JOIN projects_labels pl ON l.id = pl.id_label WHERE pl.id_project = :id');
            $queryLabels->execute(['id' => $data['id']]);
            $labels = $queryLabels->fetchALL();
            
            $project->setLabels($labels);
            
            $projectsArray[] = $project;
            
        }
        
        return $projectsArray;
    }
}
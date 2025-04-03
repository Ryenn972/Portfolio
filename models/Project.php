<?php

namespace Models;

class Project {
    private int $id;
    private string $title;
    private string $projectDescription;
    private string $projectImg;
    private string $projectLink;
    private int $categoriesId;
    
    // Getter et setter pour toutes les propriétés

    public function getId():int{
        return $this->id;
    }
    
    public function setId(int $id):void{
        $this->id = $id;
    }
    
    public function getTitle():string{
        return $this->title;
    }
    
    public function setTitle(string $title):void{
        $this->title = $title;
    }
    
    public function getProjectDescription():string{
        return $this->projectDescription;
    }
    
    public function setProjectDescription(string $projectDescription):void{
        $this->projectDescription = $projectDescription;
    }
    
    public function getProjectImg():string{
        return $this->projectImg;
    }
    
    public function setProjectImg(string $projectImg):void{
        $this->projectImg = $projectImg;
    }
    
    public function getProjectLink():string{
        return $this->projectLink;
    }
    
    public function setProjectLink(string $projectLink):void{
        $this->projectLink = $projectLink;
    }
    
    public function getCategoriesId():string{
        return $this->categoriesId;
    }
    
    public function setCategoriesId(string $categoriesId):void{
        $this->categoriesId = $categoriesId;
    }
    
    public function sanitize(array $projectsData){
        // Transformer ce qui vient de la base de données en un objet de la classe User
        
        $this->id = $projectsData['id'];
        $this->title = $projectsData['title'];
        $this->projectDescription = $projectsData['description'];
        $this->projectImg = $projectsData['image_url'];
        $this->projectLink = $projectsData['link'];
        $this->categoriesId = $projectsData['id_categories'];
        
        return $this;
    }
}
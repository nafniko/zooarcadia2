<?php

namespace Controllers;

use Models\Content;
use Models\Habitat;
use Models\Animal;

class HabitatController
{
    private $habitats;
    private $content;
    private $animaux;

    public function index()
    {
        // Récupérer les habitats depuis le modèle
        $this->habitats = (new Habitat())->getAllObjet();
        $habitats = $this->habitats;
            require_once __DIR__ . '/../Vues/_habitats.php';
        

        // Inclure la vue correspondante
    }
    
    public function showhabitat()
    {
        // Récupérer les habitats depuis le modèle
        $habitats = new Habitat();
        $habitats->getAllObjet();
        
        require_once __DIR__ . '/../Vues/_habitats.php';


        // Inclure la vue correspondante
    }

    public function show($id)
    {
        require_once __DIR__ . '/../Vues/_header.php';

        $this->habitats = (new Habitat())->getAllObjet();
        $habitats = $this->habitats;
    
    $this->content = (new Content())->getAllObjet();
    foreach ($this->content as $key => $contents) {
        if($contents->getLiens() == $id){

            require __DIR__ . '/../Vues/_habitat.php';
        }
    }
    $this->animaux = (new Animal())->getAllObjet();
    $animaux = $this->animaux;

  
    
    require __DIR__ . '/../Vues/_animaux.php';





    }

}

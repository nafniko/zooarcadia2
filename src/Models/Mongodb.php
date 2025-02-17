<?php

namespace Models;

use PDO;
use MongoDB\Client;

use Exception;

abstract class Mongodb
{
    protected $mongodb;
    protected $bdd;


    private function setMongodb()
    {
        try {
            // Connexion à MongoDB
            $this->mongodb = new Client('mongodb://localhost:27017');

            // Sélection de la base de données
            $this->bdd = $this->mongodb->zooarcadia;
        } catch (Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }
    protected function getMongodb()
    {
        if ($this->bdd === null) {
            $this->setMongodb();
        }
        return $this->bdd;
    }

    protected function getAll($collection)
    {
        $this->bdd = $this->getMongodb();
        $cursor=$this->bdd->$collection->find(['validé' => false]);
        return iterator_to_array($cursor) ;
    }
    protected function getAlls($collection)
    {
        $this->bdd = $this->getMongodb();
        $cursor=$this->bdd->$collection->find();
        return iterator_to_array($cursor) ;
    }
    protected function getAllTrue($collection)
    {
        $this->bdd = $this->getMongodb();
        $cursor=$this->bdd->$collection->find(['validé' => true]);
        return iterator_to_array($cursor) ;
    }

    public function insertAnimal($imagePath){
        $this->bdd = $this->getMongodb();
        $query = $this->bdd->animaux->insertOne([
            'animal_id' => $_POST['id'],
            'prénom' => $_POST['prénom'],
            'image_path' => $imagePath ,
            'counter' => 0,
        ]
        );
        return $query;
    }



      
            
   

 

}
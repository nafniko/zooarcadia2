<?php

namespace Models;

use Models\Models;

use PDO;

class Habitat extends Models
{

    private $id;
    private $titres;
    private $liens;
    private $chemin;

    private $infos;
    private $images;



    public function __construct($data = [])
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }  
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getTitres()
    {
        return $this->titres;
    }  
    public function setTitres($titres)
    {
        $this->titres = $titres;
    }

    public function getLiens()
    {
        return $this->liens;
    }  
    public function setLiens($liens)
    {
        $this->liens = $liens;
    }
    public function getChemin()
    {
        return $this->chemin;
    }

    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }
    public function getInfos()
    {
        return $this->infos;
    }

    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
    public function getImages()
    {
        return $this->images;
    }
    public function setImages($images)
    {
        $this->images = $images;
    }



    public function getHabitats()
    {

       return $this->getAll('habitat', 'Models\Habitat');
    }

    
    public function getAllObjet()
    {

       return $this->getAllWhithImages('habitat', 'Models\Habitat'); 
    }
    public function getHabitatsWithImage($id)
    {

       return $this->getOneWithImage('habitat', 'Models\Habitat',$id);
    }




}
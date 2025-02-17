<?php

namespace Models;

use Models\Models;
use PDO;

class Animal extends Models 
{
    private $id;
    private $prenom;
    private $images;
    private $race;
    private $habitat;
    private $values;
    private $chemin;
    private $infos;
    private $commentaire;
    private $obj;

    
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

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function getHabitat()
    {
        return $this->habitat;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function setRace($race)
    {
        $this->race = $race;
    }

    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;
    }
    public function getChemin()
    {
        return $this->chemin;
    }

    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }
   
   

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getInfos()
    {
        return $this->infos;
    }

    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
    public function getAnimals()
    {

       return $this->getAll('animaux', 'Models\Animal');
    }

    public function insertAnimalMongo($imagePath,$id)
    {
        return $this->insertAnimal($imagePath,$id);
    }
    public function getTabAnimals()
    {
        $this->getBdd();
        $var = [];
        $obj = 'Models\Animal';
        $stmt = $this->pdo->prepare("SELECT * FROM `animaux`join rapport on rapport.detail_animal =animaux.id;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
            $var[] = new $obj($value);
        }
        return $var;
    }
    public function getAllObjet()
    {

       return $this->getAllWhithImages('animaux', 'Models\Animal');
    }
    public function createAnimal($imagePath)
    {
        
        if (isset($_POST['create']) )  {

            $prenom = htmlspecialchars(string: $_POST['prenom']);
            $race = htmlspecialchars($_POST['race']);
            $habitat = intval($_POST['habitat']);
            $data=[
                "prenom"=>$prenom,
                "race"=>$race,
                "habitat"=>$habitat,
                "images"=>intval($imagePath)
            ];
             $id=$this->create($data, "animaux");
             $this->insertAnimalMongo($imagePath,$id);
            return $id;
        }
    }
    public function updateAllObjet()
    {
        $data = [];
    
        if (!empty($_POST['prenom'])) {
            $data['prenom'] = htmlspecialchars($_POST['prenom']);
        }
        if (!empty($_POST['race'])) {
            $data['race'] = htmlspecialchars($_POST['race']);
        }
        if (!empty($_POST['habitat'])) {
            $data['habitat'] = htmlspecialchars($_POST['habitat']);
        }
        $id= $_POST['id'];
    
        if (!empty($data)) {
            return $this->update('animaux', $data, $id);
        }
    
        return false; // Aucun champ à mettre à jour
    }
    
    public function deleteAllObjet()

    {
        return $this->delete('animaux');
    }

}

<?php

namespace Models;

use Models\Models;
use Models\Repas;
use PDO;

class Rapport extends Models
{
    private $id;
    private $prenom;
    private $race;
    private $etat;
    private $nourriture;
    private $grammage;
    private $dates;
    private $date_creation;
    private $detail_animal;
    private $commentaire;
    
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

    public function getPrénom()
    {
        return $this->prenom;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getNourriture()
    {
        return $this->nourriture;
    }

    public function getGrammage()
    {
        return $this->grammage;
    }

    public function getDates()
    {
        return $this->dates;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getDetailAnimal()
    {
        return $this->detail_animal;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrénom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setRace($race)
    {
        $this->race = $race;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;
    }

    public function setGrammage($grammage)
    {
        $this->grammage = $grammage;
    }

    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setDetailAnimal($detail_animal)
    {
        $this->detail_animal = $detail_animal;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    public function getAllObjet()
    {
        $this->getBdd();
        $var = [];
        $obj = 'Models\Rapport';
        $stmt = $this->pdo->prepare("SELECT rapport.id,prénom,animaux.race,etat,nourriture,grammage,dates,commentaire FROM `rapport`join animaux on animaux.id = rapport.detail_animal");
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        $stmt->closeCursor();
        return $var;
        // return $this->getAll('rapport', 'Models\Rapport');
    }
    public function createAllObjet()
    {
            if (isset($_POST['create']) ) {
                $id = $_POST['id'];
                $race = htmlspecialchars(string: $_POST['race']);
                $etat = htmlspecialchars($_POST['etat']);
                $nourriture = htmlspecialchars($_POST['nourriture']);
                $grammage = htmlspecialchars($_POST['grammage']);
                $date = htmlspecialchars($_POST['dates']);
                $commentaire = htmlspecialchars($_POST['commentaire']);
                $data=[
                    "race"=>$race,
                    "etat"=>$etat,
                    "nourriture"=>$nourriture,
                    "commentaire"=>$commentaire ,
                    "grammage"=>$grammage,
                    "detail_animal"=>$id,
                    "dates"=>$date
                ];
            }
            return $this->create($data, "rapport");
    }

   

    public function deleteAllObjet()
    {
        return $this->delete('rapport');
    }
}


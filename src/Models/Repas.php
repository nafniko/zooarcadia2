<?php

namespace Models;
use Models\Models;
use PDO;

class Repas extends Models
{
    // Class properties and methods will go here
private $id;
private $repas;
private $animal_id;
private $nourriture;
private $quantite;
private $date_repas;
private $employe_id;
private $commentaire;
private $prenom;

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

// Getters and setters for each property can be added here
public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;
}

public function getRepas()
{
    return $this->repas;
}

public function setRepas($repas)
{
    $this->repas = $repas;
}

public function getAnimalId()
{
    return $this->animal_id;
}

public function setAnimalId($animal_id)
{
    $this->animal_id = $animal_id;
}

public function getNourriture()
{
    return $this->nourriture;
}

public function setNourriture($nourriture)
{
    $this->nourriture = $nourriture;
}

public function getQuantite()
{
    return $this->quantite;
}

public function setQuantite($quantite)
{
    $this->quantite = $quantite;
}

public function getDate_repas()
{
    return $this->date_repas;
}

public function setDate_repas($date_repas)
{
    $this->date_repas = $date_repas;
}

public function getEmployeId()
{
    return $this->employe_id;
}

public function setEmployeId($employe_id)
{
    $this->employe_id = $employe_id;
}

public function getCommentaire()
{
    return $this->commentaire;
}

public function setCommentaire($commentaire)
{
    $this->commentaire = $commentaire;
}


public function getPrenom()
{
    return $this->prenom;
}
public function setPrenom($prenom)
{
    $this->prenom = $prenom;
}

public function getAllObjet()
{
    $this->getBdd();
        $var = [];
        $obj = 'Models\Repas';
        $stmt = $this->pdo->prepare("SELECT repas.id, animal_id, nourriture, quantite, date_repas, animaux.id as id_a, prenom FROM `repas`join animaux on animaux.id = repas.animal_id;");
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        $stmt->closeCursor();
        return $var;
}
public function createAllObjet()
    {
            if (isset($_POST['create']) ) {
                $id = $_POST['id'];
                $nourriture = htmlspecialchars($_POST['nourriture']);
                $quantite = htmlspecialchars($_POST['quantité']);
                $date = $_POST['dates'];
                $data=[
                    "animal_id"=>$id,
                    "nourriture"=>$nourriture,
                    "quantite"=>$quantite,
                    "date_repas"=>$date
                ];
            }
            return $this->create($data, "repas");
    }

    public function deleteAllObjet()
    {
        return $this->delete('repas');
    }
}

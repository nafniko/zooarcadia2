<?php

namespace Models;


class Avis_veto extends Models
{
    private $id;
    private $animal_id;
    private $commentaire;
    private $date_creation;

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

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getAnimal_id()
    {
        return $this->animal_id;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAnimal_id($animal_id)
    {
        $this->animal_id = $animal_id;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function getAvis()
    {
        return $this->getAll('avis_veto', 'Models\Avis_veto');
    }

    public function createAvisAnimals()
    {
        if (isset($_POST['create'])) {

            $commentaire = htmlspecialchars(string: $_POST['commentaire']);
            $animal_id = intval($_POST['animal_id']);
            $data = [
                "commentaire" => $commentaire,
                "animal_id" => $animal_id,
            ];
            return $this->create($data, "avis_veto");
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
        $id = $_POST['id'];

        if (!empty($data)) {
            return $this->update('animaux', $data, $id);
        }

        return false; // Aucun champ à mettre à jour
    }

    public function deleteAllObjet()
    {
        return $this->delete('avis_veto');
    }
}

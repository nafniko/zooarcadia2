<?php

namespace Models;


class Service extends Models
{
    private $id;
    private $titre;
    private $images;
    private $liens;
    private $categorie;
    private $values;
    private $obj;
    private $descriptons;
    private $chemin;
    private $infos;
  
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

   

    public function getImages()
    {
        return $this->images;
    }

    public function getliens()
    {
        return $this->liens;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getDescriptions()
    {
        return $this->descriptons;
    }

    public function getChemin()
    {
        return $this->chemin;
    }

    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    public function setDescriptions($descriptons)
    {
        $this->descriptons = $descriptons;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function setLiens($liens)
    {
        $this->liens = $liens;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function getInfos()
    {
        return $this->infos;
    }

    public function setInfos($infos)
    {
        $this->infos = $infos;
    }


    public function getAllObjet()
    {
       return $this->getAllWhithImages('service', 'Models\Service');
    }
    public function createAllObjet($imagePath)
    {
        if (isset($_POST['create']) && ($_POST['page']=='Service')) { {
            $titre = htmlspecialchars(string: $_POST['titre']);
            $descriptions = htmlspecialchars($_POST['descriptions']);
            $categorie = htmlspecialchars($_POST['categorie']);

            $data=[
                "titre"=>$titre,
                "descriptions"=>$descriptions,
                "images"=>$imagePath,
                "categorie"=>$categorie
            ];
            return $this->create($data, "service");
        }
       
    }

}
public function updateAllObjet()
{
    $data = [];

    if (!empty($_POST['titre'])) {
        $data['titre'] = htmlspecialchars($_POST['titre']);
    }
    if (!empty($_POST['descriptions'])) {
        $data['descriptions'] = htmlspecialchars($_POST['descriptions']);
    }
    $id= $_POST['id'];

    if (!empty($data)) {
        return $this->update('service', $data, $id);
    }

    return false; // Aucun champ à mettre à jour
}







public function deleteAllObjet()
{
    return $this->delete('service');
}
}
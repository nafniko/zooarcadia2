<?php

namespace Models;

use Models\Models;
use PDO;
use Exception;
class Image extends Models
{
    private $id_img;
    private $chemin;
    private $infos;

    // Getter for id_img
    public function getId_img()
    {
        return $this->id_img;
    }

    // Setter for id_img
    public function setId_img($id_img)
    {
        $this->id_img = $id_img;
    }

    // Getter for chemin
    public function getChemin()
    {
        return $this->chemin;
    }

    // Setter for chemin
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    // Getter for infos
    public function getInfos()
    {
        return $this->infos;
    }

    // Setter for infos
    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
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



    public function createUpload()
    {
        try {
            $this->getBdd();

            // $img = htmlspecialchars($_POST['image']);
    
            // Vérifier si un fichier est bien envoyé
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Erreur lors de l'upload du fichier");
            }
    
            // Vérifier le type du fichier (sécurisation)
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($_FILES['image']['type'], $allowedTypes)) {
                throw new Exception("Format d'image non valide");
            }
    
            // Définir le chemin d'upload
            $image = basename($_FILES['image']['name']);
            $uploadDir = __DIR__ . "/../../public/asset/";
            $uploadPath = $uploadDir . $image;
            $cheminDB = "/asset/" . $image; // Chemin à stocker en base
    
            // Déplacer le fichier uploadé
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                throw new Exception("Échec du déplacement du fichier");
            }
    
            // Insérer dans la base de données
            $query = $this->pdo->prepare("INSERT INTO images (chemin) VALUES (:chemin)");
            $query->bindValue(":chemin", $cheminDB, PDO::PARAM_STR);
            $query->execute();
    
            return $this->pdo->lastInsertId();
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage()); // Affiche l'erreur réelle
        }
        
    }
    public function getImageAll(){
        
        return $this->getAll('images', 'Models\Image');
            
    }
    
}
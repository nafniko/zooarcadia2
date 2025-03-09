<?php

namespace Models;

use MongoDB\BSON\ObjectId;
use Models\Mongodb;
use PDO;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfToken;
use MongoDB\Client;
use Exception;
use MongoDB\Model\BSONDocument;

class Avis extends Models
{
    private $id;
    private $commentaire;
    private $note;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getAllObjet()
    {
        return $this->getAllMongo('avis');

    }

    public function getAvis()
    {
        return $this->getAlltrue('avis');
        
    }

    public function createAvis(array $data): ?string
    {
        $connexion = $this->getmongodb();
        $collection = $connexion->selectCollection('avis');

        // Validation et assainissement des données
        $avis = ucfirst(isset($data["avis"]) ? htmlentities($data["avis"]) : null);
        $pseudo = ucfirst(isset($data["pseudo"]) ? htmlentities($data["pseudo"]) : null);
    
        if (!$avis || !$pseudo) {
            throw new Exception("Les champs 'avis' et 'pseudo' sont requis.");
        }
    
        // Insertion dans MongoDB
        try {
            $avisData = [
                'pseudo' => $pseudo,
                'avis' => $avis,
                'validé' => false,
            ];
            $result = $collection->insertOne($avisData);
            return (string) $result->getInsertedId();
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }
    

public function read()
{
    $connexion = $this->getmongodb();
    $bdd = $connexion->zooarcadia;
    $collection = $bdd->avis;
    try {
        $lesAvis = $collection->find(['validé' => true]);
        return iterator_to_array($lesAvis);
    } catch (Exception $e) {
        echo "Erreur lors de la récupération des avis : " . $e->getMessage();
        return [];
    }
}

public function updateAvis()
{
    $connexion=$this->getmongodb();
    $collection = $connexion->selectCollection('avis');

    if (isset($_POST['valider'])) {
        try {

            $idAvis = new ObjectId($_POST['valider']);
            $collection->updateOne(
                ['_id' => $idAvis],
                ['$set' => ['validé' => true]]
            );
            echo "Avis validé avec succès.";
            header("Location:/zoo/public/index.php?page=avis");

            exit();
        } catch (Exception $e) {
            echo "Erreur lors de la validation : " . $e->getMessage();
        }
    }
}

public function deleteAvis()
{
    $connexion=$this->getmongodb();
    $collection = $connexion->selectCollection('avis');

    if (isset($_POST['sup_avis'])) {
        try {
            $idAvis = new ObjectId($_POST['sup_avis']);
            $collection->deleteOne(['_id' => $idAvis]);
            echo "Avis supprimé avec succès.";
            header("Location:/zoo/public/index.php?page=avis");
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}
}

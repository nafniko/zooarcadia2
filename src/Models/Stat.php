<?php

namespace Models;

use Exception;

class Stat extends Models
{

    public function getAllObjet()
    {
        return $this->getAlls('animaux');
    }

    public function incrementCount($animalId)
    {
        $bdd = $this->getMongodb();
        $collection = $bdd->animaux;
        try {
            $result = $collection->updateOne(
                ['animal_id' => intval($animalId)],
                ['$inc' => ['counter' => 1]]
            );

            if ($result->getModifiedCount() > 0) {
                echo json_encode(['message' => 'Compteur incrémenté avec succès.']);
            } else {
                echo json_encode(['message' => 'Aucun changement effectué.']);
            }
        } catch (Exception $e) {
            echo json_encode(['message' => 'Erreur : ' . $e->getMessage()]);
        }
    }
}

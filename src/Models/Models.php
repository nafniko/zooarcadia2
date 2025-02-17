<?php

namespace Models;

use PDO;
use MongoDB\Client;

use Exception;

abstract class Models
{
    protected $pdo;
    protected $table;
    protected $mongodb;
    protected $bdd;
    
    private function setBdd()
    {
        // Connexion à MySQL
        $this->pdo = new PDO("mysql:host=localhost;dbname=zooarcadia", 'root', 'ok');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
   
    protected function getBdd(){
        if($this->pdo == null){
            $this->setBdd();
        }
        return $this->pdo;
    }
  
    protected function getOne($table, $obj, int $id)
    {
       // Assurer que la connexion à la base de données est établie
       $this->getBdd();
       
       // Préparer la requête SQL pour sélectionner l'enregistrement par ID
       $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
       
       // Exécuter la requête avec l'ID fourni
       $stmt->execute(['id' => $id]);
       
       // Récupérer les données sous forme de tableau associatif
       $data = $stmt->fetch(PDO::FETCH_ASSOC);
       
       // Fermer le curseur pour libérer la connexion au serveur
       $stmt->closeCursor();
       
       // Retourner une instance de la classe spécifiée, remplie avec les données récupérées
       return new $obj($data);
    }
      protected function getOneWithImage($table,$obj,int $id)
    {
        $this->getBdd();
        $stmt = $this->pdo->prepare("SELECT * FROM $table join images on $table.images = images.id_img WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return new $obj($data);
            }

    // Récupérer toutes les lignes
    protected function getAll($table,$obj): array
    {
        $this->getBdd();
        $var = [];

        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        $stmt->closeCursor();
        return $var;
    }
    protected function getAllWhithImages($table,$obj)
    {
        $this->getBdd();
        $var = [];
        $stmt = $this->pdo->prepare("SELECT * FROM $table join images on $table.images = images.id_img;");
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
            
        }
        $stmt->closeCursor();
        return $var;
    }
    
    // Récupérer l'email par email
    protected function getEmailByEmail($table, string $email,$obj) 
    {
        $this->getBdd();
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return new $obj($data);
    }

    // Insérer une nouvelle ligne
    protected function create(array $data,$table): int|string
    {
        // Générer dynamiquement les colonnes et les placeholders
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $this->getBdd();

        // Préparer la requête SQL
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

        // Lier chaque valeur individuellement
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Exécuter la requête avec les données fournies
        $stmt->execute();

        // Retourner l'ID de la dernière insertion
        return $this->pdo->lastInsertId();
    }
            
            // Mettre à jour une ligne par ID
            public function update($table, array $data, int $id)
            {
                $this->getBdd();

                // Générer dynamiquement les colonnes et les placeholders
                $columns = '';
                foreach ($data as $key => $value) {
                    $columns .= "$key = :$key, ";
                }
                $columns = rtrim($columns, ', ');

                // Préparer la requête SQL
                $stmt = $this->pdo->prepare("UPDATE $table SET $columns WHERE id = :id");

                // Ajouter l'ID aux données
                $data['id'] = $id;

                // Exécuter la requête avec les données fournies
                $stmt->execute($data);

                return $stmt->rowCount();
            }

            // Récupérer une ligne par ID
            public function getById($table, $obj, int $id)
            {
                return $this->getOne($table, $obj, $id);
            }

            // Supprimer une ligne par ID
            public function delete($table)
            {
                $this->getBdd();
                $id = $_POST['delete'];

                // Préparer la requête SQL
                $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");

                // Exécuter la requête avec l'ID fourni
                $stmt->execute(['id' => $id]);

                return $stmt->rowCount();
            }

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
        
            protected function getAllMongo($collection)
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
        
            public function insertAnimal($imagePath,$id){
                $this->bdd = $this->getMongodb();
                $query = $this->bdd->animaux->insertOne([
                    'animal_id' => $id,
                    'prénom' => $_POST['prenom'],
                    'image_path' => $imagePath ,
                    'counter' => 0,
                ]
                );
                return $query;
            }

}
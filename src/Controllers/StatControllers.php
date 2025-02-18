<?php

namespace Controllers;

use Models\Animal;
use Models\Content;
use Models\Image;
use Models\Stat;
class StatControllers
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->count();
        }
    }
 
    public function admin()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['default' => null]]);

        switch ($method) {
            case 'GET':
                $this->show();
                break;
            case 'POST':
                if (isset($_POST['create']) ) {
                    $this->createObjet();
                } elseif (isset($_POST['update']) && !empty($_POST['update'])) {
                    $this->updateObjet();
                } elseif (isset($_POST['delete']) && !empty($_POST['delete'])) {
                    $this->deleteObjet();
                }
                break;
            default:
                throw new \Exception("Unsupported request method: $method");
        }
    }
    public function count()
    {
        $stat = new Stat();
        $stat->incrementCount();
        exit;
    }
    public function show()
    {
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
        $page= ucfirst($pages);
        
        $className = "Models\\" . $page; // Assure-toi que la classe est bien dans le bon namespace

        if (!class_exists($className)) {
            die("Erreur : La classe $className n'existe pas.");
        }
        $objet = new $className();
        $objetList = $objet->getAllObjet();
        // var_dump($objetList);

        require_once __DIR__ . '/../Vues/admin/'. $pages.'.php';
    }
    public function createObjet()
    {
        // Récupérer la page demandée
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ;
        $images = new Image();
        $contents = new Content();
    
        // Upload de l'image
        $imagePath = $images->createUpload();
        
        // Création de l'article avec l'image
        $contents->createAllObjet($imagePath);

            // Redirection après traitement
            // var_dump($_POST);
            header("Location: /zoo/public/index.php?page=" . $pages);
            exit;
    }
    
    public function updateObjet()
    {
        $content = new Content();
        return $content->updateAllObjet();
    }
     public function deleteObjet()
    {
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
        $contents = new Content();
        $contents->deleteAllObjet();
        header("location: /zoo/public/index.php?page=" . $pages);
    }


}


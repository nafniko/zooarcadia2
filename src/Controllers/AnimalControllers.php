<?php

namespace Controllers;

use Models\Animal;
use Models\Habitat;
use Models\Image;
use Models\Stat;

class AnimalControllers
{
    private $animaux;

    public function __construct()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'admin') {
            $this->admin();
        }
    }

    public function show()
    {
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
        $page = ucfirst($pages);

        $className = "Models\\" . $page; // Assure-toi que la classe est bien dans le bon namespace

        if (!class_exists($className)) {
            die("Erreur : La classe $className n'existe pas.");
        }
        $objet = new $className();
        $objetList = $objet->getAllObjet();
        // var_dump($objetList);

        require_once __DIR__ . '/../Vues/admin/' . $pages . '.php';
    }
    public function createObjet()
    {
        // Récupérer la page demandée
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        $images = new Image();
        $contents = new Animal();

        // Upload de l'image
        var_dump($_POST);
        $imagePath = $images->createUpload();

        // Création de l'article avec l'image
        $contents->createAnimal($imagePath);

        // Redirection après traitement
           header("Location: /zoo/public/index.php?page=" . $pages);
        exit;
    }
    public function updateObjet()
    {
        $content = new Animal();
        return $content->updateAllObjet();
    }
    public function deleteObjet()
    {
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
        $contents = new Animal();
        $contents->deleteAllObjet();
        header("location: /zoo/public/index.php?page=" . $pages);
    }

    public function admin()
    {
        $method = $_SERVER["REQUEST_METHOD"];

        switch ($method) {
            case 'GET':
                $this->show();
                break;
            case 'POST':
                if (isset($_POST['create'])) {
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
    public function index()
    {
        
        $this->animaux = (new Animal())->getWithCom();
        $animaux = $this->animaux;
        $habitats = new Habitat();
        $habitats->getAllObjet();
        require_once __DIR__ . '/../Vues/_animaux.php';
    }
}

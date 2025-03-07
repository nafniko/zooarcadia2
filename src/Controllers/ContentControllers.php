<?php

namespace Controllers;

use Models\Animal;
use Models\Content;
use Models\User;
use Models\Avis;
use Models\Service;
use Models\Image;

class ContentControllers
{
    private $content;
    private $img;

    public function __construct()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'admin') {
            $this->admin();
        }
        
    }

    public function index()
    {
        $this->content = (new Content())->getAllObjet();
        foreach ($this->content as $key => $contents) {
            if ($contents->getCategorie() == 'accueil') {
                require __DIR__ . '/../Vues/_content.php';
            }
        }
        $this->img = new Image;
        $this->img = $this->img->getImageAll();
        $img = $this->img;
        foreach ($this->img as $key => $imgs) {
            if ($imgs->getInfos() == 'caroussel') {
                $imgd[] = $imgs;
            }
        }

        foreach ($this->content as $key => $contents) {
            if ($contents->getCategorie() == 'a') {
                require __DIR__ . '/../Vues/_caroussel.php';
            }
        }
        $avis = new Avis;
        $avis = $avis->getAvis();
        require __DIR__ . '/../Vues/_avis.php';
    }

    public function avis()
    {
        $avis = new Avis();
        $avis->createAvis($_POST);
        header("Location: /zoo/public/index.php?page=index");
        exit;
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

    public function show()
    {
        $content = new Content();
        $service = new Service();
        $contents = $content->getAllObjet();
        $services = $service->getAllObjet();

        require __DIR__ . '/../Vues/admin/content.php';
    }
    public function createObjet()
    {
        // Récupérer la page demandée
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
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

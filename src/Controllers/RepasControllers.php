<?php

namespace Controllers;

use Models\Animal;
use Models\Content;
use Models\Habitat;
use Models\Repas;
use Models\Service;
use Models\User;
use Models\Rapport;
use Utils\SessionManager;

class RepasControllers
{

    public function index()
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
                    $this->updateObjet($id);
                } elseif (isset($_POST['delete']) && !empty($_POST['delete'])) {
                    $this->deleteObjet($id);
                }
                break;
            default:
                throw new \Exception("Unsupported request method: $method");
        }
    }

    public function getClass()
    {
        $animal = new Animal();
        $habitat = new Habitat();
        $content = new Content();
        $service = new Service();
        $rapport = new Rapport();
        $users = new User();
        $repas = new Repas();

        $animaux = $animal->getAllObjet();
        $contents = $content->getAllObjet();
        $habitats = $habitat->getAllObjet();
        $services = $service->getAllObjet();
        $user = $users->getAllObjet();
        $rapports = $rapport->getAllObjet();
        $repasx = $repas->getAllObjet();
    }

    public function show()
    {
        $animal = new Animal();
        $repasx = new Repas();
        $animaux = $animal->getAllObjet();
        $repas = $repasx->getAllObjet();
        require __DIR__ . '/../Vues/admin/repas.php';
    
    }

    public function createObjet()
    {
    $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
    $page= ucfirst($pages);
    
    $animal = new Animal();
    $repas = new Repas();
    $animaux = $animal->getAllObjet();
    $repasx = $repas->getAllObjet();
    $method = $_SERVER["REQUEST_METHOD"];
        if ($method == 'POST') {
            $repas->createAllObjet();
            var_dump($_POST);

            header("location: /zoo/public/index.php?page=" . $pages);
        }
        require_once __DIR__ . '/../Vues/admin/'. $pages.'.php';
    }
    public function updateObjet($id)
    {
        require __DIR__ . '/../Views/rapport/create.php';
    }
    public function deleteObjet()
    {
    $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';

    $repas = new Repas();
    $repas->deleteAllObjet();
    header("location: /zoo/public/index.php?page=" . $pages);
    }
    

    
}
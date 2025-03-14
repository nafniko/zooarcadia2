<?php

namespace Controllers;

use Models\Animal;
use Models\Content;
use Models\Habitat;
use Models\Repas;
use Models\Service;
use Models\User;
use Models\Rapport;
use Models\Stat;
use Models\Avis;

use Utils\SessionManager;

class DashboardControllers
{
    public function __construct()
    {

        if (isset($_POST['valider'])) {
            $this->valider();
        }
        if (isset($_POST['sup_avis'])) {
            $this->delAvis();
        }
    }

    public function valider()
    {
        $avis = new Avis();
        $avis->updateAvis();
    }
    public function delAvis()
    {
        $avis = new Avis();
        $avis->deleteAvis();
    }

    public function index()
    {
        // $session= new SessionManager();
        // $session->start();
        // $session->get('user');


        require __DIR__ . '/../Vues/admin/dashboard.php';
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
        $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
        $page = ucfirst($pages);

        $className = "Models\\" . $page; // Assure-toi que la classe est bien dans le bon namespace
        if (!class_exists($className)) {
            die("Erreur : La classe $className n'existe pas.");
        }
        $objet = new $className();
        // var_dump($objet);
        $objetList = $objet->getAllObjet();
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method == 'POST') {
            $objet->createObjet();
            header("location: /zoo/public/index.php?page=" . $pages);
        }
        require_once __DIR__ . '/../Vues/admin/' . $pages . '.php';
    }

    public function updateObjet($id)
    {
        // Code for the update method
    }

    public function deleteObjet($id)
    {
        // Code for the destroy method
    }

    public function crud($id = null)
    {
        $method = $_SERVER["REQUEST_METHOD"];

        switch ($method) {
            case 'GET':
                $this->show();
                break;
            case 'POST':
                if (isset($_POST['create']) && !empty($_POST['create'])) {
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
}

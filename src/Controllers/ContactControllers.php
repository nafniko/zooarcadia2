<?php

namespace Controllers;
use Models\Contact;
class ContactControllers
{
    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->send();
            // header('Location: /zoo/public/index?page=contact');
        }else{
            $this->show();
        }
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
        $objetList = $objet->sendMail();
        // var_dump($objetList);

        require_once __DIR__ . '/../Vues/'. $pages.'.php';
    }

public function send()
{
    $contact = new Contact();
    $contact->sendMail();
}
}



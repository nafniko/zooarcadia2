<?php

namespace Models;

class Roles
{
    private $id;
    private $nom;
    private $error;

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

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function permissionVeto($page)
    {
        $pagesInterdites = ['content', 'stat', 'animal', 'user', 'services', 'avis'];
        $this->error =' En tant que veterinaire vous avez acces aux pages suivantes : rapport, repas';
        $error=$this->error;

        if (in_array($page, $pagesInterdites)) {
            header('Location: index.php?page=404');
            exit();
        }
    }
    
    public function permissionEmploye($page)
    {
        $pagesInterdites = ['rapport', 'stat', 'user'];

        
        if (in_array($page, $pagesInterdites)) {
            header('Location: index.php?page=404');
            exit();
        }
    }

    public function permissionVisitor($routes,$page)
    {
        if ($routes[$page]['vue'] == 'admin') {
            header('Location: index.php?page=404');
            exit();
        }
    }
    
public function permission($page)
{
    if (isset($_SESSION['roles'])) {
               
        switch ($_SESSION['roles']) {
            case 1: // Vérifier si le rôle est bien un string ou un int
                 $this->permissionVeto($page);
                break;
                case 2:
                     $this->permissionEmploye($page);
                     break;
                    
                }
            }
}

}

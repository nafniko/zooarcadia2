<?php

namespace Models ;
    
use Models\Models;

class User extends Models
{
    private $id;
    private $username;
    private $passwords;
    private $email;
    private $roles;

    public function __construct($data = null)
    {
        if ($data != null) {
            $this->hydrate($data);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPasswords()
    {
        return $this->passwords;
    }

    public function setPasswords($passwords)
    {
        $this->passwords = $passwords;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    // Dans le modèle Users ou une classe de validation séparée
    public function validateLogin($email, $password, $csrfToken)
    {
        $error = null;

        // Vérification du token CSRF
        if ($_SESSION['csrf_token'] !== $csrfToken) {
            $error = "Token CSRF invalide.";
        }

        // Validation des champs
        if (empty($email) || empty($password)) {
            $error = "Veuillez remplir tous les champs.";
        }

        // Vérification des identifiants
        if (!$this->verifyUsers($email, $password)) {
            $error = "L'email ou le mot de passe est incorrect.";
        }

        return $error; // Retourne l'erreur ou null s'il n'y a pas d'erreurs
    }

    public function verifyUsers($inputEmail,$password)
    {
        $ok=$this->getEmailByEmail("users", $inputEmail,"Models\User");
       $ok->getEmail() == $inputEmail && password_verify($password, $ok->getPasswords());
        return $ok;
    }
      
        public function getAllObjet()
        {
            return $this->getAll("users", "Models\User");
        }
     
        public function createObjet()
        {
            // Vérifie si les champs email, Passwords et role sont présents dans $_POST
            if (isset($_POST['email']) && isset($_POST['Passwords']) && isset($_POST['role'])) {
        
                // Assainit l'email pour éviter les injections
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        
                // Hash le mot de passe en utilisant password_hash avec PASSWORD_DEFAULT pour la sécurité
                $password = password_hash(htmlspecialchars($_POST['Passwords'], ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
        
                // Assainit le rôle en échappant les caractères spéciaux
                $role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
        
                // Prépare un tableau associatif avec les données à insérer dans la base de données
                $data = [
                    "email" => $email,
                    "Passwords" => $password,
                    "roles" => $role
                ];
            }
        
            // Appelle la méthode create pour insérer les données dans la table "users"
            return $this->create($data, "users");
        }
        
      
}
?>

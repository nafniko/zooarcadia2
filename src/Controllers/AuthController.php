<?php

namespace Controllers;

use Models\User;
use Models\Animal;
use Utils\SessionManager;



class AuthController
{

    public function login()
    {
        $errors = [];
        $session = new SessionManager();
        $session->start();

        if (isset($_POST["connexion"])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

            $userModel = new User();


            $isValidUser = $userModel->verifyUsers($email, $password);

            if ($isValidUser) {
                $userModel=new User();
                $roles=$userModel->findEmail($email);
                $role=$roles->getRoles();
                // session_regenerate_id(true);
                $session->set('user', $email);
               $session->set('roles', $role);

                header("location: /zoo/public/index.php?page=dashboard");
            } else {
                $errors[] = "L'email ou le mot de passe est incorrect";
            }
        } else {
            require_once __DIR__ . '/../Vues/_connexion.php';
        }
    }

    public function logout()
    {
        $session = new SessionManager();

        $session->destroy();
        header("location: /zoo/public/index.php?page=index");
    }
}

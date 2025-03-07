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
            $email = $_POST['email'];
            $password = $_POST['Passwords'];

            $userModel = new User();

            // var_dump($userModel);

            $isValidUser = $userModel->verifyUsers($email, $password);

            if ($isValidUser) {
                // session_regenerate_id(true);
                $session->set('user', $email);

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

<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utils/route.php';

use Utils\SessionManager;
use Models\Roles;

$session = new SessionManager();
$session->start();

$method = $_SERVER["REQUEST_METHOD"];
$currentpage = basename($_SERVER['SCRIPT_NAME']);

// Récupérer la route demandée depuis l'URL

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['default' => null]]);
$role =new Roles();
$role->permission($page);

$vueHeader = $routes[$page]['vue']?? 'user';
if ($session->get('user') === null && $vueHeader == 'admin'||$vueHeader == 'logout') {
    header("location: /zoo/public/index.php?page=connexion");
}


// Vérifier si la route existe
if (array_key_exists($page, $routes)) {
    $controllerName = "Controllers\\" . $routes[$page]['controller'];
    $actionName = $routes[$page]['action'];

    if ($vueHeader == 'admin' && $method == 'GET') {
        require_once __DIR__ . '/../src/Vues/admin/header.php';
    } elseif ($vueHeader == 'user' && $method == 'GET') {
        require_once __DIR__ . '/../src/Vues/_header.php';
    }

//debug

    // var_dump($_POST);
    // var_dump($page);
    // var_dump($method);
    // var_dump($controllerName);
    // var_dump($actionName);
    // var_dump($routes[$page]['js']);
    // var_dump($_SESSION);


    // Instancier le contrôleur et appeler l'action
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        $controller = new $controllerName();

        if ($id !== null) {
            $controller->$actionName($id);
        } else {
            $controller->$actionName();
        }
    } else {
        // Erreur : contrôleur ou méthode introuvable
        echo 'erreur controller ou methode introuvable';
        require_once __DIR__ . '/../src/Vues/404.php';
    }
} else {
    // Route inconnue
    require_once __DIR__ . '/../src/Vues/_header.php';
    require_once __DIR__ . '/../src/Vues/404.php';
}
if ($vueHeader == 'admin' && $method == 'GET') {
    require_once __DIR__ . '/../src/Vues/admin/footer.php';
} else {
    require_once __DIR__ . '/../src/Vues/_footer.php';
}

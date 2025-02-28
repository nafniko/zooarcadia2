<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utils/route.php';

use Utils\SessionManager;

$session= new SessionManager();
$session->start();

// var_dump($_SERVER["REQUEST_METHOD"]);
$method = $_SERVER["REQUEST_METHOD"];
$currentpage=basename($_SERVER['SCRIPT_NAME']);
// var_dump($currentpage);
// var_dump($_POST);
 

// $lesAvis = $collection->find(['validé' => false]);

// Récupérer la route demandée depuis l'URL

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'index';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['default' => null]]);
// var_dump($page);

$vueHeader = $routes[$page]['vue'];
if($session->get('user')===null && $vueHeader=='admin'){
    header("location: /zoo/public/index.php?page=connexion");
}
// var_dump($method);

   
// Vérifier si la route existe
if (array_key_exists($page, $routes)) {
    $controllerName = "Controllers\\" . $routes[$page]['controller'];
    $actionName = $routes[$page]['action'];
// var_dump($controllerName);
// var_dump($actionName);
    
    if($vueHeader=='admin'&& $method=='GET'){
        require_once __DIR__ . '/../src/Vues/admin/header.php';
    }elseif($vueHeader=='user'&& $method=='GET'){
        require_once __DIR__ . '/../src/Vues/_header.php';
    }

    // Instancier le contrôleur et appeler l'action
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        $controller = new $controllerName();
// var_dump($controller);

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
    require_once __DIR__ . '/../src/Vues/404.php';
}
if($vueHeader=='admin'&& $method=='GET'){
    require_once __DIR__ . '/../src/Vues/admin/footer.php';
}else{
    require_once __DIR__ . '/../src/Vues/_footer.php';
}

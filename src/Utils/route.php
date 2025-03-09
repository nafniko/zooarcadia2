<?php



$navLinks =[
    "index"=>[
       
        "path"=> "/zoo/public/index?page=index",
        "title"=> "Accueil",
        "icons"=>'<i class="bi bi-house-door"></i>',
    
    ],
    "service"=>[
        "path"=> "/zoo/public/index?page=service
",
        "title"=> "Services",
        "icons"=>'<i class="bi bi-activity"></i>'
    ],

    "habitats"=>[
        "path"=> "/zoo/public/index?page=habitats
",
        "title"=> "Habitats",
        "icons"=>'<i class="bi bi-app"></i>'
    ],

    "contact"=>[
        "path"=> "/zoo/public/index?page=contact",
        "title"=> "Contact",
        "icons"=>'<i class="bi bi-send"></i>'
    ],

];
$routes = [
    "index" => [
        "controller" => "ContentControllers",
        "path"=> "/zoo/public/index",
        "head_title"=> "Zoo Arcadia",
        "title"=> "Accueil",
        "icons"=>'<i class="bi bi-house-door"></i>',
        "current"=> "index.php",
        "action" => "index",
        "meta-description"=>"Découvrez le Zoo Arcadia, un espace écologique dédié à la préservation des espèces et à l’éducation environnementale. Visitez des habitats naturels recréés et soutenez nos initiatives de conservation durable.",
        "vue"=> "user",
        "js"=> "avis.js",

    ],

    "service" => [
        "controller" => "ServiceControllers",
        "current"=> "services.php",
        "action" => "index",
        "path"=> "/zoo/public/index?page=service",
        "head_title"=> "services : Zoo Arcadia",
        "meta-description" => "Découvrez nos services : restauration éco-responsable, visites guidées des habitats, et balades en petit train. Une expérience unique dans un zoo engagé pour la conservation.",
        "title"=> "Services",
        "icons"=>'<i class="bi bi-activity"></i>',
        "vue"=> "user"

    ],
    "habitat" => [
        "controller" => "HabitatController",
        "current"=> "habitat.php",
        "action" => "show",
        "path"=> "/zoo/public/index?page=habitat",
        "title"=> "Habitats",
        "icons"=>'<i class="bi bi-app"></i>',
        "head_title"=> "habitat : Zoo Arcadia",
        "meta-description" => "Explorez nos habitats naturels recréés pour offrir aux animaux un environnement adapté et immersif. Apprenez-en plus sur les initiatives de conservation en cours au Zoo Arcadia.",
        "vue"=> "user"
    ],
    "habitats" => [
        "controller" => "HabitatController",
        "current"=> "habitats.php",
        "action" => "index",
        "path"=> "/zoo/public/index?page=habitats",
        "title"=> "Contact",
        "icons"=>'<i class="bi bi-send"></i>',
        "head_title"=> "habitats : Zoo Arcadia",
        "meta-description" => "Visitez nos différents habitats et observez la faune dans des environnements recréés qui favorisent la conservation des espèces. Un voyage immersif dans le monde animal.",
        "vue"=> "user"
    ],
    "restaurants" => [
        "controller" => "RestaurantController",
        "path"=> "restaurants.php",
        "action" => "index",
        "head_title"=> "Restaurants : Zoo Arcadia",
        "meta-description" => "Dégustez une cuisine éco-responsable dans nos restaurants au Zoo Arcadia, où nous mettons un point d'honneur à proposer des plats respectueux de l'environnement.",
        "vue"=> "user"
    ],
    "contact" => [
        "controller" => "ContactControllers",
        "path"=> "/zoo/public/index?page=contact",

        "action" => "show",
        "head_title"=> "Contacts : Zoo Arcadia",
        "meta-description" => "Contactez-nous pour toute information ou question concernant votre visite au Zoo Arcadia. Notre équipe est là pour vous aider et vous guider dans votre expérience.",
        "vue"=> "user",
        "js"=> "contact.js"
    ],
    "animaux" => [
        "controller" => "AnimalControllers",
        "path"=> "/zoo/public/index?page=animaux",
        "action" => "index",
        "head_title"=> "Animaux : Zoo Arcadia",
        "meta-description" => "Découvrez nos animaux au Zoo Arcadia et apprenez-en davantage sur leur habitat naturel, leur comportement et les actions de conservation menées pour leur préservation.",
        "vue"=> "user"
    ],
    "erreur"=>[
        "head_title"=> "Erreur : Zoo Arcadia",
       
        "meta-description" => "Une erreur s'est produite. Nous nous excusons pour le dérangement. Veuillez réessayer plus tard ou contactez-nous pour toute question."
    ],
    "connexion" => [
        "controller" => "AuthController",
        "path"=> "/zoo/public/index.php?page=connexion",
        "action" => "login",
        "head_title"=> "connexion : Zoo Arcadia",
        "meta-description" => "Connectez-vous à votre compte sur le site du Zoo Arcadia pour accéder à des services exclusifs, gérer vos réservations, ou consulter vos informations personnelles.",
        "vue"=> "user"
        
    ],
    "dashboard" => [
        "controller" => "DashboardControllers",
        "path"=> "/zoo/public/index.php?page=dashboard",
        "action" => "index",
        "vue"=> "admin",
        
    ],
    "user" => [
        "controller" => "DashboardControllers",
        "path"=> "/zoo/public/index.php?page=user",
        "action" => "crud",
        "vue"=> "admin"
    ],
    "rapport" => [
        "controller" => "RapportControllers",
        "path"=> "/zoo/public/index.php?page=rapport",
        "action" => "index",
        "vue"=> "admin"
    ],
    "repas" => [
        "controller" => "RepasControllers",
        "path"=> "/zoo/public/index.php?page=repas",
        "action" => "index",
        "vue"=> "admin"
    ],
    "animal" => [
        "controller" => "AnimalControllers",
        "path"=> "/zoo/public/index.php?page=animal",
        "action" => "admin",
        "vue"=> "admin",
        "js"=> "animaux.js"
    ],
    "stat" => [
        "controller" => "StatControllers",
        "path"=> "/zoo/public/index.php?page=stat",
        "action" => "show",
        "vue"=> "admin"
    ],
    "avis" => [
        "controller" => "DashboardControllers",
        "path"=> "/zoo/public/index.php?page=avis",
        "action" => "crud",
        "vue"=> "admin"
    ],
    "poster" => [
        "controller" => "ContentControllers",
        "path"=> "/zoo/public/index.php?page=avis",
        "action" => "avis",
        "vue"=> "admin"
    ],
    "services" => [
        "controller" => "ServiceControllers",
        "action" => "admin",
        "path"=> "/zoo/public/index?page=service",
        "vue"=> "admin",
        "js"=> "modifier.js"

    ],
    "content" => [
        "controller" => "ContentControllers",
        "path"=> "/zoo/public/index.php?page=content",
        "action" => "admin",
        "vue"=> "admin"
    ],
    "logout" => [
        "controller" => "AuthController",
        "path"=> "/zoo/public/index.php?page=logout",
        "action" => "logout",
        "vue"=> "logout"
    ],
];



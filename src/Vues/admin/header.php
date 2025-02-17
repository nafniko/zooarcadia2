
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="zoo/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zoo/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/zoo/public/scss/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark color_dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin/index.php">
                <i class="bi bi-speedometer2 pe-none me-2"></i> Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="zoo/public/index.php?page=index">
                            <i class="bi-speedometer2 bi pe-none me-2"></i> Site Web
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=user">
                            <i class="bi-table bi pe-none me-2"></i> Créer un utilisateur
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=rapport">
                            <i class="bi-table bi pe-none me-2"></i> Rapport
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=repas">
                            <i class="bi-table bi pe-none me-2"></i> Repas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=content">
                            <i class="bi-table bi pe-none me-2"></i> Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=services">
                            <i class="bi-table bi pe-none me-2"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=animal">
                            <i class="bi-table bi pe-none me-2"></i> Animaux
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=stat">
                            <i class="bi-table bi pe-none me-2"></i> Statistiques
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=avis">
                            <i class="bi-table bi pe-none me-2"></i> les avis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoo/public/index.php?page=logout">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="  flex-grow-1 d-flex flex-wrap justify-content-center gap-2 align-items-center px-4 ">

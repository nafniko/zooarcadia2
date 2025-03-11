<h1 class="container text-center text-white pt-4">Repas</h1>
<div class="container d-flex flex-wrap">

    <div class="row align-items-start block-contain rounded-4 m-1 col-lg-6 col-md-12 col-sm-12">
        <div class="col-12 mb-4">
            <h2 class="text-white pt-4 text-center">Compte rendu des repas</h2>
            <div class="row">
                <?php foreach ($repas as $repasx) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <form method="POST" class="d-flex justify-content-end mb-2">
                                    <button class="btn btn-danger btn-sm" type="submit" name="delete"
                                        value="<?= htmlentities($repasx->getId()) ?>">
                                        <strong>X</strong>
                                    </button>
                                </form>
                                <h5 class="card-title"><?= htmlentities($repasx->getPrenom()) ?> </h5>
                                <p><strong>Nourriture:</strong> <?= htmlentities($repasx->getNourriture()) ?></p>
                                <p><strong>Quantité:</strong> <?= htmlentities($repasx->getQuantite()) ?></p>
                                <p><strong>Date du repas:</strong> <?= htmlentities($repasx->getDate_repas()) ?></p>
                                <p><strong>Repas Id:</strong> <?= htmlentities($repasx->getId()) ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-md-12 col-sm-12">
        <div class="block-contain rounded-4 m-1 p-3">
            <h2 class="text-white text-center">Ajouter un repas</h2>
            <form action="" method="post" class="text-white">
                <div class="mb-3">
                    <label for="animal" class="form-label">Animal</label>
                    <select class="form-select" name="animal" id="animal" aria-label="Choisir un animal">
                        <option selected disabled>Choisir un animal</option>
                        <?php foreach ($animaux as $animal) { ?>
                            <option value="<?= htmlentities($animal->getId()) ?>">
                                <?= htmlentities($animal->getPrenom()) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nourriture" class="form-label">Nourriture</label>
                    <input type="text" class="form-control" id="nourriture" name="nourriture" placeholder="Entrez la nourriture">
                </div>

                <div class="mb-3">
                    <label for="quantité" class="form-label">Quantité</label>
                    <input type="text" class="form-control" id="quantité" name="quantité" placeholder="Entrez la quantité">
                </div>

                <div class="mb-3">
                    <label for="dates" class="form-label">Date du repas</label>
                    <input type="date" class="form-control" id="dates" name="dates">
                </div>

                <div class="d-grid">
                    <button type="submit" name="create" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<h1 class="container text-center text-white pt-4">Repas</h1>
<div class="container d-flex">

<div class="  row align-items-start block-contain rounded-4 m-1 col-lg-7">
    <div class="col-md-12 mb-4">
        <h2 class="text-white pt-4 text-center">Compte rendu des repas</h2>

        <div class="row">
            <?php foreach ($repas as $repasx) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" class="d-flex justify-content-end">
                            <button class="btn btn-danger  " type="submit" name="delete"
                                value="<?= htmlentities($repasx->getId()) ?>"><strong>X</strong></button>
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
<div class=" text-center col-lg-5 col-md-12 col-sm-12">
    <div class=" block-contain rounded-4 m-1 ">
        <h2 class=" text-white text-center ">Ajouter un repas</h2>
        <form action="" method="post" class=" text-white container">
            <div class="mb-3 ">
                <label for="prenom" class="form-label">animal</label>
                <select class="form-select" name="id" id="id" aria-label="Default select example">
                    <option selected>choisir un animal</option>
                    <?php foreach ($animaux as $animal) {  ?>
                    <option value="<?= htmlentities($animal->getId()) ?>">
                        <?= htmlentities($animal->getPrenom()) ?>
                        <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="nourriture" class="form-label">nourriture</label>
                <input type="text" class="form-control" id="nourriture" name="nourriture">
            </div>
            <div class="mb-3">
                <label for="quantité" class="form-label">quantité</label>
                <input type="text" class="form-control" id="quantité" name="quantité">
            </div>
            <div class="mb-3">
                <label for="dates" class="form-label">date de passages</label>
                <input type="date" class="form-control" id="dates" name="dates">
                <div class="col-auto ">
                    <button type="submit" name="create" class="btn btn-primary m-1">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

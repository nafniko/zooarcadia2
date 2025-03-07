<div class="d-flex flex-wrap justify-content-center w-75 container">
    <?php
    foreach ($animaux as $getAnimals) {
    ?>
        <div class="d-flex justify-content-center align-items-center  flex-column ">
            <div data-animal-id="<?= htmlentities($getAnimals->getId()) ?>" class="card mycard m-4 text-center rounded-4">
                <img src="/zoo/public<?= htmlentities($getAnimals->getChemin()) ?>" class="  imgcontents rounded-4 img-fluid "
                    alt="<?= htmlentities($getAnimals->getPrenom()) ?>">
                <h3 class="mt-3"><?= htmlentities($getAnimals->getPrenom()) ?></h3>
                <div class="details visually-hidden-focusable  text-center">
                    <div class=" card-body  ">
                        <p class="card-text">Race : <?= htmlentities($getAnimals->getRace()) ?></p>
                        <p class="card-text">Commentaire : <?= htmlentities($getAnimals->getCommentaire()) ?></p>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="d-flex justify-content-evenly mt-5">
    <?php
    foreach ($habitats as $key => $habitat) {
    ?>
        <a href="/zoo/public/index.php?page=habitat&id=<?= htmlentities($habitat->getId()) ?>"
            class="lien-buttons text-center btn align-middle mb-4" aria-label="<?= htmlentities($habitat->getTitres()) ?>"><?= $habitat->getTitres() ?></a>
    <?php
    }
    ?>
</div>

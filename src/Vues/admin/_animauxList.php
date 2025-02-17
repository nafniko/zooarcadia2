
<div class="row align-items-start block-contain rounded-4 m-4">
    <div class="col-md-12 mb-4">
        <h2 class="text-white pt-4 text-center">Nos Animaux</h2>

        <div class="row">
            <?php foreach ($animaux as $animal) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlentities($animal->getPrenom()) ?> </h5>
                            <p><strong>ID:</strong> <?= htmlentities($animal->getRace()) ?></p>
                            <p><strong>Commentaire:</strong> <?= htmlentities($repasx->getCommentaire()) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
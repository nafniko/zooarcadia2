<?php


?>

<h2 class="text-center text-white pt-4 mb-4"><?= htmlentities($contents->getTitre()) ?></h2>
<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center block-contain container rounded-4">
        <div class="row g-0 position-relative align-items-center">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="/zoo/public<?= htmlentities($contents->getChemin()) ?>" class="w-100" alt=" du zoo">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <p class="text-white"><?= htmlentities($contents->getDescriptions()) ?></p>
            </div>
        </div>
    </div>
</div>






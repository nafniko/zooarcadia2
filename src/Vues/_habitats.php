<h1 class="text-center text-white pt-4 mb-4">Les habitats</h1>
<div class="pb-3">

    <div class="block-contain container rounded-4 mb-3">
        <div class="d-flex justify-content-center">

            <div class="row d-flex justify-content-center">
                <?php foreach ($habitats as $habitat): ?>
                <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
                    <a href="/zoo/public/index.php?page=habitat&id=<?= htmlentities($habitat->getId()) ?>
" class="d-flex container-fluid justify-content-center link-offset-2 link-underline link-underline-opacity-0 custom-img image-link" >
                        <div class=" text-white">
                            <img src="/zoo/public<?= htmlentities($habitat->getChemin()) ?>" class="card-img habitat-img img-fluid" alt=" du zoo">
                            <div class="d-flex align-items-end p-0">
                                <h2 class="card-title text-center w-100 bg-opacity-75  m-0"><?= htmlentities($habitat->getTitres()) ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>



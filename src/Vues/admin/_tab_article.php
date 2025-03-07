        <div class="col-lg-5 col-sm-12 mb-4">
            <div class=" table-responsive container block-contain rounded-4 tab_fix overflow-auto">
                <h2 class="text-white">Listes des articles</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">titre</th>
                            <th scope="col">descriptions</th>
                            <th scope="col">image</th>
                            <th scope="col">image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contents as $key => $content) { ?>
                            <tr>
                                <th class="col-1 col-md-1" scope="row"><?= htmlentities($content->getId()) ?></th>
                                <td class="col-1 col-md-1"><?= htmlentities($content->getTitre()) ?></td>
                                <td class="col-3 col-md-2">
                                    <p class="d-inline-flex gap-1">
                                        <a class="btn btn-primary" data-bs-toggle="collapse"
                                            href="#collapseExample<?= htmlentities($content->getId()) ?>" role="button"
                                            value="<?= htmlentities($content->getId()) ?>" aria-expanded="false"
                                            aria-controls="collapseExample<?= htmlentities($content->getId()) ?>">
                                            descriptions
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample<?= htmlentities($content->getId()) ?>">
                                        <div>
                                            <?= $content->getDescriptions() ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-3 col-md-2"><img class="w-25" src="/zoo/public/<?= htmlentities($content->getChemin()) ?>"
                                        alt=""></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
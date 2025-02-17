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
                            <th scope="col">supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($contents as $key=>$content) { ?>
<tr>
    <th scope="row"><?= htmlentities($content->getId())?></th>
    <td>
        <div class="titre" data-controller="content" data-id="<?= htmlentities($content->getId()) ?>">
            <?= htmlentities($content->getTitre()) ?>
        </div>
    </td>
    <td>
        <p class="d-inline-flex gap-1">
            <button class="btn btn-primary" data-bs-toggle="collapse"
                href="#collapseExample<?= htmlentities($content->getId() )?>"
                onKeyPress="handleKeyPress(event)"
                onKeyDown="handleKeyDown(event)"
                onKeyUp="handleKeyUp(event)"
                value="<?= htmlentities($content->getId() )?>"
                aria-expanded="false"
                aria-controls="collapseExample<?= htmlentities($content->getId() )?>">
                descriptions
            </button>
        </p>
        <div class="collapse " id="collapseExample<?= htmlentities($content->getId())?>">
    <div class="description" data-controller="content" data-id="<?= htmlentities($content->getId()) ?>">
        <?= htmlentities($content->getDescriptions()) ?>
    </div>
</div>

    </td>
    <td><img src="/zoo/public<?= htmlentities($content->getChemin())?>" alt="" class="img-fluid"></td>
    <td>
        <form method="POST" action="">
            <button class="btn btn-danger" type="submit" name="delete_article" value="<?= htmlentities($content->getId()) ?>">
                <strong>X</strong>
            </button>
        </form>
    </td>
</tr>
                        <?php }?>
                    </tbody>
                </table>
                </div>
                </div>
              

                <div class="col-lg-5 col-sm-12">
                <div class=" container block-contain rounded-4">
                    <form action="" method="post" enctype="multipart/form-data" class=" text-white">
                        <div class="mb-3 pt-3">
                            <label for="page" class="form-label">ajouter </label>
                            <select class="form-select" name="page" id="page">
                                <option selected>choisir la page </option>
                                <option value="Article">Article </option>
                                <option value="Service">Service </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="titre" class="form-label">titre</label>
                            <input type="text" class="form-control" id="titre" name="titre"
                                placeholder="choisir un nouveau titre" required>
                        </div>
                        <div class="mb-3 pt-3">
                            <label for="descriptions" class="form-label">contenu</label>
                            <textarea class="form-control" id="descriptions" name="descriptions"
                                placeholder="Rediger l'article !" rows="3" required></textarea>
                            <div class="mb-3">
                                <label for="image" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="image"name="image" required>
                            </div>
                            <div class="mb-3 pt-3">
                            <label for="categorie" class="form-label">categorie </label>
                            <select class="form-select" name="categorie" id="categorie">
                                <option selected>choisir la page </option>
                                <option value="accueil">Accueil </option>
                                <option value="service">Service </option>
                                <option value="restau">Restau </option>
                            </select>
                        </div>
                            <div class="col-auto mt-4">
                                <button type="submit" name="create" class="btn btn-primary mb-3">creer
                                    l'article</button>
                            </div>
                    </form>
                </div>
            </div>
      
          
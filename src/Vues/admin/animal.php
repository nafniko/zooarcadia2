<div class="container-fluid">
    <div class="col-md-12 col-sm-12 mb-4">
        <h2 class="text-white pt-4 text-center">Listes des animaux</h2>
        <div class="row justify-content-center">
            <?php foreach ($objetList as $value) { ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3 d-flex justify-content-center">
                    <img data-prenom="<?= htmlentities($value->getPrenom()) ?>"
                         data-id="<?= htmlentities($value->getId()) ?>"
                         src="/zoo/public<?= htmlentities($value->getChemin()) ?>"
                         class="card-img-top rounded-4 img-fluid"
                         alt=""
                         style="width: 100%; height: 200px; object-fit: cover;">
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="container-fluid text-center">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12">
            <h2 class="text-white pt-4">Ajouter un animal</h2>
            <div class="block-contain rounded-4 p-4">

                <form method="post" enctype="multipart/form-data" class="text-white">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    <div class="mb-3">
                        <label for="habitat" class="form-label">Habitat</label>
                        <select class="form-select" name="habitat" id="habitat" required>
                            <option value="" disabled selected>Choisir un habitat</option>
                            <option value="1">Savane</option>
                            <option value="2">Jungle</option>
                            <option value="3">Marais</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>

                    <div class="mb-3">
                        <label for="race" class="form-label">Race</label>
                        <input type="text" class="form-control" id="race" name="race" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="create" class="btn btn-primary create">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container col-lg-9 col-sm-12 ">
    <div class="col-md-12 col-sm-12 mb-4">
        <h2 class="text-white pt-4 text-center">Listes des animaux</h2>
        <div class="row">
            <?php foreach ($objetList as $value) { ?>
                <div class="col-2 mb-3 ">
                        <img data-prenom="<?= htmlentities($value->getPrenom()) ?>" data-id="<?= htmlentities($value->getId()) ?>" src="/zoo/public<?= htmlentities($value->getChemin()) ?>" class="card-img-top rounded-4 " alt="" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col">
            <h2 class="text-white pt-4">Ajouter un animal</h2>
            <div class="block-contain rounded-4 p-4">

                <form method="post"  enctype="multipart/form-data" class="text-white">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    <div class="mb-3">
                        <label for="habitat" class="form-label">Habitat</label>
                        <select class="form-select" name="habitat" id="habitat">
                            <option selected>Choisir un habitat</option>
                                <option value="1">Savane
                                </option>
                                <option value="2">Jungle
                                </option>
                                <option value="3">Marais
                                </option>
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

                    <div class="d-flex justify-content-center gap-2">
                        <button type="submit" name="create" class="btn btn-primary create">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

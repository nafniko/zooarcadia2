



<div class=" container col-lg-9 col-sm-12">
    <form action="" method="post" class=" text-white">
        <div class=" block-contain rounded-4 p-4">
            <h2 class=" text-white "> un commentaire</h2>
            <div class="mb-3 pt-3">
                <label for="idanimal" class="form-label">animal</label>
                <select class="form-select" name="idanimal" id="idanimal" aria-label="Default select example">
                    <option selected>choisir un animal</option>
                    <?php
                    foreach ($animauxcom as $key=>$animauxcoms) {  ?>
                    <option value="<?= htmlentities($animauxcoms["id"]) ?>"><?= htmlentities($animauxcoms["id"]) ?>
                        |
                        <?= htmlentities($animauxcoms["prénom"] )?>
                        <?php } ?>
                </select>
            </div>
            <div class="mb-3 pt-3">
                <label for="commentaire" class="form-label">avis sur l'animal </label>
                <textarea class="form-control" id="commentaire" name="commentaire" placeholder="commentaire !" rows="3"
                    required></textarea>
            </div>
            <div class="col-auto ">
                <button type="submit" name="com" class="btn btn-primary ">Envoyer</button>
            </div>
        </div>
    </form>
</div>
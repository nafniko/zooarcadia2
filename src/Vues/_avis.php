
<div class="container ">
    <h2 class=" text-white mt-4 col-12 ">Les Avis</h2>
    <div class=" row ">
        <div
            class=" block-contain rounded-4 mb-2 d-flex justify-content-center flex-wrap  overflow-auto col-lg-7 col-sm-12">
            <div class=" d-flex flex-wrap p-3 h-75 justify-content-between ">

                <?php foreach($avis as $Avis){
    ?>
                <div class="bg-light m-2 p-2 overflow-auto col-lg-3 col-sm-12 rounded-4 h-50">
                    <div class="mb-2">
                        <b>
                            <?=  $Avis['pseudo'] ?>
                        </b>
                    </div>
                    <div>
                        <?= $Avis['avis'] ?>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>

        <div class=" block-contain container rounded-4  h-50 col-lg-4 col-md-12 col-sm-12">

            <form action="zoo/public/index.php?page=poster" method="post">
            <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                <div class="mb-3">
                    <label for="pseudo" class="form-label text-white p-3">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pierre" required>
                </div>
                <div class="mb-3 ">
                    <label for="avis" class="form-label text-white p-3">Laisser un avis</label>
                    <textarea class="form-control text-wrap" id="avis" name="avis"
                        placeholder="Laissez votre commentaire ici !" rows="3" maxlength="100" required></textarea>
                </div>
                <div class="col-auto ">
                    <button type="submit" name="poster" class="btn btn-primary mb-3">Poster</button>
                </div>
            </form>
        </div>
    </div>
</div>

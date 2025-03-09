
<div class="container text-center   ">
    <h1 class=" text-white mt-4  ">Les Avis</h1>
    <div class="row">
        <div class="col-12 d-flex flex-wrap block-contain justify-content-center  rounded-4 p-3">
            <?php 
    
    foreach($objetList as $Avis){
?>
            <div class="bg-light bulle m-2 p-2 overflow-auto rounded-4 d-flex flex-column
            justify-content-center">
                <div class="mb-2">
                    <b>
                        <?= htmlentities($Avis['pseudo']) ?>
                    </b>
                </div>
                <div>
                    <?=htmlentities($Avis['avis']) ?>
                </div>
                <div class="col-12 ">
                    <form method="post">

                        <button type="submit" name="valider" value=<?= htmlentities($Avis['_id'])?>
                            class="btn btn-primary col-4 m-1">valider</button>
                    </form>
                    <form method="post">
                        <button type="submit" name="sup_avis" value="<?=htmlentities($Avis['_id'] )?>"
                            class="btn btn-danger col-4 m-1">supprimer</button>
                    </form>
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>


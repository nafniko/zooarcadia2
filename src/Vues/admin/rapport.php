<h1 class="container text-white mt-5 mb-5 pt-4 ">Rapport</h1>
<div class="container-fluid text-center">

    <div class="row align-items-start">
        <form method="GET" class="m-4 d-flex ">
            <button type="submit" name="recent" class="btn btn-primary m-1">plus recent </button>
            <button type="submit" name="ancien" class="btn btn-primary m-1">plus ancient</button>
            <button type="submit" name="race" class="btn btn-primary m-1">par race</button>
        </form>
    </div>
</div>

<div class="  block-contain rounded-4 p-4 col-lg-6 col-sm-12 ">
    <h2 class="text-white  text-center">Compte rendu des vétérinaires</h2>
    <div class="row ">
        <?php foreach ($rapports as $rapport) { ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title"><?= htmlentities($rapport->getPrenom()) ?> -
                        <?= htmlentities($rapport->getRace()) ?></h5>
                    <p><strong>État:</strong> <?= htmlentities($rapport->getEtat()) ?></p>
                    <p><strong>Nourriture:</strong> <?= htmlentities($rapport->getNourriture()) ?></p>
                    <p><strong>Grammage:</strong> <?= htmlentities($rapport->getGrammage()) ?></p>
                    <p><strong>Dates:</strong> <?= htmlentities($rapport->getDates()) ?></p>
                    <p><strong>Commentaire:</strong> <?= htmlentities($rapport->getCommentaire()) ?></p>
                    <p><strong>Rapport_Id:</strong> <?= htmlentities($rapport->getId()) ?></p>
                    <form method="POST">

                        <button class="btn btn-danger" type="submit" name="delete" value="<?= htmlentities($rapport->getId()) ?>"><strong>X</strong></button>
                    </form>
                        
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<div class="block-contain rounded-4 p-4  col-lg-3 col-sm-12">
    <h2 class=" text-white ">Ajouter un rapport</h2>

    <form action="" method="post" class=" text-white">
        <div class="mb-3 pt-3">
            <label for="id" class="form-label">animal</label>
            <select class="form-select" name="id" id="id" aria-label="Default select example">
                <option selected>choisir un animal</option>
                <?php foreach ($animaux as $animal) {  ?>
                    <option value="<?= htmlentities($animal->getId()) ?>">
                        <?= htmlentities($animal->getPrenom()) ?>
                        <?php } ?>
            </select>
        </div>
        <div class="mb-3 ">
            <label for="race" class="form-label">race</label>
            <select class="form-select" name="race" id="race" aria-label="Default select example">
                <option selected>choisir une race</option>
                <?php foreach ($animaux as $animal) {  ?>
                <option value="<?= htmlentities($animal->getRace() )?>"><?= $animal->getRace()?>
                    <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">etat</label>
            <input type="text" class="form-control" id="etat" name="etat">
        </div>
        <div class="mb-3">
            <label for="nourriture" class="form-label">nourriture</label>
            <input type="text" class="form-control" id="nourriture" name="nourriture">
        </div>
        <div class="mb-3">
            <label for="grammage" class="form-label">grammage</label>
            <input type="text" class="form-control" id="grammage" name="grammage">
        </div>
        <div class="">
            <label for="dates" class="form-label">date de passages</label>
            <input type="date" class="form-control" id="dates" name="dates">

            <div class=" pt-3">
                <label for="commentaire" class="form-label">commentaire sur l'habitat</label>
                <textarea class="form-control" id="commentaire" name="commentaire" placeholder="commentaire !" rows="3"
                    required></textarea>
            </div>
            <div class="pt-3 ">
                <button type="submit" name="create" class="btn btn-primary ">Envoyer</button>
            </div>
        </div>

    </form>
</div>



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
                        <?= htmlentities($animauxcoms["prenom"] )?>
                        <?php }; ?>
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
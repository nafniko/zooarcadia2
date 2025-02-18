
<div class="d-flex flex-wrap justify-content-center w-75 myhover container">
<?php
foreach ($this->animaux as $getAnimals) {
    if($getAnimals->getHabitat() == $id){

?>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div data-animal-id="<?= $getAnimals->getId() ?>" class="card mycard m-4 text-center rounded-4">
            <img src="/zoo/public<?= htmlentities( $getAnimals->getChemin()) ?>" class="imgcontents rounded-4 img-fluid"
                alt=" <?= htmlentities($getAnimals->getPrenom() )?>">
            <h3 class="mt-3"><?= htmlspecialchars(htmlentities( $getAnimals->getPrenom())) ?></h3>
            <div class="details visually-hidden-focusable text-center">
                <div class="card-body">
                    <p class="card-text">Race :<br> <?= htmlentities($getAnimals->getRace()) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}
}
?>
</div>
<div class="d-flex justify-content-evenly mt-5">
    <?php
        foreach ($habitats as $key=>$habitat) {
            ?>
    <a href="/zoo/public/index.php?page=habitat&id=<?= htmlentities($habitat->getId()) ?>"
        class="lien-buttons text-center btn align-middle mb-4" aria-label="<?= htmlentities($habitat->getTitres()) ?>"><?= $habitat->getTitres() ?></a>
    <?php
 };
 ?>
</div>
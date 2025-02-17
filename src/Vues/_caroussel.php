            
    <h2 class="text-center text-white mt-4"><?= htmlentities( $contents->getTitre()) ?></h2>
<div class="d-flex block-contain container rounded-4">
    <div class=" align-items-center d-flex flex-column justify-content-center">
        <div class="col-md-6 mb-md-0 p-md-4 d-flex ">
            
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner rounded-4 mt-4 mb-2">
                    <?php
                    foreach($imgd as $img){
                            ?>
                    <div class="carousel-item active">
                        <img src= /zoo/public/<?= htmlentities( $img->getChemin()) ?> class="d-block rounded-4 w-100 img-fluid " alt="photo de la savane">
                    </div>
                    <?php
                     }
                         ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container ">
        
            <p class="text-white"><?= htmlentities( $contents->getDescriptions() )?></p>
            <div class="d-flex justify-content-center align-items-center">
                <a href="/pages/habitat.php" class="lien-buttons text-center btn align-middle mb-4">Voir</a>
            </div>
        </div>
    </div>
</div>
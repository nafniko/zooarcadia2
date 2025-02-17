
<div class="container d-flex justify-content-center flex-wrap">

    <?php


    foreach ($animaux as $animal) {
        echo '<div class="card d-flex " style="width: 18rem;">
        <img src="' . $animal->getChemin() . '" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">' . $animal->getPrenom() . '</h5>
            <p class="card-text">' . $animal->getRace() . '</p>
            <p class="card-text">' . $animal->getHabitat() . '</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
         </div>';
      }

      foreach ($content as $contents) {
        echo '<div class="card d-flex " style="width: 18rem;">
        <img src="' . $contents->getChemin() . '" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">' . $contents->getTitre() . '</h5>
            <p class="card-text">' . $contents->getDescriptions() . '</p>
            <a href="' . $contents->getLiens() . '" class="btn btn-primary">Go somewhere</a>
         </div>
         </div>';
      }




      ?>
</div>

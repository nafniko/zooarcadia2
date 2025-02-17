<h1 class="text-white text-center pt-4 pb-4 ">Connexion</h1>
<div class="container mt-5 col-lg-6 col-sm-8 block-contain rounded-4 pt-2">

    <form action="/zoo/public/index.php?page=connexion
" method="post" class=" p-4 mb-4 ">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">


        <?php




?>
        <div class="row mb-4 ">
            <label for="email" class="col-sm-2 col-form-label text-white ">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
        </div>
        <div class="row mb-4">
            <label for="Passwords" class="col-sm-2 col-form-label text-white">Password</label>
            <div class="col-sm-10">
                <input type="password" name="Passwords" class="form-control" id="Passwords" required>
            </div>
        </div>
        <button type="submit" value="connexion" name="connexion" class="btn btn-primary ">connectez-vous</button>
    </form>
</div>
</div>
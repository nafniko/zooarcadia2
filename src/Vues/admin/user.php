<div class="container text-center">
    <div class="row">
        <div class="col-lg-12 col-sm-12 m-4">
            <h1 class="text-white text-center pt-4 pb-4 ">Connexion</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <div class="col ">
                <h2 class="text-white pt-4">Crée un utilisateur</h2>
            </div>
            <div class="container block-contain rounded-4 pt-2">
                <form action="/zoo/public/index.php?page=user" method="post" class=" p-4 mb-4 ">
                    <div class="row mb-4 ">
                        <label for="email" class=" col-form-label text-white ">Email</label>
                        <div class="col">
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="Passwords" class=" col-form-label text-white">Password</label>
                        <div class="col">
                            <input type="password" name="Passwords" class="form-control" id="Passwords" required>
                        </div>
                    </div>
                    <div class="mb-3 pt-3">
                        <label for="role" class="form-label text-white">Rôle</label>
                        <select class="form-select" name="role" id="role" aria-label="Default select example">
                            <option selected>choisir un Rôle</option>
                            <option value="1">veto</option>
                            <option value="2">employer</option>
                        </select>
                    </div>
                    <button type="submit" value="user" name="create" class="btn btn-primary ">creer
                        l'utilisateur</button>
                </form>
            </div>
        </div>
        <div class="col-lg-9 col-sm-12">
            <div class="col-lg-9 col-sm-12">
                <h2 class="text-white text-center pt-4 ">Les comptes</h2>
            </div>
            <div class="table-responsive block-contain rounded-4 p-4">
                <table class="table  ">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Passwords</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($objetList as $value) { ?>
                            <tr>
                                <th class="col-1 col-md-1" scope="row"><?= htmlentities($value->getEmail()) ?></th>
                                <td><?= htmlentities($value->getRoles()) ?></td>
                                <td><?= htmlentities($value->getPasswords()) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

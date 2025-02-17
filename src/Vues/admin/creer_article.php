            <div class="col-lg-6 col-sm-12">
                <div class=" container block-contain rounded-4">
                    <form action="" method="post" enctype="multipart/form-data" class=" text-white">
                        <div class="mb-3 pt-3">
                            <label for="page" class="form-label">ajouter </label>
                            <select class="form-select" name="page" id="page">
                                <option selected>choisir la page </option>
                                <option value="Article">Article </option>
                                <option value="Service">Service </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nextitre" class="form-label">titre</label>
                            <input type="text" class="form-control" id="nextitre" name="nextitre"
                                placeholder="choisir un nouveau titre" required>
                        </div>
                        <div class="mb-3 pt-3">
                            <label for="descriptionsArticle" class="form-label">contenu</label>
                            <textarea class="form-control" id="descriptionsArticle" name="descriptionsArticle"
                                placeholder="Rediger l'article !" rows="3" required></textarea>
                            <div class="mb-3">
                                <label for="imageUpload" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="imageUpload"name="imageUpload" required>
                            </div>
                            <div class="col-auto mt-4">
                                <button type="submit" name="createArticle" class="btn btn-primary mb-3">creer
                                    l'article</button>
                            </div>
                    </form>
                </div>
            </div>
   

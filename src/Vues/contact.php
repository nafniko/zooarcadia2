<h1 class="container text-white pt-4">Nous Contacter</h1>

<div class="container mb-3 pb-2">
    <div class="block-contain rounded-4">
        <div class="container mt-4 rounded-4">
            <form action="public/index?page=contact" method="post" class="text-white">
                <div class="mb-3 pt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Pierre@visiteur.fr" reuired>
                </div>
                <div class="mb-3 pt-3">
                    <label for="objet" class="form-label">Objet</label>
                    <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet" >
                </div>
                <div class="mb-3 pt-3">
                    <label for="message" class="form-label">Votre Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Message !" rows="3" ></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" id="contact" name="submit" class="btn btn-primary mb-3">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

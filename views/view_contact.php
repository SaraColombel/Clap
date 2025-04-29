<!-- Début formulaire de contact -->
<div class="col-4 container-fluid d-flex justify-content-center pb-3">
    <div class="">
        <div class="col-12">
            <h2 class="mb-4 mt-3 text-center">Nous contacter</h2>
            <div class="row">
                <div class="col-4 text-start mb-4">
                    <img src="./img/logo.png" style="width:98%" class="img-fluid rounded mt-1">
                </div>
                <div class="col-8">
                    <p>Merci de votre visite sur notre site ! Nous sommes à votre disposition pour répondre à toutes vos questions, vous fournir des informations supplémentaires ou simplement recevoir vos suggestions.
                    </p>
                </div>
            </div>
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nom@exemple.com"
                        name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Objet</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="objet">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contenu"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-warning ">Envoyer</button>
            </form>
            <p id="message" class="mb-4 mt-3"><?php echo $message ?></p>
        </div>
    </div>
</div>
<!-- Fin formulaire de contact -->
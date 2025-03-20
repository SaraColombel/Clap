<!-- Début formulaires connexion/inscription-->
<div id="app" class="container-fluid justify-content-center pb-5 text-black">
    <div class="row justify-content-center">
        <div class="col-4">
            <h2 id="formTitle" class="text-center mb-4 mt-4"></h2>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label id="checkboxLabel" style="margin-bottom:10px;" class="form-check-label"
                    for="flexSwitchCheckDefault"></label>
            </div>
            <!-- Formulaire Connexion -->
            <form id="connexionForm" class="p-4 rounded" style="background-color:#2B3035;" method="post" action = "">
                <div class="mb-3 text-white">
                    <label for="connexionInputEmail" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" name="emailCo" id="connexionInputEmail">
                </div>
                <div class="mb-3 text-white">
                    <label for="connexionInputPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="mdpCo" id="connexionInputPassword">
                </div>
                <button type="submit" name="connexion" class="btn btn-warning mt-2">Se connecter</button>
            </form>
            <p id="messageCo"></p>
            <!-- Fin du formulaire de connexion -->

            <!-- Formulaire d'inscription -->
            <form id="inscriptionForm" class="bg-warning p-4 text-black rounded" method="post">
            <div class="mb-3">
                    <label for="inscriptionInputPseudo" class="form-label">Pseudo</label>
                    <input  class="form-control" id="inscriptionInputPseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="inscriptionInputNom" class="form-label">Nom</label>
                    <input  class="form-control" id="inscriptionInputNom" name="nom">
                </div>
                <div class="mb-3">
                    <label for="inscriptionInputPrenom" class="form-label">Prénom</label>
                    <input class="form-control" id="inscriptionInputPrenom" name="prenom">
                </div>
                <div class="mb-3">
                    <label for="inscriptionInputEmail" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control emailInput" id="inscriptionInputEmail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="inscriptionInputPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control passwordInput pwdCheck" name="mdp" id="inscriptionInputPassword"
                        required>
                </div>
                <div class="mb-3">
                    <label for="inscriptionInputConfirmPassword" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control passwordInput"
                        id="inscriptionInputConfirmPassword" required>
                </div>
                <button type="submit" class="btn text-white" name="submit" style="background-color: #2B3035; ">S'inscrire</button>
            </form>
            <div id="securityInfo" class="mt-3"></div>
                <p style="position:absolute"><?php echo $messageCo ?></p>
                <p style="position:absolute"><?php echo $message ?></p>
            <!-- Fin du formulaire d'inscription -->
        </div>

    </div>
</div>
<!-- Fin formulaire -->

<script src="./JS/form.js"></script>
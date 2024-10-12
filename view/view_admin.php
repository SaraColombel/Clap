<div id="app" class="container-fluid min-vh-100">
    <!-- Section de héros main call to action -->
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-6  p-3">
                <form class="m-3 bg-info p-3" id="add-user-form">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input data-key="name" type="text" class="user-input form-control" placeholder="Nom">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Durée</label>
                        <input data-key="age" type="text" class="user-input form-control" placeholder="Minutes">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Note</label>
                        <input data-key="mail" type="email" class="user-input form-control" placeholder="Étoiles">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Réalisateur</label>
                        <input data-key="mail" type="email" class="user-input form-control" placeholder="Réalisateur">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Acteurs</label>
                        <input data-key="mail" type="email" class="user-input form-control" placeholder="Acteurs">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input data-key="mail" type="email" class="user-input form-control" placeholder="Description">
                    </div>
                    <button id="add-user-btn" type="submit" class="btn btn-primary">Ajouter</button>
                </form>

                <form class="m-3 bg-primary p-3" id="edit-user-module">
                    <div class="mb-3">
                        <input data-key="name" type="text" class="edit-userid form-control" hidden>
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input data-key="name" type="text" class="edit-user-input form-control" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Âge</label>
                        <input data-key="age" type="text" class="edit-user-input form-control" placeholder="age">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mail</label>
                        <input data-key="mail" type="email" class="edit-user-input form-control" placeholder="email">
                    </div>
                    <button id="edit-user-btn" type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
            <div class="col-6 bg-light p-3">
                <div class="card text-center">
                    <div class="card-header">
                        Détails Utilisateur
                    </div>
                    <div id="user-detail" class="card-body">
                        <h5 class="card-title">Veuillez sélectionner un utilisateur</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m-3">
                <h3>Liste des Utilisateurs : </h3>
                <ul id="user-list" class="list-group"></ul>
            </div>
        </div>
    </div>
    </body>
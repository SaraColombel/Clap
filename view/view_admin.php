<div class="container-fluid text-center">
    <h1>Création d'article de blog</h1>
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-1">
            <button id="petit">Petit</button>
        </div>
        <div class="col-1">
            <button id="moyen">Moyen</button>
        </div>
        <div class="col-1">
            <button id="grand">Grand</button>
        </div>
    </div>
</div>

<div id="pageCreationArticlePetit" class="container-fluid mt-3 ms-2 p-5" style="border:solid 3px #D2D2D2;">
    <div class="row d-flex justify-content-center">
        <div class="col-4 p-0" id="titrepetit">
            <input type="text" name="Titre" placeholder="Titre" minlength="3">
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-5" style="height:350px;">
        <div class="col-3 d-flex justify-self-center align-items-center me-3" id="img1Petit"
            style="border:solid 3px grey">
            <input type="file" name="blogImg" accept="image/*" class="m-auto w-75">
        </div>
        <div class="col-5">
            <div class="row">
                <div class="col">
                    <input type="text" name="titreSect1" placeholder="Titre de la section"></input>
                </div>
            </div>
            <div class="row mt-2" style="height:100%;">
                <div class="col">
                    <textarea style="height:300px;">Votre texte ...</textarea>
                </div>
            </div>
        </div>
    </div>


    <div class="row d-flex justify-content-center mt-5" style="height:350px;">
    <div class="col-5">
            <div class="row">
                <div class="col">
                    <input type="text" name="titreSect1" placeholder="Titre de la section"></input>
                </div>
            </div>
            <div class="row mt-2" style="height:100%;">
                <div class="col">
                    <textarea style="height:300px;">Votre texte ...</textarea>
                </div>
            </div>
        </div>
        <div class="col-3 d-flex justify-self-center align-items-center me-3" id="img1Petit"
            style="border:solid 3px grey">
            <input type="file" name="blogImg" accept="image/*" class="m-auto w-75">
        </div>
    </div>
</div>





</body>
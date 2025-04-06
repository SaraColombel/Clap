<!-- Début dropdown buttons -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-3"></div>
        <div class="col-6 d-flex justify-content-start mt-2">
            <div class="dropdown col-6 text-center d-flex align-items-center">

                <button class="btn btn-custom btn-dark btn dropdown-toggle me-2 " id="buttonRuntime" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Durée
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" id="dropdownRuntime">
                    <li><a class="dropdown-item" href="#" data-id="90" data-name="< 90 min ">< 90 min</i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="90-120" data-name="90-120 min ">90-120 min</i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="120" data-name="> 120 min ">> 120 min</i></a></li>
                    <!-- Insertion des plateformes depuis list.js -->
                </ul>

                <button class="btn btn-dark btn dropdown-toggle me-2" id="buttonGenre" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Genre
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" id="dropdownGenres">
                    <!-- Insertion des genres depuis list.js -->
                </ul>

                <button class="btn btn-dark btn dropdown-toggle me-2" id="buttonNationality" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Nationalité
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" id="dropdownNationality">
                    <li><a class="dropdown-item" href="#" data-id="de" data-name="Allemand">Allemand  <span class="fi fi-de"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="en" data-name="Anglais">Anglais  <span class="fi fi-us"></span>  <span class="fi fi-gb"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="zh" data-name="Chinois">Chinois  <span class="fi fi-cn"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="ko" data-name="Coréen">Coréen  <span class="fi fi-kr"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="es" data-name="Espagnol">Espagnol  <span class="fi fi-es"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="fr" data-name="Français">Français  <span class="fi fi-fr"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="it" data-name="Italien">Italien  <span class="fi fi-it"></span></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="ja" data-name="Japonais">Japonais  <span class="fi fi-jp"</span></i></a></li>
                </ul>

                <button class="btn btn-dark btn dropdown-toggle me-2" id="buttonRating" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Note
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" id="dropdownRating">
                    <li><a class="dropdown-item" href="#" data-id="5">5 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="4">> 4 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="3">> 3 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="2">> 2 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="1">> 1 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="0">> 0 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                </ul>
                <div id="resetFilterContainer">
                    <i class="bi bi-arrow-counterclockwise" id="resetFilter"></i>
                    <span id="resetFilterText">Réinitialiser les filtres</span>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<!-- Fin dropdown buttons -->

<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-3">

        <div class="col-3"></div>
        <div class="col-6">
            <h4 class="mb-3 border-bottom border-dark border-2">Les films</h4>
        </div>

        <div class="col-3"></div>

        <div class="container-fluid col-6 flex-wrap" id="list"></div>

        <div id="details">
            <!-- Insertion des films depuis list.js -->
        </div>
    </div>
</div>

<script src="./JS/list.js"></script>
<script src="./JS/dropDown.js"></script>
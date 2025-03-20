<!-- Début dropdown buttons -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-3"></div>
        <div class="col-6 d-flex justify-content-start">
            <!-- Début dropdown button "Genre" -->
            <div class="dropdown col-6 text-center d-flex">
                <button class="btn btn-warning dropdown-toggle me-2" id="buttonGenre" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Genre
                </button>
                <ul class="dropdown-menu" id="dropdownGenres">
                    <!-- Insertion des genres depuis list.js -->
                </ul>

                <!-- <button class="btn btn-warning dropdown-toggle me-2" id="buttonRegion" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Régions
                </button>
                <ul class="dropdown-menu" id="dropdownRegions">
                    Insertion des régions depuis list.js
                </ul>

                <button class="btn btn-warning dropdown-toggle me-2" id="buttonPlatform" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Plateforme
                </button>
                <ul class="dropdown-menu" id="dropdownPlatforms">
                    Insertion des plateformes depuis list.js
                </ul> -->


                <button class="btn btn-warning dropdown-toggle me-2" id="buttonRating" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Note
                </button>
                <ul class="dropdown-menu" id="dropdownRating">
                    <li><a class="dropdown-item" href="#" data-id="5">> 5 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="4">> 4 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="3">> 3 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="2">> 2 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="1">> 1 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                    <li><a class="dropdown-item" href="#" data-id="0">> 0 <i class='bi bi-star-fill pe-1' style='color:#ffc107'></i></a></li>
                </ul>
            </div>
            <!-- Fin dropdown button "Note" -->
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
<!-- Début dropdown buttons -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-3"></div>
        <div class="col-6 d-flex justify-content-start">
            <!-- Début dropdown button "Genre" -->
            <div class="dropdown col-6 text-center d-flex">
                <button class="btn btn-warning dropdown-toggle me-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Genre
                </button>
                <ul class="dropdown-menu" id="apiGenres">
                    <script>
                        const apiKey = '9ee5cc91c2cb960c4d474ee80a467bc1';
                        const url = `https://api.themoviedb.org/3/genre/movie/list?api_key=${apiKey}&language=fr-FR`;

                        const excludedGenres = ["Téléfilm", "Musique", "Documentaire"];

                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Erreur HTTP ' + response.status);
                                }
                                return response.json();
                            })
                            .then(data => {
                                const genresDiv = document.getElementById('apiGenres');

                                data.genres
                                    .filter(genre => !excludedGenres.includes(genre.name))
                                    .forEach(genre => {
                                        // Crée un élément pour chaque genre
                                        const genreElement = document.createElement('div');
                                        genreElement.innerHTML = `<li><a class="dropdown-item" href="#">${genre.name}</a></li>`;
                                        genresDiv.appendChild(genreElement);
                                    });
                            })
                            .catch(error => console.error('Erreur :', error));
                    </script>
                    <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Aventure</a></li>
                    <li><a class="dropdown-item" href="#">Comédie</a></li>
                    <li><a class="dropdown-item" href="#">Drame</a></li>
                    <li><a class="dropdown-item" href="#">Fantastique</a></li>
                    <li><a class="dropdown-item" href="#">Guerre</a></li>
                    <li><a class="dropdown-item" href="#">Policier</a></li>
                    <li><a class="dropdown-item" href="#">Horreur</a></li>
                    <li><a class="dropdown-item" href="#">Western</a></li>
                    <li><a class="dropdown-item" href="#">Science-fiction</a></li> -->
                </ul>

                <button class="btn btn-warning dropdown-toggle me-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Nationalité
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Allemagne</a></li>
                    <li><a class="dropdown-item" href="#">Chine</a></li>
                    <li><a class="dropdown-item" href="#"> Corée du Sud</a></li>
                    <li><a class="dropdown-item" href="#">Espagne</a></li>
                    <li><a class="dropdown-item" href="#">France</a></li>
                    <li><a class="dropdown-item" href="#"> Inde</a></li>
                    <li><a class="dropdown-item" href="#">Italie</a></li>
                    <li><a class="dropdown-item" href="#">Japon</a></li>
                    <li><a class="dropdown-item" href="#">Niger</a></li>
                    <li><a class="dropdown-item" href="#">USA</a></li>
                    <li><a class="dropdown-item" href="#">UK</a></li>
                </ul>

                <button class="btn btn-warning dropdown-toggle me-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Plateforme
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Apple TV+</a></li>
                    <li><a class="dropdown-item" href="#">Prime Vidéo</a></li>
                    <li><a class="dropdown-item" href="#">Canal+ Séries</a></li>
                    <li><a class="dropdown-item" href="#">DAZN</a></li>
                    <li><a class="dropdown-item" href="#">Disney+</a></li>
                    <li><a class="dropdown-item" href="#">Molotov</a></li>
                    <li><a class="dropdown-item" href="#">Netflix</a></li>
                    <li><a class="dropdown-item" href="#">OCS</a></li>
                    <li><a class="dropdown-item" href="#">Paramount+</a></li>
                    <li><a class="dropdown-item" href="#">Universal+</a></li>
                </ul>

                <button class="btn btn-warning dropdown-toggle me-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Note
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">5⭐</a></li>
                    <li><a class="dropdown-item" href="#">4⭐</a></li>
                    <li><a class="dropdown-item" href="#">3⭐</a></li>
                    <li><a class="dropdown-item" href="#">2⭐</a></li>
                    <li><a class="dropdown-item" href="#">1⭐</a></li>
                    <li><a class="dropdown-item" href="#">0⭐</a></li>
                </ul>
            </div>
            <!-- Fin dropdown button "Note" -->
        </div>
        <div class="col-3"></div>
    </div>
</div>
<!-- Fin dropdown buttons -->

<div id="carousels" class="mt-3"></div>

<!-- Début blog -->
<div class="container-fluid pb-4">
    <div class="row d-flex justify-content-center">
        <div class="col-3"></div>
        <div class="col-6">
            <h4 class="mb-3 border-bottom border-dark border-2">Les derniers articles</h4>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex">

            <div class="col-4 me-2" style="width: 32%;">
                <div class="card">
                    <img src="./img/blogLOR.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                        <h5 class="card-title">Le Seigneur des Anneaux</h5>
                        <p class="card-text" style="font-weight: lighter;">Le Seigneur des anneaux (The Lord of the
                            Rings) est un roman de J. R. R. Tolkien paru en trois volumes...</p>
                        <a href="#" class="btn btn-warning ">Lire</a>
                        <p class="mt-2 mb-0" style="font-weight: lighter; font-size: x-small;">Publié il y a 2 mois</p>
                    </div>
                </div>
            </div>

            <div class="col-4 me-2" style="width: 32%;">
                <div class="card">
                    <img src="./img/quentinTarantino.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                        <h5 class="card-title">Quentin Tarantino</h5>
                        <p class="card-text" style="font-weight: lighter;">Quentin Tarantino, né le 27 mars 1963 à
                            Knoxville (Tennessee, États-Unis), est un réalisateur, scénariste, producteur... </p>
                        <a href="#" class="btn btn-warning">Lire</a>
                        <p class="mt-2 mb-0" style="font-weight: lighter; font-size: x-small;">Publié il y a 3 mois</p>
                    </div>
                </div>
            </div>

            <div class="col-4" style="width: 32%;">
                <div class="card">
                    <img src="./img/hansZimmer.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                        <h5 class="card-title">Hans Zimmer</h5>
                        <p class="card-text" style="font-weight: lighter;">Hans Zimmer, né le 12 septembre 1957 à
                            Francfort(RFA), est un compositeur de musique de film et producteur...</p>
                        <a href="#" class="btn btn-warning ">Lire</a>
                        <p class="mt-2 mb-0" style="font-weight: lighter; font-size: x-small;">Publié il y a 6 mois</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Fin blog -->
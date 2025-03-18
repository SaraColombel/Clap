<!-- Début dropdown buttons -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-2">
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

<div class="container-fluid">
    <div class="row d-flex justify-content-center mt-3">

        <div class="col-3"></div>
        <div class="col-6">
            <h4 class="mb-3 border-bottom border-dark border-2">Les films</h4>
        </div>

        <div class="col-3"></div>

        <div class="container-fluid col-6 flex-wrap" id="list"></div>

        <div id="details">
        </div>
        <!-- <div class="p1">
            <div class="row">
                <div class="col-3"></div>

                <div class="col-6 d-flex justify-content-center">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/forestGump.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Forest Gump</h5>
                                    <p class="card-text">1994</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/laLigneVerte.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">La Ligne Verte</h5>
                                    <p class="card-text">1999</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/leParrain.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Le Parrain</h5>
                                    <p class="card-text">1972</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>

                <div class="col-6 d-flex justify-content-center">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/forestGump.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Forest Gump</h5>
                                    <p class="card-text">1994</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/laLigneVerte.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">La Ligne Verte</h5>
                                    <p class="card-text">1999</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/leParrain.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Le Parrain</h5>
                                    <p class="card-text">1972</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>

                <div class="col-6 d-flex justify-content-center">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/forestGump.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Forest Gump</h5>
                                    <p class="card-text">1994</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/laLigneVerte.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">La Ligne Verte</h5>
                                    <p class="card-text">1999</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="100%x280" src="./img/leParrain.jpg">
                                <div class="card-body bg-dark text-white rounded-bottom">
                                    <h5 class="card-title">Le Parrain</h5>
                                    <p class="card-text">1972</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center p-0">
        <div class="col-3"></div>

        <div class="col-6 d-flex justify-content-center">
            <div id="nPages ">
                <a href="films.html" class="btnPage" onclick="navig(0)">«</a>
                <a href="films.html" class="btnPage" id="lien1">1</a>
                <a href="films.html#2" class="btnPage" id="lien2">2</a>
                <a href="#" class="btnPage" onclick="navig(1)">»</a>
            </div>
        </div>
        <div class="col-3"></div>
    </div> -->
    </div>
</div>
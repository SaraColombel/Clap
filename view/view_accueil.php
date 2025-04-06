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

<div id="details">
</div>
<!-- Début carousel 1 -->
<section class="pt-3 pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Les mieux notés</h4>
            </div>

            <div class="col-1 text-end d-flex">
                <a class="btn btn-dark mb-3 me-2" data-bs-target="#carouselTopRated" type="button" data-bs-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " data-bs-target="#carouselTopRated" type="button" data-bs-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselTopRated" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner-topRated">
                        <!-- <script>
                            const topRatedUrl = `https://api.themoviedb.org/3/movie/top_rated?api_key=${apiKey}&language=fr-FR`;

                            fetch(topRatedUrl)
                                .then(response => response.json())
                                .then(data => {
                                    const movies = data.results;
                                    const carouselContainer = document.getElementById('carousel-inner');

                                    let activeSet = false; // Pour gérer la classe "active" du carousel

                                    // Organiser les films en groupes de 4 (pour le carousel)
                                    const groupedMovies = [];
                                    for (let i = 0; i < movies.length; i += 4) {
                                        groupedMovies.push(movies.slice(i, i + 4));
                                    }

                                    groupedMovies.forEach((movieGroup, index) => {
                                        const carouselItem = document.createElement('div');
                                        carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`; // Active pour le premier groupe

                                        const rowDiv = document.createElement('div');
                                        rowDiv.className = 'row d-flex justify-content-center text-center';

                                        movieGroup.forEach(movie => {
                                            const colDiv = document.createElement('div');
                                            colDiv.className = 'col-3 mb-3';

                                                let rating = movie.vote_average/2;
                                                let stars = "";
                                                for (let i=0; i < Math.floor(rating); i++){
                                                    stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
                                                }

                                                if(rating%1 >= 0.5){
                                                    stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
                                                    for(let i = Math.floor(rating)+1; i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                } else {
                                                    for(let i = Math.floor(rating); i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                }



                                            const movieCard = `
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                                <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div>${stars} (${(movie.vote_average/2).toFixed(1)})</div>
                                </div>
                            </div>
                        `;
                                            colDiv.innerHTML = movieCard;
                                            rowDiv.appendChild(colDiv);
                                        });

                                        carouselItem.appendChild(rowDiv);
                                        carouselContainer.appendChild(carouselItem);
                                    });
                                })
                                .catch(error => console.error('Erreur lors de la récupération des films :', error));
                        </script> -->
                    </div>
</section>
<!-- Fin carousel 1 -->

<!-- Début carousel 2 -->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Nouveautés</h4>
            </div>

            <div class="col-1 text-end d-flex">
                <a class="btn btn-dark mb-3 me-2" data-bs-target="#carouselNowPlaying" type="button" data-bs-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " data-bs-target="#carouselNowPlaying" type="button" data-bs-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselNowPlaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner-nowPlaying">

                        <!-- <script>


                            fetch(nowPlayingUrl)
                                .then(response => response.json())
                                .then(data => {
                                    const movies = data.results;
                                    const carouselContainer = document.getElementById('carousel-inner2');

                                    let activeSet = false; // Pour gérer la classe "active" du carousel

                                    // Organiser les films en groupes de 4 (pour le carousel)
                                    const groupedMovies = [];
                                    for (let i = 0; i < movies.length; i += 4) {
                                        groupedMovies.push(movies.slice(i, i + 4));
                                    }

                                    groupedMovies.forEach((movieGroup, index) => {
                                        const carouselItem = document.createElement('div');
                                        carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`; // Active pour le premier groupe

                                        const rowDiv = document.createElement('div');
                                        rowDiv.className = 'row d-flex justify-content-center text-center';

                                        movieGroup.forEach(movie => {
                                            const colDiv = document.createElement('div');
                                            colDiv.className = 'col-3 mb-3';

                                                let rating = movie.vote_average/2;
                                                let stars = "";
                                                for (let i=0; i < Math.floor(rating); i++){
                                                    stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
                                                }

                                                if(rating%1 >= 0.5){
                                                    stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
                                                    for(let i = Math.floor(rating)+1; i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                } else {
                                                    for(let i = Math.floor(rating); i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                }



                                            const movieCard = `
                            <div class="card" style="height: 100%">
                                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                                <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div class="card-note">${stars} (${(movie.vote_average/2).toFixed(1)})</div>
                                </div>
                            </div>
                        `;
                                            colDiv.innerHTML = movieCard;
                                            rowDiv.appendChild(colDiv);
                                        });

                                        carouselItem.appendChild(rowDiv);
                                        carouselContainer.appendChild(carouselItem);
                                    });
                                })
                                .catch(error => console.error('Erreur lors de la récupération des films :', error));
                        </script> -->

                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carousel 2 -->

<!-- Début carousel 3 -->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">À venir</h4>
            </div>

            <div class="col-1 text-end d-flex">
                <a class="btn btn-dark mb-3 me-2" data-bs-target="#carouselUpcoming" type="button"  data-bs-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " data-bs-target="#carouselUpcoming" type="button"  data-bs-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselUpcoming" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner-upcoming">
                        <!-- <script>
                            const upComingUrl = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey}&language=fr-FR`;

                            fetch(upComingUrl)
                                .then(response => response.json())
                                .then(data => {
                                    const movies = data.results;
                                    const carouselContainer = document.getElementById('carousel-inner3');

                                    let activeSet = false; // Pour gérer la classe "active" du carousel

                                    // Organiser les films en groupes de 4 (pour le carousel)
                                    const groupedMovies = [];
                                    for (let i = 0; i < movies.length; i += 4) {
                                        groupedMovies.push(movies.slice(i, i + 4));
                                    }

                                    groupedMovies.forEach((movieGroup, index) => {
                                        const carouselItem = document.createElement('div');
                                        carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`; // Active pour le premier groupe

                                        const rowDiv = document.createElement('div');
                                        rowDiv.className = 'row d-flex justify-content-center text-center';

                                        movieGroup.forEach(movie => {
                                            const colDiv = document.createElement('div');
                                            colDiv.className = 'col-3 mb-3';

                                                let rating = movie.vote_average/2;
                                                let stars = "";
                                                for (let i=0; i < Math.floor(rating); i++){
                                                    stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
                                                }

                                                if(rating%1 >= 0.5){
                                                    stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
                                                    for(let i = Math.floor(rating)+1; i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                } else {
                                                    for(let i = Math.floor(rating); i < 5; i++){
                                                    stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
                                                    }
                                                }



                                            const movieCard = `
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                                <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div class="card-note">${stars} (${(movie.vote_average/2).toFixed(1)})</div>
                                </div>
                            </div>
                        `;
                                            colDiv.innerHTML = movieCard;
                                            rowDiv.appendChild(colDiv);
                                        });

                                        carouselItem.appendChild(rowDiv);
                                        carouselContainer.appendChild(carouselItem);
                                    });
                                })
                                .catch(error => console.error('Erreur lors de la récupération des films :', error));
                        </script> -->
                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carousel 3 -->


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
        <div class="col-6 d-flex justify-content-between">

            <div class="col-4 me-2" style="width: 32%;">
                <div class="card">
                    <img src="./img/blogLOR.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                        <h5 class="card-title">Le Seigneur des Anneaux</h5>
                        <p class="card-text text-wrap">Le Seigneur des anneaux (The Lord of the
                            Rings) est un roman de J. R. R. Tolkien paru en trois volumes...</p>
                        <a href="#" class="btn btn-warning ">Lire</a>
                        <p class="mt-2 mb-0 card-note">Publié il y a 2 mois</p>
                    </div>
                </div>
            </div>

            <div class="col-4 me-2" style="width: 32%;">
                <div class="card">
                    <img src="./img/quentinTarantino.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
                        <h5 class="card-title">Quentin Tarantino</h5>
                        <p class="card-text text-wrap">Quentin Tarantino, né le 27 mars 1963 à
                            Knoxville (Tennessee, États-Unis), est un réalisateur, scénariste, producteur... </p>
                        <a href="#" class="btn btn-warning">Lire</a>
                        <p class="mt-2 mb-0 card-note">Publié il y a 3 mois</p>
                    </div>
                </div>
            </div>

            <div class="col-4" style="width: 32%;">
                <div class="card">
                    <img src="./img/hansZimmer.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-white rounded-bottom">
                        <h5 class="card-title">Hans Zimmer</h5>
                        <p class="card-text text-wrap">Hans Zimmer, né le 12 septembre 1957 à
                            Francfort(RFA), est un compositeur de musique de film et producteur...</p>
                        <a href="#" class="btn btn-warning ">Lire</a>
                        <p class="mt-2 mb-0 card-note" >Publié il y a 6 mois</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Fin blog -->

<script src="./JS/accueil.js"></script>
<script src="./JS/dropDown.js"></script>
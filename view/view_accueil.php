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


<!-- Début carroussel 1 -->
<section class="pt-3 pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Les mieux notés</h4>
            </div>

            <div class="col-1 text-right d-flex">
                <a class="btn btn-dark mb-3 me-2" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " href="#carouselExampleIndicators1" role="button" data-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner">
                        <script>
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
                                <div class="card-body bg-dark text-white rounded-bottom" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div style="font-weight: lighter; font-size: 14px">${stars} (${(movie.vote_average/2).toFixed(1)})</div>
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
                        </script>
                    </div>
</section>
<!-- Fin carroussel 1 -->

<!-- Début carroussel 3-->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Nouveautés</h4>
            </div>

            <div class="col-1 text-right d-flex">
                <a class="btn btn-dark mb-3 me-2" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " href="#carouselExampleIndicators3" role="button" data-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner3">

                        <script>
                            const nowPlayingUrl = `https://api.themoviedb.org/3/movie/now_playing?api_key=${apiKey}&language=fr-FR`;

                            fetch(nowPlayingUrl)
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
                            <div class="card" style="height: 100%">
                                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                                <div class="card-body bg-dark text-white rounded-bottom " style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div style="font-weight: lighter; font-size: 14px">${stars} (${(movie.vote_average/2).toFixed(1)})</div>
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
                        </script>

                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carroussel 3 -->

<!-- Début carroussel 2-->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">À venir</h4>
            </div>

            <div class="col-1 text-right d-flex">
                <a class="btn btn-dark mb-3 me-2" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-dark mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-3"></div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-6">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner2">
                        <script>
                            const upComingUrl = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey}&language=fr-FR`;

                            fetch(upComingUrl)
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
                            <div class="card">
                                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                                <div class="card-body bg-dark text-white rounded-bottom" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <h7 class="card-title " >${movie.title}</h7>
                                    <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                                    <div style="font-weight: lighter; font-size: 14px">${stars} (${(movie.vote_average/2).toFixed(1)})</div>
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
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carroussel 2 -->

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
                    <div class="card-body bg-dark text-white rounded-bottom">
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
                    <div class="card-body bg-dark text-white rounded-bottom">
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
                    <div class="card-body bg-dark text-white rounded-bottom">
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
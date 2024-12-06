<?php

?>

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
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/forestGump.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Forrest Gump</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/laLigneVerte.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">La Ligne Verte</h7>
                                            <p class="card-text">1999</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/leParrain.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Le Parrain</h7>
                                            <p class="card-text">1972</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/forestGump.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Forrest Gump</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
</section>
<!-- Fin carroussel 1 -->

<!-- Début carroussel 2-->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Nouveautés</h4>
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
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/theUnion.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="">The Union</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/civilWar.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Civil War</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280"
                                            src="./img/theInvestigators.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">The Investiga...</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/theUnion.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="">The Union</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carroussel 2 -->

<!-- Début carroussel 3-->
<section class="pb-4">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">

            <div class="col-3"></div>

            <div class="col-5">
                <h4 class="mb-3 border-bottom border-dark border-2">Nos favoris</h4>
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
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/theUnion.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="">The Union</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/civilWar.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Civil War</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280"
                                            src="./img/theInvestigators.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">The Investiga...</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/theUnion.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="">The Union</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row d-flex justify-content-center text-center">

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/lesEvades.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Les Évadés</h7>
                                            <p class="card-text">1994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid rounded-top" alt="100%x280" src="./img/enemy.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Enemy</h7>
                                            <p class="card-text">2013</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="./img/borderlands.jpg">
                                        <div class="card-body bg-dark text-white rounded-bottom">
                                            <h7 class="card-title">Borderlands</h7>
                                            <p class="card-text">2024</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-3"></div>

        </div>
    </div>
</section>
<!-- Fin carroussel 3 -->

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
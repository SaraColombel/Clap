const url = "https://api.themoviedb.org/3/search/movie";
let debounceTimer;

const searchInput = document.getElementById('searchInput');
const resultsDiv = document.getElementById('results');
const detailDiv = document.getElementById('details');


// Événement pour la saisie dans la barre de recherche
searchInput.addEventListener('keyup', function (e) {
    const query = e.target.value.trim();-home

    clearTimeout(debounceTimer);

    if (query === '') {
        resultsDiv.innerHTML = '';
        resultsDiv.style.display = 'none';
        return;
    }

    debounceTimer = setTimeout(() => {
        fetch(`${url}?api_key=${apiKey}&query=${encodeURIComponent(query)}&language=fr`)
            .then(response => response.json())
            .then(data => displayResults(data.results))
            .catch(error => {
                console.error('Erreur TMDB:', error);
                resultsDiv.innerHTML = '';
                resultsDiv.style.display = 'none';
            });
    }, 400);
});

function displayResults(movies) {
    resultsDiv.innerHTML = '';

    if (!movies.length) {
        resultsDiv.innerHTML = '<div class="text-muted px-3 py-2">Aucun film trouvé.</div>';
        resultsDiv.style.display = 'block';
        return;
    }

    movies.slice(0, 5).forEach(movie => {
        const div = document.createElement('div');
        div.className = 'result-item px-3 py-2 d-flex align-items-center';
        div.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w92${movie.poster_path}" alt="${movie.title}" class="me-3" style="max-width: 50px; max-height: 50px; object-fit: cover;">
            <div>
                <strong>${movie.title}</strong> ${movie.release_date ? `(${movie.release_date.slice(0, 4)})` : ''}
            </div>
        `;
        div.onclick = () => {
            clickTest(movie);
        };
        resultsDiv.appendChild(div);
    });

    resultsDiv.style.display = 'block';
}

// Masquer les résultats si on clique en dehors de la zone de recherche
document.addEventListener('click', function (e) {
    if (!searchInput.contains(e.target) && !resultsDiv.contains(e.target)) {
        resultsDiv.innerHTML = '';
        resultsDiv.style.display = 'none';
    }
});

// Masquer les résultats lorsque le champ de recherche est vidé (via la croix ou la suppression du texte)
searchInput.addEventListener('input', function () {
    if (searchInput.value === '') {
        resultsDiv.innerHTML = '';
        resultsDiv.style.display = 'none';
    }
});

// Affichage pop-up
function clickTest(movie) {
    console.log('Film sélectionné:', movie);  // Vérifie si la fonction est appelée

    divDetail.className = "col-5 d-block";  // Affiche le popup
    console.log('Classe de divDetail après modification:', divDetail.className);  // Vérifie que la classe est changée

    const movieDetailsLink = `https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&language=fr-FR`;
    const movieCreditsLink = `https://api.themoviedb.org/3/movie/${movie.id}/credits?api_key=${apiKey}&language=fr-FR`;
    const movieProvidersLink = `https://api.themoviedb.org/3/movie/${movie.id}/watch/providers?api_key=${apiKey}`;

    Promise.all([fetch(movieDetailsLink), fetch(movieCreditsLink), fetch(movieProvidersLink)])
        .then(([detailsResponse, creditsResponse, providersResponse]) =>
            Promise.all([detailsResponse.json(), creditsResponse.json(), providersResponse.json()])
        )
        .then(([detailsData, creditsData, providersData]) => {
            const runtime = detailsData.runtime;
            const director = creditsData.crew.find((member) => member.job === "Director");
            const actors = creditsData.cast.slice(0, 3).map((actor) => actor.name).join(", ");
            const providers = providersData.results["FR"];

            const platforms = providers && providers.flatrate && providers.flatrate.length > 0 ? providers.flatrate : null;
            const genres = detailsData.genres.map((genre) => genre.name).join(", ");

            const platformImages = platforms
                ? platforms
                    .map((provider) =>
                        provider.logo_path
                            ? `<img src="https://image.tmdb.org/t/p/w45${provider.logo_path}" class="rounded" alt="${provider.provider_name}" style="width:4%">`
                            : "<p>No logo available</p>"
                    )
                    .join(" ")
                : "<p>Aucune plateforme disponible</p>";

            const content = `
            <div class="container-fluid p-4 pt-3">
                    <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <img class="w-100 img-fluid rounded mt-2" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                        </div>
                        <div class="col">
                            <h3>${movie.title}</h3>
                            <p class="mb-1 w-100"><i>${genres}</i></p>
                            <p class="mb-1"><b>Date de sortie :</b> ${movie.release_date}</p>
                            <p class="mb-1"><b>Durée</b> : ${Math.floor(runtime / 60)}h${runtime % 60}</p>
                            <p class="mb-1"><b>Réalisateur :</b> ${director ? director.name : "Non disponible"}</p>
                            <p class="mb-1 w-100"><b>Acteurs :</b> ${actors}</p>
                        </div>
                        <div class="col-1  text-end">
                            <i class="bi bi-x-lg" id="cross" style="color:white; cursor: pointer"></i>
                        </div>
                    </div>
                    <div class="row">
                        <p class="pt-3 mb-1"><b>Résumé</b></p>
                        <p>${movie.overview}</p>
                    </div>
                    <div class="row">
                            <p class="mb-0"><b>Plateformes</b></p>
                            <div class="col">
                                ${platformImages}
                            </div>
                    </div>
                </div>
            </div>`;

            divDetail.innerHTML = content;
            const cross = document.querySelector("#cross");
            cross.addEventListener("click", closeTest);
            setDetailPosition();
        });
}

// Fonction pour fermer le popup
function closeTest() {
    divDetail.className = "d-none";
}

// Fermer le popup en cliquant en dehors de celui-ci
document.addEventListener("click", function (event) {
    if (!divDetail.contains(event.target) && !event.target.closest(".result-item")) {
        closeTest();
    }
});

// Ajuster la position du popup pour qu'il soit visible
function setDetailPosition() {
    const scrollTop = window.scrollY;
    divDetail.style.top = `${scrollTop + 200}px`; // Centré verticalement
}
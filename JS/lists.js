const apiKey = '9ee5cc91c2cb960c4d474ee80a467bc1';

const list = document.querySelector("#list");
const apiLink = `https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&language=fr-FR&page=1`

fetch(apiLink)
.then(response=>response.json())
.then(data => {
    const movies = data.results;
    const groupedMovies = [];
    for (let i = 0; i < movies.length; i += 4) {
        groupedMovies.push(movies.slice(i, i + 4));
    }
    groupedMovies.forEach((movieGroup) => {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'row d-flex justify-content-center text-center';
        movieGroup.forEach(movie => {
            const colDiv = document.createElement('div');
            colDiv.className = `col-3 mb-3 ${movie.id}` ;
            const movieCard = `
            <div class="card">
                <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                <div class="card-body text-white rounded-bottom">
                    <h7 class="card-title " >${movie.title}</h7>
                    <p class="card-text m-0" style="font-weight:250; font-size:17px">${new Date(movie.release_date).getFullYear()}</p>
                    <p style="font-size:17px; color:#ffc107; font-weight:200; text-decoration:underline;" class="m-0">(${movie.vote_average.toFixed(1)})</p>
                </div>
            </div>`;
            colDiv.innerHTML = movieCard;
            rowDiv.append(colDiv);

            const card = colDiv.querySelector(".card");
            card.addEventListener("click", ()=> {
                clickTest(movie);
        });
        })
        list.appendChild(rowDiv);
    })
})
.catch(err => console.error('Erreur : ', err));

const detailDiv = document.getElementById('details');
function clickTest(movie){
    // Récupérer les détails du film
    const movieDetailsLink = `https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&language=fr-FR`;
    const movieCreditsLink = `https://api.themoviedb.org/3/movie/${movie.id}/credits?api_key=${apiKey}&language=fr-FR`;
    const movieProvidersLink = `https://api.themoviedb.org/3/movie/${movie.id}/watch/providers?api_key=${apiKey}`;

    // Récupérer les informations supplémentaires (réalisateur, acteurs, durée, plateformes)
    Promise.all([fetch(movieDetailsLink), fetch(movieCreditsLink), fetch(movieProvidersLink)])
        .then(([detailsResponse, creditsResponse, providersResponse]) => Promise.all([detailsResponse.json(), creditsResponse.json(), providersResponse.json()]))
        .then(([detailsData, creditsData, providersData]) => {
            const runtime = detailsData.runtime;
            const director = creditsData.crew.find(member => member.job === "Director");
            const actors = creditsData.cast.slice(0, 3).map(actor => actor.name).join(', ');
            const providers = providersData.results['FR'];

            const platforms = providers && providers.flatrate && providers.flatrate.length > 0 ? providers.flatrate : null;
            console.log(platforms)
            const genres = detailsData.genres.map(genre => genre.name).join(', ');  // Liste des genres

            // Si il n'y a pas de plateforme (aucune donnée dans flatrate), afficher un message ou un fallback
            const platformImages = platforms
                ? platforms.map(provider => provider.logo_path 
                    ? `<img src="https://image.tmdb.org/t/p/w45${provider.logo_path}" class="rounded" alt="${provider.provider_name}" style="width:5%">`
                    : '<p>No logo available</p>').join(' ')
                : '<p>Aucune plateforme disponible</p>';  // Affiche un message si aucune plateforme n'est disponible

            // Créer le contenu avec les informations récupérées
            const content = `
            <div class="container-fluid p-3">
                    <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <img class="w-100 img-fluid rounded" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                        </div>
                        <div class="col">
                            <h3>${movie.title}</h3>
                            <p class="mb-1 w-100"><i>${genres}</i></p>
                            <p class="mb-1"><b>Date de sortie :</b> ${movie.release_date}</p>
                            <p class="mb-1"><b>Durée</b> : ${Math.floor(runtime / 60)}h${runtime % 60}</p> <!-- Conversion en format heure:minute -->
                            <p class="mb-1"><b>Réalisateur :</b> ${director ? director.name : 'Non disponible'}</p>
                            <p class="mb-1 w-100"><b>Acteurs :</b> ${actors}</p>
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
            detailDiv.innerHTML = content;
        })}

        // Fonction pour ajuster la position de l'élément en fonction du scroll
        function updatePosition() {
            const details = document.getElementById('details');
            const scrollTop = window.scrollY || document.documentElement.scrollTop;  // Position actuelle du scroll vertical
            const screenHeight = window.innerHeight;  // Hauteur de l'écran
            
            // Calculer la position où l'élément doit apparaître
            const targetPosition = scrollTop + screenHeight / 4; // Placer l'élément à 25% de la hauteur de l'écran
            
            // Appliquer la position calculée
            details.style.top = targetPosition + 'px';
            
            // Retirer l'écouteur après que l'élément ait été positionné
            window.removeEventListener('scroll', updatePosition);
          }
          
          // Mettre à jour la position lors du chargement de la page et du scroll
          window.addEventListener('load', updatePosition);
          window.addEventListener('scroll', updatePosition);
import { apiKey } from "./api.js";

export function getDetailDiv() {
    return document.getElementById("details");
}

export function cardClick(movie) {
	// console.log("clicked", movie);
	console.log(getDetailDiv());
	const detail = getDetailDiv();

	console.log("Avant changement :", detail.className);
	detail.classList.remove("d-none");
	detail.classList.add("col-5", "d-block");
	console.log("Après changement :", detail.className);

	const movieDetailsLink = `https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&language=fr-FR`;
	const movieCreditsLink = `https://api.themoviedb.org/3/movie/${movie.id}/credits?api_key=${apiKey}&language=fr-FR`;
	const movieProvidersLink = `https://api.themoviedb.org/3/movie/${movie.id}/watch/providers?api_key=${apiKey}`;

	// Récupérer les informations supplémentaires (réalisateur, acteurs, durée, plateformes)
	Promise.all([fetch(movieDetailsLink), fetch(movieCreditsLink), fetch(movieProvidersLink)])
		.then(([detailsResponse, creditsResponse, providersResponse]) =>
			Promise.all([detailsResponse.json(), creditsResponse.json(), providersResponse.json()])
		)
		.then(([detailsData, creditsData, providersData]) => {
			const runtime = detailsData.runtime;
			const director = creditsData.crew.find((member) => member.job === "Director");
			const actors = creditsData.cast
				.slice(0, 3)
				.map((actor) => actor.name)
				.join(", ");
			const providers = providersData.results["FR"];

			const platforms = providers && providers.flatrate && providers.flatrate.length > 0 ? providers.flatrate : null;
			const genres = detailsData.genres.map((genre) => genre.name).join(", "); // Liste des genres

			// Si il n'y a pas de plateforme (aucune donnée dans flatrate), afficher un message ou un fallback
			const platformImages = platforms
				? platforms
						.map((provider) =>
							provider.logo_path
								? `<img src="https://image.tmdb.org/t/p/w45${provider.logo_path}" class="rounded" alt="${provider.provider_name}" style="width:4%">`
								: "<p>Aucun logo disponible</p>"
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
                            <p class="mb-1"><b>Durée</b> : ${Math.floor(runtime / 60)}h${runtime % 60}</p> <!-- Conversion en format heure:minute -->
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
			getDetailDiv().innerHTML = content;
			document.addEventListener("click", function (event) {
				if (event.target && event.target.matches("#cross")) {
					closeClick();
				}
			});
			setDetailPosition();
		});
}

// Fonction de fermeture des détails
function closeClick() {
    getDetailDiv().className = "d-none";
}

// Gestionnaire d'événements centralisé
document.addEventListener("click", function (event) {
    const details = getDetailDiv();
    if (event.target && event.target.matches("#cross")) {
        closeClick();
        return;
    }
    if (
        details.classList.contains("d-block") &&
        !details.contains(event.target) &&
        !event.target.closest(".card")
    ) {
        closeClick();
    }
}, true);

function setDetailPosition() {
	const details = document.getElementById("details");
	const scrollTop = window.scrollY;
	details.style.top = `${scrollTop + 175}px`; // Centré verticalement
}

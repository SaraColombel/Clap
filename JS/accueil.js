const apiKey2 = "9ee5cc91c2cb960c4d474ee80a467bc1";

const topRatedUrl = `https://api.themoviedb.org/3/movie/top_rated?api_key=${apiKey2}&language=fr-FR`;

const nowPlayingUrl = `https://api.themoviedb.org/3/movie/now_playing?api_key=${apiKey2}&language=fr-FR`;

const upComingUrl = `https://api.themoviedb.org/3/movie/upcoming?api_key=${apiKey2}&language=fr-FR`;

// Carousel 3 ------
fetch(topRatedUrl)
	.then((response) => response.json())
	.then((data) => {
		const movies = data.results;
		const carouselContainer = document.getElementById("carousel-inner");

		let activeSet = false; // Pour gérer la classe "active" du carousel

		// Organiser les films en groupes de 4 (pour le carousel)
		const groupedMovies = [];
		for (let i = 0; i < movies.length; i += 4) {
			groupedMovies.push(movies.slice(i, i + 4));
		}

		groupedMovies.forEach((movieGroup, index) => {
			const carouselItem = document.createElement("div");
			carouselItem.className = `carousel-item ${index === 0 ? "active" : ""}`; // Active pour le premier groupe

			const rowDiv = document.createElement("div");
			rowDiv.className = "row d-flex justify-content-center text-center";

			movieGroup.forEach((movie) => {
				const colDiv = document.createElement("div");
				colDiv.className = `col-3 mb-3`;

				// Add rating stars
				let stars = "";
				let noteNumber = (movie.vote_average / 2).toFixed(1);
				if (movie.vote_average) {
					let rating = movie.vote_average / 2;
					for (let i = 0; i < Math.floor(rating); i++) {
						stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
					}
					if (rating % 1 >= 0.5) {
						stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
						for (let i = Math.floor(rating) + 1; i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					} else {
						for (let i = Math.floor(rating); i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					}
				} else {
					stars = "Pas de note";
					noteNumber = "";
				}

				// Set movie image
				let srcImg = movie.poster_path ? `https://image.tmdb.org/t/p/w500${movie.poster_path}` : "./img/noImg.png";

				const movieCard = `
        <div class="card">
        <img class="img-fluid rounded-top" alt="${movie.title}" src="${srcImg}">
        <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
            <h7 class="card-title">${movie.title}</h7>
            <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
            <div>${stars} (${noteNumber})</div>
        </div>
        </div>
    `;
				colDiv.innerHTML = movieCard;
				rowDiv.appendChild(colDiv);

				// Add click event for movie details
				colDiv.querySelector(".card").addEventListener("click", () => clickTest(movie));
			});

			carouselItem.appendChild(rowDiv);
			carouselContainer.appendChild(carouselItem);
		});
	})
	.catch((error) => console.error("Erreur lors de la récupération des films :", error));

// Carousel 2 ------
fetch(nowPlayingUrl)
	.then((response) => response.json())
	.then((data) => {
		const movies2 = data.results;
		const carouselContainer2 = document.getElementById("carousel-inner2");

		let activeSet = false; // Pour gérer la classe "active" du carousel

		// Organiser les films en groupes de 4 (pour le carousel)
		const groupedMovies2 = [];
		for (let i = 0; i < movies2.length; i += 4) {
			groupedMovies2.push(movies2.slice(i, i + 4));
		}

		groupedMovies2.forEach((movieGroup, index) => {
			const carouselItem2 = document.createElement("div");
			carouselItem2.className = `carousel-item ${index === 0 ? "active" : ""}`; // Active pour le premier groupe

			const rowDiv2 = document.createElement("div");
			rowDiv2.className = "row d-flex justify-content-center text-center";

			movieGroup.forEach((movie) => {
				const colDiv2 = document.createElement("div");
				colDiv2.className = `col-3 mb-3`;

				// Add rating stars
				let stars = "";
				let noteNumber = (movie.vote_average / 2).toFixed(1);
				if (movie.vote_average) {
					let rating = movie.vote_average / 2;
					for (let i = 0; i < Math.floor(rating); i++) {
						stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
					}
					if (rating % 1 >= 0.5) {
						stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
						for (let i = Math.floor(rating) + 1; i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					} else {
						for (let i = Math.floor(rating); i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					}
				} else {
					stars = "Pas de note";
					noteNumber = "";
				}

				// Set movie image
				let srcImg = movie.poster_path ? `https://image.tmdb.org/t/p/w500${movie.poster_path}` : "./img/noImg.png";

				const movieCard2 = `
        <div class="card">
        <img class="img-fluid rounded-top" alt="${movie.title}" src="${srcImg}">
        <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
            <h7 class="card-title">${movie.title}</h7>
            <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
            <div>${stars} (${noteNumber})</div>
        </div>
        </div>
    `;
				colDiv2.innerHTML = movieCard2;
				rowDiv2.appendChild(colDiv2);

				// Add click event for movie details
				colDiv2.querySelector(".card").addEventListener("click", () => clickTest(movie));
			});

			carouselItem2.appendChild(rowDiv2);
			carouselContainer2.appendChild(carouselItem2);
		});
	})
	.catch((error) => console.error("Erreur lors de la récupération des films :", error));

// Carousel 3 ------
fetch(upComingUrl)
	.then((response) => response.json())
	.then((data) => {
		const movies3 = data.results;
		const carouselContainer3 = document.getElementById("carousel-inner3");

		let activeSet = false; // Pour gérer la classe "active" du carousel

		// Organiser les films en groupes de 4 (pour le carousel)
		const groupedMovies3 = [];
		for (let i = 0; i < movies3.length; i += 4) {
			groupedMovies3.push(movies3.slice(i, i + 4));
		}

		groupedMovies3.forEach((movieGroup, index) => {
			const carouselItem3 = document.createElement("div");
			carouselItem3.className = `carousel-item ${index === 0 ? "active" : ""}`; // Active pour le premier groupe

			const rowDiv3 = document.createElement("div");
			rowDiv3.className = "row d-flex justify-content-center text-center";

			movieGroup.forEach((movie) => {
				const colDiv3 = document.createElement("div");
				colDiv3.className = `col-3 mb-3`;

				// Add rating stars
				let stars = "";
				let noteNumber = (movie.vote_average / 2).toFixed(1);
				if (movie.vote_average) {
					let rating = movie.vote_average / 2;
					for (let i = 0; i < Math.floor(rating); i++) {
						stars += "<i class='bi bi-star-fill pe-1' style='color:#ffc107'></i>";
					}
					if (rating % 1 >= 0.5) {
						stars += "<i class='bi bi-star-half pe-1' style='color:#ffc107'></i>";
						for (let i = Math.floor(rating) + 1; i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					} else {
						for (let i = Math.floor(rating); i < 5; i++) {
							stars += "<i class='bi bi-star pe-1' style='color:#ffc107'></i>";
						}
					}
				} else {
					stars = "Pas de note";
					noteNumber = "";
				}

				// Set movie image
				let srcImg = movie.poster_path ? `https://image.tmdb.org/t/p/w500${movie.poster_path}` : "./img/noImg.png";

				const movieCard3 = `
        <div class="card">
        <img class="img-fluid rounded-top" alt="${movie.title}" src="${srcImg}">
        <div class="card-body text-white rounded-bottom" style="background-color:#2B3035;">
            <h7 class="card-title">${movie.title}</h7>
            <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
            <div>${stars} (${noteNumber})</div>
        </div>
        </div>
    `;
				colDiv3.innerHTML = movieCard3;
				rowDiv3.appendChild(colDiv3);

				// Add click event for movie details
				colDiv3.querySelector(".card").addEventListener("click", () => clickTest(movie));
			});

			carouselItem3.appendChild(rowDiv3);
			carouselContainer3.appendChild(carouselItem3);
		});
	})
	.catch((error) => console.error("Erreur lors de la récupération des films :", error));

// Fonctions ------

const detailDiv = document.getElementById('details');
function clickTest(movie) {
	detailDiv.className = "col-5 d-block";
	// Récupérer les détails du film
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
								: "<p>No logo available</p>"
						)
						.join(" ")
				: "<p>Aucune plateforme disponible</p>"; // Affiche un message si aucune plateforme n'est disponible

			// Créer le contenu avec les informations récupérées
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
                        <i class="bi bi-x-lg" id="cross" style="color:white"></i>
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
			const cross = document.querySelector("#cross");
			cross.addEventListener("click", closeTest);
			setDetailPosition();
		});
}

function closeTest() {
	detailDiv.className = "d-none";
}
document.addEventListener("click", function (event) {
	if (!detailDiv.contains(event.target) && !event.target.closest(".card")) {
		closeTest();
	}
});

function setDetailPosition() {
	const details = document.getElementById("details");
	const scrollTop = window.scrollY;
	details.style.top = `${scrollTop + 200}px`; // Centré verticalement
}

const apiKey = "9ee5cc91c2cb960c4d474ee80a467bc1";

const apiLinkGenres = `https://api.themoviedb.org/3/genre/movie/list?api_key=${apiKey}&language=fr-FR`;
const apiLinkRegions = `https://api.themoviedb.org/3/configuration/countries?language=fr-FR&api_key=${apiKey}`;
const apiLinkPlatforms = `https://api.themoviedb.org/3/watch/providers/movie?language=fr-FR&watch_region=FR&api_key=${apiKey}`;


fillDropDowns(apiLinkGenres, "dropdownGenres");

let selectedGenre = "";
let selectedNationality = "";
let selectedPlatform = "";
let selectedRating = "";
let selectedRuntime = "";

fetchCategory("topRated");
fetchCategory("nowPlaying");
fetchCategory("upcoming");

function fillDropDowns(apiLink, dropdownName) {
	fetch(apiLink)
		.then((response) => {
			if (!response.ok) {
				throw new Error("Erreur HTTP " + response.status);
			}
			return response.json();
		})
		.then((data) => {
			if (data) {
				const dropdown = document.getElementById(`${dropdownName}`);
				dropdown.innerHTML = "";

				// Si c'est les genres
				if (dropdownName === "dropdownGenres") {
					data.genres.forEach((item) => {
						const element = document.createElement("div");
						element.innerHTML = `<li><a class="dropdown-item" href='#' data-id="${item.id}" data-name="${item.name}">${item.name}</a></li>`;
						dropdown.appendChild(element);
					});
				}
			}
		})
		.catch((error) => console.error("Erreur :", error));
}

document.addEventListener("click", function (event) {
	if (event.target && event.target.matches(".dropdown-item")) {
		const selectedItem = event.target;
		const dropdownName = selectedItem.closest(".dropdown-menu").id;
		const selectedId = selectedItem.getAttribute("data-id");
		const selectedName = selectedItem.getAttribute("data-name");
		console.log("selectedItem : ", selectedItem);
		console.log("dropdownName : ", dropdownName);

		// Retirer la classe 'active' de tous les éléments du dropdown
		const dropdownItems = selectedItem.closest(".dropdown-menu").querySelectorAll(".dropdown-item");
		dropdownItems.forEach((item) => item.classList.remove("active"));

		// Ajouter la classe 'active' à l'élément sélectionné
		selectedItem.classList.add("active");

		if (dropdownName === "dropdownGenres") {
			selectedGenre = selectedId;
			document.getElementById("buttonGenre").textContent = selectedName;
			document.getElementById("buttonGenre").classList.add("selected");
		} else if (dropdownName === "dropdownRating") {
			selectedRating = parseInt(selectedId) || 0;
			document.getElementById("buttonRating").innerHTML = `${selectedId} <i class='bi bi-star-fill pe-1' style='color:#2B3035'>`;
			document.getElementById("buttonRating").classList.add("selected");
		} else if (dropdownName === "dropdownRuntime") {
			selectedRuntime = selectedId;
			document.getElementById("buttonRuntime").textContent = selectedName;
			document.getElementById("buttonRuntime").classList.add("selected");
		} else if (dropdownName === "dropdownNationality") {
			selectedNationality = selectedId;
			document.getElementById("buttonNationality").textContent = selectedName;
			document.getElementById("buttonNationality").classList.add("selected");
		}
		fetchCategory("topRated");
		fetchCategory("nowPlaying");
		fetchCategory("upcoming");
	}
});

document.getElementById("resetFilter").addEventListener("click", function (event) {
	selectedGenre = "";
	selectedRating = "";
	selectedRuntime = "";
	selectedNationality = "";

	document.getElementById("buttonGenre").textContent = "Genre ";
	document.getElementById("buttonRating").innerHTML = "Note ";
	document.getElementById("buttonRuntime").textContent = "Durée ";
	document.getElementById("buttonNationality").textContent = "Nationalité ";

	document.getElementById("buttonGenre").classList.remove("selected");
	document.getElementById("buttonRating").classList.remove("selected");
	document.getElementById("buttonRuntime").classList.remove("selected");
	document.getElementById("buttonNationality").classList.remove("selected");

	const allDropdownItems = document.querySelectorAll(".dropdown-item");
	allDropdownItems.forEach((item) => item.classList.remove("active"));

	fetchCategory("topRated");
	fetchCategory("nowPlaying");
	fetchCategory("upcoming");
});

function buildDiscoverUrl(category) {
	const genreFilter = selectedGenre ? `&with_genres=${selectedGenre}` : "";
	const ratingFilter = selectedRating ? `&vote_average.gte=${parseInt(selectedRating) * 2}` : "";
	const nationalityFilter = selectedNationality ? `&with_original_language=${selectedNationality}` : "";

	let runtimeFilter = "";
	if (selectedRuntime) {
		if (selectedRuntime === "90") {
			runtimeFilter = `&with_runtime.lte=90`;
		} else if (selectedRuntime === "120") {
			runtimeFilter = `&with_runtime.gte=120`;
		} else if (selectedRuntime === "90-120") {
			runtimeFilter = `&with_runtime.gte=90&with_runtime.lte=120`;
		}
	}

	// Dates pour les catégories
	const today = new Date().toISOString().split("T")[0];
	let categoryFilter = "";
	let sortBy = "popularity.desc";

	if (category === "topRated") {
		sortBy = "vote_average.desc";
		categoryFilter = "&vote_count.gte=1000"; // évite les films obscurs mal notés
	} else if (category === "nowPlaying") {
		const oneYearAgo = new Date(Date.now() - 365 * 24 * 60 * 60 * 1000).toISOString().split("T")[0];
		categoryFilter = `&primary_release_date.gte=${oneYearAgo}&primary_release_date.lte=${today}`;
		sortBy = "release_date.desc";
	} else if (category === "upcoming") {
		const oneYearFromNow = new Date(Date.now() + 365 * 24 * 60 * 60 * 1000).toISOString().split("T")[0];
		categoryFilter = `&primary_release_date.gte=${today}&primary_release_date.lte=${oneYearFromNow}`;
		sortBy = "release_date.asc";
	}

	const url = `https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&language=fr-FR&sort_by=${sortBy}${genreFilter}${ratingFilter}${runtimeFilter}${nationalityFilter}${categoryFilter}`;
	console.log(url);
	return url;
}

function fetchCategory(category) {
	const url = buildDiscoverUrl(category);
	console.log(url);
	fetch(url)
		.then((response) => response.json())
		.then((data) => {
			const filteredMovies = data.results.filter((movie) => movie.poster_path);
			displayMovies(filteredMovies, category);
		})
		.catch((error) => console.error("Erreur lors de la récupération des films :", error));
}

// Affichage des films
function displayMovies(movies, category) {
	const carouselContainer = document.getElementById(`carousel-inner-${category}`);

	// Vider le carousel
	carouselContainer.innerHTML = "";

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
			let noteNumber = "(" + (movie.vote_average / 2).toFixed(1) + ")";
			let stars = "";
			let rating = movie.vote_average / 2;
			if (movie.vote_average) {
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
			<div>${stars} ${noteNumber}</div>
		</div>
		</div>
	`;
			colDiv.innerHTML = movieCard;

			// Add click event for movie details
			colDiv.querySelector(".card").addEventListener("click", () => clickTest(movie));
			rowDiv.appendChild(colDiv);
		});

		carouselItem.appendChild(rowDiv);
		carouselContainer.appendChild(carouselItem);
	});
}

// _______________________________________________________________________________________________________
const detailDiv = document.getElementById("details");
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

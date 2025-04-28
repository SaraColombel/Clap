import { cardClick } from './popupManager.js';
import { apiKey, apiLinkAllMovies, apiLinkGenres} from './api.js';

fillDropDowns(apiLinkGenres, "dropdownGenres");

// DROP DOWN BUTTONS
let selectedGenre = "";
let selectedNationality = "";
let selectedRating = "";
let selectedRuntime = "";

fetchMovies(apiLinkAllMovies);

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
		console.log(selectedItem);

		// Retirer la classe 'active' de tous les éléments du dropdown
		const dropdownItems = selectedItem.closest(".dropdown-menu").querySelectorAll(".dropdown-item");
		dropdownItems.forEach(item => item.classList.remove("active"));

		// Ajouter la classe 'active' à l'élément sélectionné
		selectedItem.classList.add("active");

		if (dropdownName === "dropdownGenres") {
			selectedGenre = selectedId;
			document.getElementById("buttonGenre").textContent = selectedName;
			document.getElementById("buttonGenre").classList.add("selected");
		} else if(dropdownName === "dropdownRating"){
            selectedRating = parseInt(selectedId) || 0;
            document.getElementById("buttonRating").innerHTML = `${selectedId} <i class='bi bi-star-fill pe-1' style='color:#2B3035'>`;
			document.getElementById("buttonRating").classList.add("selected");
		} else if(dropdownName === "dropdownRuntime"){
			selectedRuntime = selectedId;
			document.getElementById("buttonRuntime").textContent = selectedName;
			document.getElementById("buttonRuntime").classList.add("selected");
		} else if (dropdownName === "dropdownNationality"){
			selectedNationality = selectedId;
			document.getElementById("buttonNationality").textContent = selectedName;
			document.getElementById("buttonNationality").classList.add("selected");
        }

		getMoviesApiLink();
	}
});

document.getElementById("resetFilter").addEventListener("click", function(event) {
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
    allDropdownItems.forEach(item => item.classList.remove("active"));

	getMoviesApiLink();
});

function getMoviesApiLink() {
	const genreFilter = selectedGenre ? `&with_genres=${selectedGenre}` : "";
    const ratingFilter = selectedRating ? `&vote_average.gte=${parseInt(selectedRating) * 2}` : "";
	const nationalityFilter = selectedNationality ? `&with_original_language=${selectedNationality}` : "";

	let runtimeFilter = "";
	if(selectedRuntime){
		if (selectedRuntime === "90") {
			runtimeFilter = `&with_runtime.lte=${selectedRuntime}`;
		} else if(selectedRuntime === "120"){
			runtimeFilter = `&with_runtime.gte=${selectedRuntime}`;
		} else if(selectedRuntime === "90-120"){
			runtimeFilter = `&with_runtime.gte=90&with_runtime.lte=120`;
		}
	}

	const apiUrl = `https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&language=fr-FR${genreFilter}${ratingFilter}${runtimeFilter}${nationalityFilter}`;
	console.log(apiUrl);
	fetchMovies(apiUrl);
}

function fetchMovies(apiUrl) {
	fetch(apiUrl)
		.then((response) => response.json())
		.then((data) => {
			const movies = data.results;
			const groupedMovies = [];
			for (let i = 0; i < movies.length; i += 4) {
				groupedMovies.push(movies.slice(i, i + 4));
			}

			const list = document.getElementById("list");
			list.innerHTML = "";

			groupedMovies.forEach((movieGroup) => {
				const rowDiv = document.createElement("div");
				rowDiv.className = "row d-flex justify-content-center text-center";
				movieGroup.forEach((movie) => {
					const colDiv = document.createElement("div");
					colDiv.className = `col-3 mb-3 ${movie.id}`;

					let stars = "";
					let noteNumber = `(${(movie.vote_average / 2).toFixed(1)})`;
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

					let srcImg;
					if (movie.poster_path) {
						srcImg = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
					} else {
						srcImg = "./img/noImg.png";
					}

					const movieCard = `
                <div class="card">
                    <img class="img-fluid rounded-top" alt="${movie.title}" src="${srcImg}">
                    <div class="card-body c-b text-white rounded-bottom">
                        <h7 class="card-title">${movie.title}</h7>
                        <p class="card-text m-0">${new Date(movie.release_date).getFullYear()}</p>
                        <div class="card-average">${stars} ${noteNumber}
                        </div>
                    </div>
                </div>`;
					colDiv.innerHTML = movieCard;
					rowDiv.append(colDiv);

					const card = colDiv.querySelector(".card");
					card.addEventListener("click", function () {
						cardClick(movie);
					});
				});
				list.append(rowDiv);
			});
		})
		.catch((err) => console.error("Erreur : ", err));
}
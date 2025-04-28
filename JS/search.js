import { cardClick } from './popupManager.js';
import { apiKey, apiLinkSearch } from './api.js';


let debounceTimer;

const searchInput = document.getElementById('searchInput');
const resultsDiv = document.getElementById('results');

// Événement pour la saisie dans la barre de recherche
searchInput.addEventListener('keyup', function (e) {
    const query = e.target.value.trim();

    clearTimeout(debounceTimer);

    if (query === '') {
        resultsDiv.innerHTML = '';
        resultsDiv.style.display = 'none';
        return;
    }

    debounceTimer = setTimeout(() => {
        fetch(`${apiLinkSearch}?api_key=${apiKey}&query=${encodeURIComponent(query)}&language=fr`)
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
            cardClick(movie);
            resultsDiv.style.display = 'none';
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
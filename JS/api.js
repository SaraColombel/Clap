// file : api.js


export const apiKey = "9ee5cc91c2cb960c4d474ee80a467bc1";
export const apiURLMovie = "https://api.themoviedb.org/3/movie/";

/**
 * Return API link that give informations on a specific movie
 * @param {*} id
 * @param {*} subroute
 * @returns
 */
export function getMovieLink(id, subroute){
    return `${apiURLMovie}${id}${subroute}` + `?api_key=${apiKey}&language=fr-FR`;
}

// links files list.js and home.js
export const apiLinkAllMovies = `https://api.themoviedb.org/3/discover/movie?api_key=${apiKey}&language=fr-FR`;
export const apiLinkGenres = `https://api.themoviedb.org/3/genre/movie/list?api_key=${apiKey}&language=fr-FR`;

// links file search.js
export const apiLinkSearch = "https://api.themoviedb.org/3/search/movie";


// Fonction pour appliquer un thème
function setTheme(themeName) {
	// Sauvegarde du thème dans le localStorage
	localStorage.setItem("theme", themeName);
	// Appliquer la classe du thème au document
	document.documentElement.className = themeName;

	// Synchroniser le switch avec l'état du thème
	if (themeName === "theme-dark") {
		document.getElementById("slider").checked = false; // décocher le switch pour le thème sombre
	} else {
		document.getElementById("slider").checked = true; // cocher le switch pour le thème clair
	}
}

// Fonction pour basculer entre les thèmes
function toggleTheme() {
	const currentTheme = localStorage.getItem("theme");
	// Inverser le thème
	const newTheme = currentTheme === "theme-dark" ? "theme-light" : "theme-dark";
	setTheme(newTheme);
}

// Charger le thème préféré au démarrage
(function () {
	const savedTheme = localStorage.getItem("theme");
	if (savedTheme === "theme-dark") {
		setTheme("theme-dark");
	} else {
		setTheme("theme-light");
	}
})();

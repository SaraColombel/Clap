let selectedForm = false;
// Forms UI Elements
const formConnexionUI = document.querySelector('#connexionForm');
const formInscriptionUI = document.querySelector('#inscriptionForm');
const formTitleUI = document.querySelector('#formTitle');

const checkBoxLabelUI = document.querySelector('#checkboxLabel');
const infoBoxUI = document.querySelector('#securityInfo');

// Inputs Email
const connexionInputEmailUI = document.querySelector('#connexionInputEmail');
const inscriptionEmailUI = document.querySelector('#inscriptionInputEmail');
const allEmailInputsUI = document.querySelectorAll('.emailInput');

// Inputs Password
const connexionInputPasswordUI = document.querySelector('#connexionInputPassword');
const allPasswordInputsUI = document.querySelectorAll('.passwordInput');
const inscriptionPassWordsCheckUI = document.querySelectorAll('.pwdCheck');
// const messageCo = document.querySelector('#messageCo');

const regexObj = {
    regexMail : /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/,
    charDecimal : /\d/,
    charSpecial : /[$&@!]/,
    xssPattern:/<script.*?>.*?<\/script>|<.*?onclick=.*?>|<.*?on\w+=".*?"/i
};
let errorMsg = {
    mailMsg:'',
    passwordMsg:'',
    xssMsg:''
};

displayForm(selectedForm);

function xssInputChecker(inputParam) {
    if (regexObj.xssPattern.test(inputParam.value)) {
        infoBoxUI.style.display='block';
        errorMsg.xssMsg = `<p>⛔️ Attention : potentiel XSS détecté.</p>`;
    } else {
        errorMsg.xssMsg = ''; // Réinitialiser le message
    }
};

function passwordMatchChecker(inputParamColl) {
    if (inputParamColl[0].value !== inputParamColl[1].value){
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ ≠ Les mots de passe ne correspondent pas.</p>`;
    } else{
        errorMsg.passwordMsg += `<p>✅ Les mots de passe correspondent.</p>`;
    }
    displayErrorMessages(); // Appel à la fonction pour afficher les messages d'erreur
};

function emailInputChecker(paramInput) {
    if (regexObj.regexMail.test(paramInput.value)) {
        infoBoxUI.style.display='block';
        paramInput.style.backgroundColor='lightgreen';
        errorMsg.mailMsg = `<p>✅ Le format du mail est correct.</p>`;
    } else {
        infoBoxUI.style.display='block'
        paramInput.style.backgroundColor='red';
        errorMsg.mailMsg = `<p>⛔️ Le format du mail n'est pas correct.</p>`;
    }
    displayErrorMessages(); // Appel à la fonction pour afficher les messages d'erreur
};
allEmailInputsUI.forEach(element => {
    element.addEventListener('click',()=>{
        xssInputChecker(element);
        emailInputChecker(element);
    });
});
allPasswordInputsUI.forEach(element => {
    element.addEventListener('click',()=>{
        passwordInputChecker(element);
        xssInputChecker(element);
    });
});
inscriptionPassWordsCheckUI.forEach(element => {
    element.addEventListener('click', () => {
        // On passe direct la collection
        passwordMatchChecker(inscriptionPassWordsCheckUI);
    });
});

function passwordInputChecker(inputParam) {
    errorMsg.passwordMsg = ''; // Réinitialiser le message

    if (inputParam.value.length < 6) {
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ Mot de passe trop faible</p>`;
    } 
    if (inputParam.value.length > 12) {
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ Mot de passe trop long</p>`;
    } 
    if (!inputParam.value.match(regexObj.charDecimal)) {
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ Le mot de passe doit contenir un chiffre</p>`;
    }
    if (!inputParam.value.match(regexObj.charSpecial)) {
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ Le mot de passe doit contenir un caractère spécial</p>`;
    }
    if(!errorMsg.passwordMsg){
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg = `<p>✅ Le mot de passe est correct</p>`
    }
    displayErrorMessages(); // Appel à la fonction pour afficher les messages d'erreur
};

// Nouvelle fonction pour afficher les messages d'erreur cumulés
function displayErrorMessages() {
        let combinedMsg = '';
        if (errorMsg.mailMsg) combinedMsg += errorMsg.mailMsg;
        if (errorMsg.passwordMsg) combinedMsg += errorMsg.passwordMsg;
        if (errorMsg.xssMsg) combinedMsg += errorMsg.xssMsg;
        infoBoxUI.innerHTML = combinedMsg;
        infoBoxUI.style.display = combinedMsg ? 'block' : 'none';
}

//*-------------------   UI CHECKBOX  -----------------
const checkBoxFormUI = document.querySelector('#flexSwitchCheckDefault');

checkBoxFormUI.addEventListener('click', () => {
    selectedForm = !selectedForm;
    displayForm(selectedForm);});

function displayForm(boolParam) {
    formConnexionUI.reset();
    formInscriptionUI.reset();
    infoBoxUI.innerHTML='';
    allEmailInputsUI.forEach(input => { input.style.backgroundColor = '';});
    connexionInputPasswordUI.style.backgroundColor = '';
    formConnexionUI.style.display = boolParam ? 'none' : 'block';
    formInscriptionUI.style.display = boolParam ? 'block' : 'none';
    formTitleUI.innerText = boolParam ? `Inscription` : 'Connexion';
    checkBoxLabelUI.innerText = boolParam ? `Vous avez déjà un compte ?` : 'Pas encore inscrit ?';};




// const apiKey = '9ee5cc91c2cb960c4d474ee80a467bc1';
// const apiRefs = ["top_rated", "now_playing", "upcoming" ];


// const apiLinks = new Map ([
//     ["Les mieux notés", "https://api.themoviedb.org/3/movie/top_rated?api_key=" + apiKey + "&language=fr-FR"],
//     ["Nouveautés", "https://api.themoviedb.org/3/movie/now_playing?api_key=" + apiKey + "&language=fr-FR"],
//     ["Prochaines sorties", "https://api.themoviedb.org/3/movie/upcoming?api_key=" + apiKey + "&language=fr-FR"]
// ]);


// const carouselDiv = document.getElementById("carousels");
// function generateCards(apiLink, html, j){
//     carouselDiv.innerHTML += html;
//     fetch(apiLink)
//     .then(response => response.json())
//     .then(data => {
//         const movies = data.results;
//         const carouselContainer = document.getElementById('carousel-id-' + j);

//         // Organiser les films en groupes de 4 (pour le carousel)
//         const groupedMovies = [];
//         for (let i = 0; i < movies.length; i += 4) {
//             groupedMovies.push(movies.slice(i, i + 4));
//         }
//         console.log(groupedMovies);
//         groupedMovies.forEach((movieGroup, index) => {
//             const carouselItem = document.createElement('div');
//             if(index === 0){
//                 carouselItem.className = "carousel-item active"; // Active pour le premier groupe
//             } else {
//                 carouselItem.className = "carousel-item"; // Active pour le premier groupe
//             };
//             console.log

//             const rowDiv = document.createElement('div');
//             rowDiv.className = 'row d-flex justify-content-center text-center';

//             movieGroup.forEach(movie => {
//                 const colDiv = document.createElement('div');
//                 colDiv.className = 'col-3 mb-3';

//                 const movieCard = `
//                     <div class="card" id="${movie.id}">
//                         <img class="img-fluid rounded-top" alt="${movie.title}" src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
//                         <div class="card-body text-white rounded-bottom">
//                             <h7 class="card-title " >${movie.title}</h7>
//                             <p class="card-text m-0" style="font-weight:250; font-size:17px">${new Date(movie.release_date).getFullYear()}</p>
//                             <p style="font-size:17px; color:#ffc107; font-weight:200; text-decoration:underline;" class="m-0">(${movie.vote_average.toFixed(1)})</p>
//                         </div>
//                     </div>`;
//                 colDiv.innerHTML = movieCard;
//                 rowDiv.appendChild(colDiv);
//             });

//             carouselItem.appendChild(rowDiv);
//             carouselContainer.appendChild(carouselItem);
//         });
//     })
//     .catch(error => console.error('Erreur lors de la récupération des films :', error));
// }

// var i = 0;
//     for(let [key, value] of apiLinks){
//         let carouselHTML = `<section class="pb-4">
//         <div class="container-fluid">
//             <div class="row d-flex justify-content-center">
//                 <div class="col-3"></div>
//                 <div class="col-5">
//                     <h4 class="mb-3 border-bottom border-dark border-2">${key}</h4>
//                 </div>
//                 <div class="col-1 text-right d-flex">
//                     <a class="btn btn-dark mb-3 me-2" href="#carouselExampleIndicators1" role="button" data-slide="prev">
//                         <i class="bi bi-arrow-left"></i>
//                     </a>
//                     <a class="btn btn-dark mb-3 " href="#carouselExampleIndicators1" role="button" data-slide="next">
//                         <i class="bi bi-arrow-right"></i>
//                     </a>
//                 </div>
//                 <div class="col-3"></div>
//             </div>
    
//             <div class="row">
    
//                 <div class="col-3"></div>
    
//                 <div class="col-6">
//                     <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
//                         <div class="carousel-inner" id="carousel-id-${i}">
//                         </div>
//                     </section>`;
//         generateCards(value, carouselHTML, i);
//         i ++
//     }


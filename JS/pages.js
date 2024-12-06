// console.log('------TP 3-------');
// import DOMPurify from 'dompurify';

// let attack1 = '<p>alert("XSS Attack!")</p>';
// console.log('avant DOM Purify',attack1);
// console.log('apreès DOM Purify',DOMPurify.sanitize(attack1));

// userInput.value = '<script>alert("XSS Attack!");</scripalert>';
// userInput.value = `<button onclick="alert('Attaque XSS!');">XSS Button</button>`;
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

// formConnexionUI.addEventListener('submit',(e)=>{
//     e.preventDefault();
// })
// formInscriptionUI.addEventListener('submit',()=>{
//     e.preventDefault();
// })

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


// const p1 = document.querySelector('.p1');
// const p2 = document.querySelector('.p2');
// const pages = document.querySelector('.pages');
// const p1Num = document.querySelector('#p1');
// const p2Num = document.querySelector('#p2');

// function pagesNum(){
//     if(p1.style.display = "none"){
//         p1.style.display = "block";
//         p2.style.display = "none";
//         p1.style.color = "#ffc107";
//     } else {
//         p1.style.display = "none";
//         p2.style.display = "block";
//     };
// };

// p2.style.display = "none";

// p1Num.addEventListener('click', () =>{
//     p1.style.display = "block";
//     p2.style.display = "none";
// })

// p2Num.addEventListener('click', () =>{
//     p2.style.display = "block";
//     p1.style.display = "none";
// })
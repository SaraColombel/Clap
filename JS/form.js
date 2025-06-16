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
        errorMsg.xssMsg = '';
    }
};

function passwordMatchChecker(inputParamColl) {
    if (inputParamColl[0].value !== inputParamColl[1].value){
        infoBoxUI.style.display='block';
        errorMsg.passwordMsg += `<p>⛔️ ≠ Les mots de passe ne correspondent pas.</p>`;
    } else{
        errorMsg.passwordMsg += `<p>✅ Les mots de passe correspondent.</p>`;
    }
    displayErrorMessages();
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
    displayErrorMessages();
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
        passwordMatchChecker(inscriptionPassWordsCheckUI);
    });
});

function passwordInputChecker(inputParam) {
    errorMsg.passwordMsg = '';

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
    displayErrorMessages();

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

    /**
     * Change parameters of the form from "connection" state to "inscription" state
     * @param {boolean} boolParam 
     */
function displayForm(boolParam) {
    formConnexionUI.reset();
    formInscriptionUI.reset();
    infoBoxUI.innerHTML='';
    allEmailInputsUI.forEach(input => { input.style.backgroundColor = '';});
    connexionInputPasswordUI.style.backgroundColor = '';
    formConnexionUI.style.display = boolParam ? 'none' : 'block';
    formInscriptionUI.style.display = boolParam ? 'block' : 'none';
    formTitleUI.innerText = boolParam ? `Inscription` : 'Connexion';
    checkBoxLabelUI.innerText = boolParam ? `Vous avez un compte ? Connectez-vous.` : 'Pas encore de compte ? Inscrivez-vous.';};}
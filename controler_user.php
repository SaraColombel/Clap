<?php
session_start();

include './utilitaire/functions.php';
include './model/model_user.php';
include './manager/manager_user.php';

$message = "";
$messageCo = "";

// inscriptionFormInspection() : Check inscription form datas
// Param : void
//Return : array ["pseudo" => string, "nom" => string, "prenom" => string, "email" => string, "mdp" => string, "erreur" => string]
function inscriptionFormInspection()
{
    // 1 - Look for empty fields
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        return ["pseudo" => "", "nom" => "", "prenom" => "", "email" => "", "mdp" => "", "date" => "", "erreur" => "Veuillez enregistrer un email."];
    }

    if (!isset($_POST["mdp"]) || empty($_POST["mdp"])) {
        return ["pseudo" => "", "nom" => "", "prenom" => "", "email" => "", "mdp" => "", "date" => "", "erreur" => "Veuillez enregistrer un mot de passe."];
    }

    // 2 - Datas cleaning
    $pseudo = sanitize($_POST["pseudo"]);
    $nom = sanitize($_POST["nom"]);
    $prenom = sanitize($_POST["prenom"]);
    $email = sanitize($_POST["email"]);
    $mdp = sanitize($_POST["mdp"]);
    $date = date("Y-m-d H:i:s", mktime(date('H') + 2));

    // 3 - Verify email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["pseudo" => '', "nom" => '', "prenom" => '', "email" => '', "mdp" => '', "date" => "","erreur" => 'Email pas au bon format !'];
    }

    // 4 - password hashing
    $mdp = password_hash($mdp, PASSWORD_BCRYPT);

    // 5 - Return a tab to have cleaner view of datas
    return ["pseudo" => $pseudo, "nom" => $nom, "prenom" => $prenom, "email" => $email, "mdp" => $mdp, "date" => $date, "erreur" => ""];
}

// Inscription form reception verification
if (isset($_POST["submit"])){
    $tab = inscriptionFormInspection();
    if($tab["erreur"] != ""){
        $message = $tab["erreur"];
    } else {
        $newUser = new ManagerUser($tab['email']);

        $newUser -> setPseudo($tab['pseudo'])->setNom($tab['nom'])->setPrenom($tab['prenom'])->setEmail($tab['email']) -> setMdp($tab['mdp'])->setDate($tab['date']);

        // Check if email available
        if (empty($newUser->readUsersByEmail())){
            $messageCo = $newUser->addUser();
        } else {
            $message = "<p>⛔️ Cet email existe déjà.</p>";
        }
    }
}

// CONNEXION FORM

// ConnectionFormInspection() : Check form datas
// Param : void
// Return : array ["emailCo" => string, "mdpCo" => string, "erreur" => string]
function connectionFormInspection()
{
    // 1 - Look for empty fields
    if (!isset($_POST["emailCo"]) || empty($_POST["emailCo"])) {
        return ["emailCo" => "", "mdpCo" => "", "erreur" => "Veuillez entrer un email."];
    }
    if (!isset($_POST["mdpCo"]) || empty($_POST["mdpCo"])) {
        return ["emailCo" => "", "mdpCo" => "", "erreur" => "Veuillez entrer un mot de passe."];
    }

    // 2 - Datas cleaning
    $emailCo = sanitize($_POST["emailCo"]);
    $mdpCo = sanitize($_POST["mdpCo"]);

    // 3 - Verify email format
    if (!filter_var($emailCo, FILTER_VALIDATE_EMAIL)) {
        return ["emailCo" => '', "mdpCo" => '', "erreur" => 'Email pas au bon format !'];
    }

    // 4 - Return a tab to have cleaner view of datas
    return ["emailCo" => $emailCo, "mdpCo" => $mdpCo, "erreur" => ''];
}

print_r(connectionFormInspection());


//Test si le formulaire de connexion m'est envoyé
if(isset($_POST['connexion'])){
    //je teste les données de connexion envoyés
    $tab = connectionFormInspection();

    //je regarde si je suis dans le cas d'erreur
    if($tab['erreur'] != ''){
        //si c'est le cas : j'affiche l'erreur
        $messageCo = $tab["erreur"];
    } else {
        //Si tout s'est bien passé :
        //Création de mon objet $user à partir du ModelUser
        $user = new ManagerUser($tab['emailCo']);

        //Interroger la BDD pour récupérer les données de l'utilisateurs à partir du login entré
        $data = $user->readUsersByEmail();

        //Tester si je suis dans le cas d'erreur (problème de communication avec la BDD)
        //Si c'est le cas, je reçois un string, si tout s'est passé je reçois un array
        if(gettype($data) == 'string'){
            $messageCo = $data;
        }else{
            //Tout s'est bien passé
            //Je vérifie la réponse de la BDD : vide ou pas ?
            //Si c'est vide : alors le login n'existe pas en BDD, et j'affiche un message d'erreur
            if(empty($data)){
                $messageCo = "Erreur dans l'email et/ou dans le mot de passe.";
            }else{
                //Si on trouve le login en BDD
                //Je vérifie la correspondance des mots de passe
                if(!password_verify($tab['mdpCo'],$data[0]['mdp'])){
                    //Si les mots de passe ne correspondent pas, j'affiche un message d'erreur
                    $messageCo = "Erreur dans l'email et/ou dans le mot de passe.";
                }else{
                    //Si les mots de passe correspondent, j'enregistre les données de l'utilisateur en SESSION, et j'affiche un message de confimation
                    $_SESSION['id_utilisateur'] = $data[0]['id_utilisateur'];
                    $_SESSION['pseudo'] = $data[0]['pseudo'];
                    $_SESSION['nom'] = $data[0]['nom'];
                    $_SESSION['prenom'] = $data[0]['prenom'];
                    $_SESSION['email'] = $data[0]['email'];
                    
                    $messageCo = "{$_SESSION['email']} est connecté avec succés !";
                }
            }
        }
    }
}




include './view/view_header.php';
include './view/view_user.php';
include './view/view_footer.php';
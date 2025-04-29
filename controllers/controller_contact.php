<?php
// include './utilitaire/functions.php';
// include './models/model_contact.php';
// include './managers/manager_contact.php';

$message = "";
$displayContact = "active";

// contactFormInspection() : Check contact form datas
// Param : void
// Return : array ["email" => string, "objet" => string, "contenu" => string, "date" => string, "erreur" => string]
function contactFormInspection()
{
    // 1-Look for empty fields
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        return ["email" => "", "objet" => "", "contenu" => "", "date" => "", "erreur" => "Veuillez enregistrer un email."];
    }
    if (!isset($_POST["objet"]) || empty($_POST["objet"])) {
        return ["email" => "", "objet" => "", "contenu" => "", "date" => "", "erreur" => "Veuillez écrire un objet."];
    }
    if (!isset($_POST["contenu"]) || empty($_POST["contenu"])) {
        return ["email" => "", "objet" => "", "contenu" => "", "date" => "", "erreur" => "Veuillez écrire un message."];
    }
    // 2 - Datas cleaning
    $email = sanitize($_POST["email"]);
    $objet = sanitize($_POST["objet"]);
    $contenu = sanitize($_POST["contenu"]);
    $date = date("Y-m-d H:i:s");
    //3 - Verify email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["email" => "", "objet" => "", "contenu" => "", "date" => "", "erreur" => "L'email n'est pas au bon format."];
    }
    // 4 - Return a tab to have cleaner view of datas
    return ["email" => $email, "objet" => $objet, "contenu" => $contenu, "date" => $date, "erreur" => ""];
}

// contact form reception verification
if (isset($_POST["submit"])){
    $tab = contactFormInspection();
    if($tab["erreur"] != ""){
        $message = $tab["erreur"];
    } else {
        $newMessage = new ManagerContact($tab['email'], $tab['objet'], $tab['contenu'], $tab['date']);

        $newMessage->setEmail($tab['email'])->setObjet($tab['objet'])->setContenu($tab['contenu'])->setDate($tab['date']);

        // Check if email available
        if (empty($newMessage->readUsersByEmail())){
            $message = $newMessage->addMessage();
        } else {
            $message = $newMessage->addMessage();
        }
    }
}

if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
} else if (!isset($_SESSION['id_utilisateur'])){
    $colorContact = 'white';
}

// include './views/view_header.php';
// include './views/view_contact.php';
// include './views/view_footer.php';

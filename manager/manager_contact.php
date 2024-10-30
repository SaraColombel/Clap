<?php

class ManagerContact extends ModelContact
{
    public function addMessage(): string
    {
        $email = $this->getEmail();
        $objet = $this->getObjet();
        $contenu = $this->getContenu();
        $date = $this->getDate();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=clap', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // try ... catch
        try {
            // 1. Prepare request INSERT INTO
            $req = $bdd->prepare('INSERT INTO demande_contact (email, objet_message, contenu_message, date_message) VALUES (?, ?, ?, ?)');
            // 2. Link the "?" to their respective data
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->bindParam(2, $objet, PDO::PARAM_STR);
            $req->bindParam(3, $contenu, PDO::PARAM_STR);
            $req->bindParam(4, $date, PDO::PARAM_STR);
            // 3. Execute request
            $req->execute();
            // 4. Return confirmation message
            return "Message envoyé avec succès. Merci.";
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    // Function to get back a user from DB
// Param : string
// Return : array | string
    public function readUsersByEmail(): array|string
    {
        $email = $this->getEmail();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=clap', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // try ... catch
        try {
            // 1. Prepare request SELECT
            $req = $bdd->prepare('SELECT id_utilisateur, pseudo, nom, prénom, email, mdp FROM utilisateur WHERE email = ?');
            // 2. Add email in the request by associate "?" with "$email" 
            $req->bindParam(1, $email, PDO::PARAM_STR);
            // 3. Execute request
            $req->execute();
            // 4. Get back DB response
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            // 5. Return datas
            return $data;
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }

    // public function insertContacter(){
    //     $email = $this->getEmail();
    //     $id_utilisateur = getIdUtilisateur();
    // }
}
<?php
class ManagerUser extends ModelUser
{

    // Function to get back a user from DB
// Param : string
// Return : array | string
    public function readUsersByEmail(): array|string
    {
        $email = $this->getEmail();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO("mysql:host={$_ENV['DBhost']};dbname={$_ENV['DBname']}","{$_ENV['login']}","{$_ENV['password']}",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // try ... catch
        try {
            // 1. Prepare request SELECT
            $req = $bdd->prepare('SELECT id_utilisateur, pseudo, nom, prenom, email, mdp, date_inscription FROM utilisateur WHERE email = ?');

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


    // Function to save form datas in DB
// Param : string $pseudo, string $nom, string $prenom, string $email, string $mdp
// Return : String
    public function addUser(): string
    {
        $pseudo = $this->getPseudo();
        $nom = $this->getNom();
        $prenom= $this->getPrenom();
        $email = $this->getEmail();
        $mdp = $this->getMdp();
        $date = $this->getDate();
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO("mysql:host={$_ENV['DBhost']};dbname={$_ENV['DBname']}","{$_ENV['login']}","{$_ENV['password']}",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


        // 2 - Try ... catch
        try {

            // 1. Prepare request
            $req = $bdd->prepare('INSERT INTO utilisateur (pseudo, nom, prenom, email, mdp, date_inscription) VALUES (?, ?, ?, ?, ?, ?)');

            // 2. Link the "?" to their respective data
            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $nom, PDO::PARAM_STR);
            $req->bindParam(3, $prenom, PDO::PARAM_STR);
            $req->bindParam(4, $email, PDO::PARAM_STR);
            $req->bindParam(5, $mdp, PDO::PARAM_STR);
            $req->bindParam(6, $date, PDO::PARAM_STR);

            // 3. Execute request
            $req->execute();

            // 4. Return confirmation message
            return "Utilisateur enregistré avec succès.";

        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    function readUsers()
    {
        // 1 - Instantiates the PDO connection object
        $bdd = new PDO("mysql:host={$_ENV['DBhost']};dbname={$_ENV['DBname']}","{$_ENV['login']}","{$_ENV['password']}",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // try ... catch
        try {
            // 1. Prepare request SELECT
            $req = $bdd->prepare('SELECT id_utilisateur, pseudo, nom, prenom, email, mdp, date_inscription FROM utilisateur');

            // 2. Execute request
            $req->execute();

            // 3. Get back DB response
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            // 4. Return datas
            return $data;
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
        ;
    }

    // Function to modify datas in DB
// Param = string pseudo, string $nom, string $prenom, string $email
 // Return = String
//     public function modifyInfo(): string
//     {
//         $modify_pseudo = $this->getPseudo();
//         $modify_nom = $this->getNom();
//         $modify_prenom = $this->getPrenom();
//         $modify_email = $this->getEmail();
//         $bdd = new PDO('mysql:host = localhost; dbname=clap', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//         $sessionIdUtilisateur = $_SESSION['id_utilisateur'];

//         try {
//             $req = $bdd->prepare("UPDATE utilisateur SET pseudo = ?, nom = ?, prenom = ?, email = ? WHERE id_utilisateur = $sessionIdUtilisateur");
//             $req->bindParam(1, $modify_pseudo,  PDO::PARAM_STR);
//             $req->bindParam(2, $modify_nom,  PDO::PARAM_STR);
//             $req->bindParam(3, $modify_prenom, PDO::PARAM_STR);
//             $req->bindParam(4, $modify_email, PDO::PARAM_STR);

//             $req->execute();

//             return "Informations modifiées avec succès.";
//         } catch (EXCEPTION $error) {
//             return $error->getMessage();
//         }
//     }
}

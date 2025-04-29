<?php

class ModelUser{
    private ?int $id_utilisateur;
    private ?string $pseudo;
    private ?string $nom;
    private ?string $prenom;
    private ?string $email;
    private ?string $mdp;
    private ?string $date;
    private ?string $sexe;


    public function __construct(?string $email){
    $this->email=$email;
    }

//START GETTERS
public function getIdUtilisateur(): ?int{
    return $this->id_utilisateur;
}
public function getPseudo(): ?string{
    return $this->pseudo;
}
public function getNom(): ?string{
    return $this->nom;
}
public function getPrenom(): ?string{
    return $this->prenom;
}
public function getEmail(): ?string{
    return $this->email;
}
public function getMdp(): ?string{
    return $this->mdp;
}
public function getDate(): ?string{
    return $this->date;
}
//END GETTERS


//START SETTERS
public function setIdUtilisateur(?int $id_utilisateur): ModelUser{
    $this->id_utilisateur = $id_utilisateur;
    return $this;
}

public function setPseudo(?string $pseudo): ModelUser{
    $this->pseudo = $pseudo;
    return $this;
}
public function setNom(?string $nom): ModelUser{
    $this->nom = $nom;
    return $this;
}
public function setPrenom(?string $prenom): ModelUser{
    $this->prenom = $prenom;
    return $this;
}
public function setEmail(?string $email): ModelUser{
    $this->email = $email;
    return $this;
}
public function setMdp(?string $mdp): ModelUser{
    $this->mdp = $mdp;
    return $this;
}
public function setDate(?string $date): ModelUser{
    $this->date=$date;
    return $this;
}
public function setSexe(?string $sexe): ModelUser{
    $this->sexe=$sexe;
    return $this;
}
//END SETTERS
}

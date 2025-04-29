<?php

class ModelContact{
    private ?int $id_demande_contact;
    private ?string $email;
    private ?string $objet;
    private ?string $contenu;
    private ?string $date;

    public function __construct(?string $email, ?string $objet, ?string $contenu, ?string $date){
        $this->email = $email;
        $this->objet = $objet;
        $this->contenu = $contenu;
        $this->date = $date;
    }

    //START GETTERS
public function getIdDemandeContact(): ?int{
    return $this->id_demande_contact;
}
public function getEmail(): ?string{
    return $this->email;
}
public function getObjet(): ?string{
    return $this->objet;
}
public function getContenu(): ?string{
    return $this->contenu;
}
public function getDate(): ?string{
    return $this->date;
}
//END GETTERS

//START SETTERS
public function setIdDemandeContact(?int $id_demande_contact): ModelContact{
    $this->id_demande_contact = $id_demande_contact;
    return $this;
}

public function setEmail(?string $email): ModelContact{
    $this-> email = $email;
    return $this;
}
public function setObjet(?string $objet): ModelContact{
    $this->objet = $objet;
    return $this;
}
public function setContenu(?string $contenu): ModelContact{
    $this->contenu = $contenu;
    return $this;
}
public function setDate(?string $date): ModelContact{
    $this->date = $date;
    return $this;
}
//END SETTERS
}
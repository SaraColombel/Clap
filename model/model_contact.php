<?php

class ModelContact{
    private ?int $id_demande_contact;
    private ?string $email;
    private ?string $objet;
    private ?string $contenu;
    private ?string $date;

    public function __construct(?string $email, ?string $objet, ?string $contenu){
        $this->email = $email;
        $this->objet = $objet;
        $this->contenu = $contenu;
    }

    
}
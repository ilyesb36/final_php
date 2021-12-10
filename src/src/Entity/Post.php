<?php

namespace App\Entity;
use DateTime;
class Post {

    private int $id;
    private string $titre;
    private string $texte;
    private DateTime $date;

    public function __construct($titre, $texte)
    {
        $this->setTitre($titre);
        $this->setTexte($texte);
        $this->setDate();
    }

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre(string $titre){
        $this->titre = $titre;
    }
    public function getTexte(){
        return $this->texte;
    }

    public function setTexte(string $texte){
        $this->texte = $texte;
    }
    public function getDate(){
        return $this->date;
    }

    public function setDate(){
        $this->date = date('Y-m-d H:i:s');
    }


}

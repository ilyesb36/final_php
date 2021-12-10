<?php

namespace App\Entity;
use DateTime;
class Post {

    private int $id;
    private string $titre;
    private string $texte;
    private string $date;
    private int $idAuthor;

    public function __construct($titre, $texte, $idAuthor)
    {
        $this->setTitre($titre);
        $this->setTexte($texte);
        $this->setDate();
        $this->setIdAuthor($idAuthor);
    }

    public function getId(){
        return $this->id;
    }


    public function getIdAuthor(){
        return $this->idAuthor;
    }

    public function setIdAuthor(int $idAuthor){
        $this->idAuthor = $idAuthor;
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

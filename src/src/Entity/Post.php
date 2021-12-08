<?php

namespace App\Entity;
use DateTime;
class Post {

    private int $id;
    private string $titre;
    private string $texte;
    private DateTime $date;
    private int $idauthor;

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

    public function setDate(DateTime $date){
        $this->date = $date;
    }
    public function getIdUser(){
        return $this->idauthor;
    }

    public function setIdUser(int $idauthor){
        $this->idauthor = $idauthor;
    }

}

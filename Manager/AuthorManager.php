<?php

namespace App\Manager;

class AuthorManager extends BaseManager
{

}


require "Personnage.php";

class PersonnageManager extends BaseManager
{
    public function getAllPersonnages()
    {
        $req = "SELECT * FROM personnage";
        $result = $this->bdd->query($req);
        return $result;
    }

    public function getPersonnageById($id)
    {
        $req = "SELECT * FROM personnage where id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function getAllPersonnagesExceptYours($id)
    {
        $req = "SELECT * FROM personnage EXCEPT SELECT * FROM personnage where id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function addPersonnage(Personnage $perso, $classe)
    {
        $req = "INSERT INTO personnage (`name`, `health`, `strength`, `defense`, `state`, `classe`) VALUES (:name,:health,:strength,:defense,:state, :classe)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':name', $perso->getName(), PDO::PARAM_STR);
        $result->bindValue(':health', $perso->getHealth(), PDO::PARAM_INT);
        $result->bindValue(':strength', $perso->getStrength(), PDO::PARAM_INT);
        $result->bindValue(':defense', $perso->getDefense(), PDO::PARAM_INT);
        $result->bindValue(':state', $perso->getState(), PDO::PARAM_BOOL);
        $result->bindValue(':classe', $classe, PDO::PARAM_STR);
        return $result->execute();
    }

    public function attackPersonnage($id)
    {
        $req = "UPDATE `personnage` SET `health`=:health WHERE id=:id";
    }

}
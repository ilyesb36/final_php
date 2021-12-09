<?php

namespace App\Manager;

use App\Entity\Author;
use PDO;

class AuthorManager extends BaseManager
{
    public function getAllAuthors()
    {
        $req = "SELECT * FROM user";
        $result = $this->bdd->query($req);
        return $result;
    }

    public function getAuthorById(int $id)
    {
        $req = "SELECT * FROM user where id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function updateAuthor(Author $author)
    {
        $req = "UPDATE `user` SET `firstname`=':firstname',`lastname`=':lastname',`pseudo`=':pseudo',`admin`=:admin,`password`=':password' WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $author->getFirstName(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $author->getLastName(), PDO::PARAM_STR);
        $result->bindValue(':pseudo', $author->getPseudo(), PDO::PARAM_STR);
        $result->bindValue(':admin', $author->getAdmin(), PDO::PARAM_INT);
        $result->bindValue(':password', $author->getPassword(), PDO::PARAM_STR);
        $result->bindValue(':id', $author->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function addAuthor(Author $author)
    {
        $req = "INSERT INTO `user`(`firstname`, `lastname`, `pseudo`, `admin`, `password`) VALUES (:firstname,:lastname,:pseudo,:admin,:password)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $author->getFirstName(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $author->getLastName(), PDO::PARAM_STR);
        $result->bindValue(':pseudo', $author->getPseudo(), PDO::PARAM_STR);
        $result->bindValue(':admin', $author->getAdmin(), PDO::PARAM_INT);
        $result->bindValue(':password', $author->getPassword(), PDO::PARAM_STR);
        $result->bindValue(':id', $author->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function deleteAuthor(int $id)
    {
        $req = "DELETE FROM `user` WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function isAdmin($login, $mdp)
    {
        $req = "SELECT * from `user` WHERE pseudo=:login and password=:mdp and admin=1";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $result->execute();

        var_dump($result); 

        if ($result->rowCount() > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function userExist($login, $mdp)
    {
        $req = "SELECT * from `user` WHERE pseudo=:login and password=:mdp";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->bindValue(':mdp', $mdp, PDO::PARAM_INT);
        $result->execute();

        var_dump($result);
        die;   

        if ($result->rowCount() > 1) {
            return true;
        } else {
            return false;
        }
    }
}



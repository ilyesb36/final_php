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
        $req = "SELECT * FROM user where id = :id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, \PDO::PARAM_INT);
        $result->execute();

        return $this->hydrate($result->fetch(\PDO::FETCH_ASSOC));
    }

    public function updateAuthor($firstname, $lastname, $pseudo, $admin,$email, $password, $id)
    {
        $req = "UPDATE `user` SET `firstname`=':firstname',`lastname`=':lastname',`pseudo`=':pseudo', `email`=:'email', `admin`=:admin,`password`=':password' WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $result->bindValue(':admin', $admin, PDO::PARAM_INT);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->bindValue(':email', $email, PDO::PARAM_STR);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function addAuthor($firstname, $lastname, $pseudo,$email, $admin, $password)
    {
        $req = "INSERT INTO `user`(`firstname`, `lastname`, `pseudo`, `admin`, `password` ,`email`) VALUES (:firstname,:lastname,:pseudo,:admin,:password,:email)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $result->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $result->bindValue(':admin', $admin, PDO::PARAM_INT);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->bindValue(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $_SESSION["perId"] = $this->bdd->lastInsertId();
        return $result;
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

        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userExist($login, $mdp)
    {
        $req = "SELECT id from `user` WHERE pseudo=:login and password=:mdp LIMIT 1";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->bindValue(':mdp', $mdp, PDO::PARAM_INT);
        $result->execute();

        while ($author = $result->fetch(PDO::FETCH_OBJ)) {
            $num = $author->id;
        }

        $_SESSION["perId"] = $num;

        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function hydrate($args)
    {
        return new Author($args);
    }
}



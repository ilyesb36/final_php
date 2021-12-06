<?php

namespace App\Manager;

class authorManager extends BaseManager
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
        $req = "UPDATE `user` SET `firstname`=':firstname',`lastname`=':lastname',`email`=':email',`admin`=:admin,`password`=':password' WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $author->getFirstName(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $author->getLastName(), PDO::PARAM_STR);
        $result->bindValue(':email', $author->getEmail(), PDO::PARAM_STR);
        $result->bindValue(':admin', $author->getAdmin(), PDO::PARAM_INT);
        $result->bindValue(':password', $author->getPassword(), PDO::PARAM_STR);
        $result->bindValue(':id', $author->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function addAuthor(Author $author)
    {
        $req="INSERT INTO `user`(`firstname`, `lastname`, `email`, `admin`, `password`) VALUES (:firstname,:lastname,:email,:admin,:password)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':firstname', $author->getFirstName(), PDO::PARAM_STR);
        $result->bindValue(':lastname', $author->getLastName(), PDO::PARAM_STR);
        $result->bindValue(':email', $author->getEmail(), PDO::PARAM_STR);
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
}



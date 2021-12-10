<?php

namespace App\Entity;

class Author extends Entity
{
    private string $firstName;
    private string $lastName;
    private string $pseudo;
    private string $email;
    private string $password;
    private int $admin;
    private int $id;



    /*
    public function __construct($id,$firstName, $lastName, $pseudo, $email, $password, $admin)
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAdmin($admin);
    }*/



    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    public function getId()
    {
        return $this->id;
    }

}
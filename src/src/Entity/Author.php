<?php

namespace App\Entity;

class Author
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private int $admin;
    private int $id;

    public function __construct($firstName, $lastName, $email, $password, $admin)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAdmin($admin);
    }



    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin): void
    {
        $this->admin = $admin;
    }

    public function getId()
    {
        return $this->id;
    }

}
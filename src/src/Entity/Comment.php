<?php

class Comment
{
    private int $id;
    private string $texte;
    private int $idAuthor;
    private int $idPost;
    private \DateTime $date;

    public function __constructor ($id, $texte, $idAuthor, $idPost)
    {
        $this->setId($id);
        $this->setTexte($texte);
        $this->setIdAuthor($idAuthor);
        $this->setIdPost($idPost);
        $this->setDate(date('Y-m-d H:i:s'));


    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): void
    {
        $this->texte = $texte;
    }

    public function getIdAuthor(): int
    {
        return $this->idAuthor;
    }

    public function setIdAuthor(int $idAuthor): void
    {
        $this->idAuthor = $idAuthor;
    }

    public function getIdPost(): int
    {
        return $this->idPost;
    }

    public function setIdPost(int $idPost): void
    {
        $this->idPost = $idPost;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(): void
    {
        $this->date = (date('Y-m-d H:i:s'));
    }
}
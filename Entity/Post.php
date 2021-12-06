<?php

namespace App\Entity;

class Post
{
    private int $id;
    private \DateTime $date;
    private string $title;
    private string $content;
    private int $authorId;

    public function __constructor($id, $date, $title, $content, $authorId)
    {
        $this->setId($id);
        $this->setDate();
        $this->seTitle($title);
        $this->setContent($content);
        $this->setAuthorId($authorId);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(): void
    {
        $this->date = date('Y-m-d H:i:s');
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

}
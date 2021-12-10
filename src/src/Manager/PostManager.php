<?php

namespace App\Manager;
use App\Entity\Post;
use PDO;

class PostManager extends BaseManager
{

    /** @var AuthorManager */
    protected $authorManager;

    /** For dependency injection next step */
    public function __construct()
    {
        $this->authorManager = AuthorManager::getInstance();
        parent::__construct();
    }



    public function getAllPosts()
    {
        $req = "SELECT * FROM post";
        $result = $this->bdd->query($req);
        $result->execute();

        $result->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Post::class);
        return $result->fetchAll(\PDO::FETCH_FUNC,function ($id,$titre,$texte,$date, $idauthor){
            return $this->hydrate(compact(['id','titre','texte','date','idauthor']));
        });
    }

    public function getPostById(int $id)
    {
        $req = "SELECT * FROM post where id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public function updatePost(Post $post)
    {
        $req = "UPDATE `post` SET `titre`=':titre',`texte`=':texte',`date`=`:date`,`idauthor`=`:idauthor`, WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':titre', $post->getTitre(), PDO::PARAM_STR);
        $result->bindValue(':texte', $post->getTexte(), PDO::PARAM_STR);
        $result->bindValue(':date', $post->getDate(), PDO::PARAM_STR);
        $result->bindValue(':idauthor', $post->getIdUser(), PDO::PARAM_INT);
        $result->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        return $result->execute();
    }

    public function addPost($titre, $texte, $date, $idauthor)
    {
        $req="INSERT INTO `post`(`titre`, `texte`, `date`, `idauthor`) VALUES (:titre,:texte,:date,:idauthor)";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':titre', $titre, PDO::PARAM_STR);
        $result->bindValue(':texte', $texte, PDO::PARAM_STR);
        $result->bindValue(':date', $date, PDO::PARAM_STR);
        $result->bindValue(':idauthor', $idauthor, PDO::PARAM_INT);
        return $result->execute();
    }

    public function deletePost(int $id)
    {
        $req = "DELETE FROM `post` WHERE id=:id";
        $result = $this->bdd->prepare($req);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    function hydrate($args)
    {
        $p = new Post($args);
        $p->setAuthor($this->authorManager->getAuthorById($args['idauthor']));
        return $p;
    }
}


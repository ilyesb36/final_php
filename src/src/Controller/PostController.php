<?php

namespace App\Controller;

use App\Manager\AuthorManager;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;


class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function getIndex()
    {
        /** @var PostManager $postManager */
        $postManager = PostManager::getInstance();
        $content = $postManager->getAllPosts();

        $this->render(
            'home.php',
            [
                'posts' => $content
            ],
            'Home page'
        );

    }

    public function getShow()
    {
        Flash::setFlash('alert', 'je suis une alerte');

        $this->render(
            'show.php',
            [
                'test' => 'article ' . $this->params['id']
            ],
            'Show Page'
        );
    }
    public function getDelete()
    {

        /** @var PostManager $postManager */
        $postManager = PostManager::getInstance();
        $idPost = $this->params['id'];

        $postManager->deletePost($idPost);

        header('Location:/');
    }

    public function getUpdate()
    {

        $this->render(
            'update.php',
            [],
            'Update page'
        );
    }

    public function postUpdate()
    {

        /** @var PostManager $postManager */
        $postManager = PostManager::getInstance();

        $idPost = $this->params['id'];
        $titre = $_POST["titre"] ?? NULL;
        $texte = $_POST["texte"] ?? NULL;
        $date =  date('Y-m-d H:i:s');
        $idAuth = $_SESSION["perId"] ?? NULL;

        $postManager->updatePost($titre, $texte, $date, $idAuth, $idPost);

        header('Location:/');
    }

    public function getAuthor()
    {
        $this->render(
            'author.php',
            [],
            'Auteur'
        );
    }

    public function getDashboard(){


        $this->render(
            'dashboard.php',
            [],
            'Dashboard'
        );

    }

    public function postDashboard()
    {
        /** @var PostManager $postManager */
        $posts = PostManager::getInstance();

        $titre = $_POST["titre"] ?? NULL;
        $texte = $_POST["texte"] ?? NULL;
        $idAuth = $_SESSION["perId"] ?? NULL;
        $date =  date('Y-m-d H:i:s');

        $posts->addPost($titre, $texte,$date, $idAuth);
        header('Location:/');
    }
}

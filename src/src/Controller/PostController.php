<?php

namespace App\Controller;

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
        $posts = new PostManager();

        $titre = $_POST["titre"] ?? NULL;
        $texte = $_POST["texte"] ?? NULL;
        $idAuth = $_SESSION["perId"] ?? NULL;

        $post = new Post($titre, $texte, $idAuth);

        $posts->addPost($post);
        header('Location:/');
    }
}

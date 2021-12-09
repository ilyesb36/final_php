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
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
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

    public function postDashboard(Type $var = null)
    {
        die('caca');
    }
}

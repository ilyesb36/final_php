<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class AdminController extends BaseController
{

    public function getIndex()
    {
        $manager = new AuthorManager(PDOFactory::getMysqlConnection());

        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'user' => new Author(),
                'test' => 'je suis un test'
            ],
            'Home page'
        );

    }


}
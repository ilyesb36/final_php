<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class SecurityController extends BaseController
{

    public function login($login, $mdp)
    {
        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $_SESSION["isAuthor"] = AuthorManager::userExist($login, $mdp);
        $_SESSION["isAdmin"] = AuthorManager::isAdmin($login, $mdp);
    }


}
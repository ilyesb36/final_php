<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class SecurityController extends BaseController
{

    public function executeIndex()
    {
        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $this->render(
            'login.php',
            [],
            'Login page'
        );

    }

    public function executeLogin()
    {

        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $_SESSION["isAuthor"] = $authors->userExist($_POST["pseudo"], $_POST["password"]);
        $_SESSION["isAdmin"] = $authors->isAdmin($_POST["pseudo"], $_POST["password"]);

        var_dump($_SESSION["isAuthor"]);
        $this->render(
            'login.php',
            [],
            'Login page'
        );
        
    }
    public function executeLogout()
    {

        unset($_SESSION['isAuthor']);
        unset($_SESSION['isAdmin']);

        $this->render(
            'login.php',
            [],
            'Login page'
        );

    }

}
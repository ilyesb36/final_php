<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\AuthorManager;

class SecurityController extends BaseController
{

    public function getRegister()
    {
        $this->render(
            'register.php',
            [],
            'Register page'
        );

    }

    public function postRegister()
    {
        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $pw = $_POST["pw"];

        if(!empty($_POST['admin'])) {
            $admin = 1;
        }
        else {
            $admin = 0;
        }

        $authors->addAuthor($firstname, $lastname, $pseudo, $email, $admin, $pw);
        $_SESSION["isAuthor"] = 1;
        $_SESSION["isAdmin"] = $authors->isAdmin($pseudo, $pw);
        header('Location:/');
    }

    public function getLogin()
    {
        $this->render(
            'login.php',
            [],
            'Login page'
        );

    }

    public function postLogin()
    {

        $authors = new AuthorManager(PDOFactory::getMysqlConnection());

        $_SESSION["isAuthor"] = $authors->userExist($_POST["pseudo"], $_POST["password"]);
        $_SESSION["isAdmin"] = $authors->isAdmin($_POST["pseudo"], $_POST["password"]);

        header('Location:/');
        exit;
    }

    public function getLogout()
    {

        unset($_SESSION['isAuthor']);
        unset($_SESSION['isAdmin']);

        header('Location:/');
        exit;
    }

}
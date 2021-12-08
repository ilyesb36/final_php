<?php

namespace App\Manager;

use App\Fram\Factories\PDOFactory;

abstract class BaseManager
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = PDOFactory::getMysqlConnection();
    }
}
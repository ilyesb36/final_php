<?php

namespace App\Manager;

use App\Fram\Factories\PDOFactory;

abstract class BaseManager
{
    protected $bdd;

    protected function __construct()
    {
        $this->bdd = PDOFactory::getMysqlConnection();
    }

    final public static function getInstance()
    {
        static $instances = array();

        $calledClass = get_called_class();

        if (!isset($instances[$calledClass]))
        {
            $instances[$calledClass] = new $calledClass();
        }

        return $instances[$calledClass];
    }

    final private function __clone()
    {
    }

    abstract function hydrate($args);
}
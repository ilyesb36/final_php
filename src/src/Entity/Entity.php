<?php

namespace App\Entity;

abstract class Entity
{
    public function __construct(Array $args)
    {
        foreach($args as $key => $val){
            $method = 'set'.ucfirst($key);
            if(is_callable([$this,$method])){
                $this->$method($val);
            }
        }
    }
}
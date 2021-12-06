<?php

namespace App\Fram\Factories;

class PDOFactory
{
    public static function getMysqlConnection(): PDO
    {
        try {
            return new PDO('mysql:host=db;dbname=final_php', 'root', 'example');
        } catch
        (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
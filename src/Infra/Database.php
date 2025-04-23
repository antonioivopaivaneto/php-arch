<?php

namespace App\Infra;

use PDO;

class Database
{
    private static ?PDO $pdo = null;


    public static function connection():PDO
    {
        if(!self::$pdo){
            self::$pdo = new PDO(
                'mysql:host=localhost;dbname=testApiPure',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
            );
        }
        return self::$pdo;
    }
}
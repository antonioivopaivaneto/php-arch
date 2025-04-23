<?php

namespace App\Modules\User\Repository;

use App\Modules\User\Domain\User;
use App\Modules\User\DTO\UserDTO;
use App\Modules\User\Mapper\UserMapper;
use PDO;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {
    }
    public function save(User $user):void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name,email) VALUES (:name,:email)");
        $stmt->execute([
            ':name' =>$user->getName(),
            ':email' =>$user->getEmail(),
        ]);

    }
    public function all():array
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);

         $users =  array_map(function($userData){
            return new User($userData['id'],$userData['name'],$userData['email']);
         },$userData);

         return $users;
    
    }


    public function emailExiste(string $email):bool 
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
        
    }




    
}
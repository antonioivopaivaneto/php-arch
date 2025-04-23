<?php

namespace App\Modules\User\Service;

use App\Modules\User\DTO\UserDTO;
use App\Modules\User\Mapper\UserMapper;
use App\Modules\User\Repository\UserRepository;
use App\Modules\User\Validator\UserValidator;

class UserService
{
    public function __construct(private UserRepository $repository) {
        
    }

    public function CreateUser(UserDTO $dto):void
    {
        UserValidator::validate($dto);

        if($this->repository->emailExiste(($dto->email))){
            throw new \InvalidArgumentException('Email already exists');
        }

        $user = UserMapper::fromDTO($dto);
        $this->repository->save($user);
    } 

    public function listUsers():array 
    {
        $users = $this->repository->all();

        return $users;


        
    }
}
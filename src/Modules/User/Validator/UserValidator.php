<?php

namespace App\Modules\User\Validator;

use App\Modules\User\DTO\UserDTO;
use InvalidArgumentException;  // Importando a exceção corretamente

class UserValidator
{

    public static function validate(UserDTO $dto):void
    {
        if(empty($dto->name)) {
            throw new InvalidArgumentException('Name is required');

        }
        if(!filter_var($dto->email,FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException('Email is not valid');
        }
    }



}
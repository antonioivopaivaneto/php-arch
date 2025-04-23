<?php

namespace App\Modules\User\DTO;

readonly class UserDTO
{
    public function __construct(
        public string $name,
        public string $email,

    ) {
    }
    
}
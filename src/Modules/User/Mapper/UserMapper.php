<?php

namespace App\Modules\User\Mapper;

use App\Modules\User\Domain\User;
use App\Modules\User\DTO\UserDTO;

class UserMapper
{
    public static function fromDTO(UserDTO $dto): User
    {
        return new User(
            id: null,
            name: $dto->name,
            email: $dto->email,
        );
    }
    public static function toDTO(User $user): UserDTO
    {
        if (!$user instanceof User) {
            throw new \InvalidArgumentException('Esperado objeto do tipo User.');
        }

        return new UserDTO($user->getId(), $user->getName(), $user->getEmail());
    }


    public static function toArray(UserDTO $dto): array
    {
        return [
            'name' => $dto->name,
            'email' => $dto->email,
        ];
    }


    public static  function mapUserToArray(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ];
    }
}

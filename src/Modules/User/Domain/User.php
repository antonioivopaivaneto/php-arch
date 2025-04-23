<?php

namespace App\Modules\User\Domain;

class User {

    public function __construct(
        private ?int $id,
        private string $name,
        private string $email,
    ) {
    }

    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function changeName(string $newName): void {
        $this->name = $newName;
    }
}
<?php

namespace App\Modules\User\Controller;

use App\Modules\User\DTO\UserDTO;
use App\Modules\User\Mapper\UserMapper;
use App\Modules\User\Service\UserService;
use Exception;

class UserController
{
    public function __construct(private UserService $service) {}

    public function index(): void
    {
        header('Content-Type: application/json');


        $userArrays = $this->service->listUsers(); // já é array
        $dtos = array_map([UserMapper::class, 'toDTO'], $userArrays);


        echo json_encode($dtos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    public function store(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        try {
            $dto = new UserDTO($data['name'] ?? '', $data['email'] ?? '');
            $this->service->createUser($dto);
            echo json_encode(['message' => 'Usuário criado'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}

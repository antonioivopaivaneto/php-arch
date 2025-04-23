<?php

namespace App\Infra;

use App\Modules\User\Service\UserService;
use App\Modules\User\Controller\UserController;
use App\Modules\User\Repository\UserRepository;

class Container {
    public static function userController(): UserController {
        $pdo = Database::connection();
        $repo = new UserRepository($pdo);
        $service = new UserService($repo);
        return new UserController($service);
    }
}

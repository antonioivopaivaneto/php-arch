<?php

use App\Modules\User\Domain\User;
use App\Modules\User\Repository\UserRepository;

test('should return user from service', function(){

    $respository = mock(UserRepository::class);

    $respository->shouldReceive('all')
    ->andReturn([
        new User(1, 'Lucas', 'lucas@gmai.com'),
    ]);

    $users= $respository->all();

    expect($users)->toHaveCount(1);
    expect($users[0])->toBeInstanceOf(User::class);
    expect($users[0]->getName())->toBe('Lucas');

    
});
<?php

use App\Modules\User\DTO\UserDTO;
use App\Modules\User\Validator\UserValidator;

test('valida dto com dados corretos',function(){

    $dto = new UserDTO('joao da silva','joao@email.com');

    expect($dto)->toBeInstanceOf(UserDTO::class);
    expect($dto->name)->toBe('joao da silva');


});

test('lanca exececao se o nome estiver vazio', function(){

    $dto = new UserDTO('','joao@gmail.com');

    expect(fn() => UserValidator::validate($dto))
     ->toThrow(InvalidArgumentException::class, 'Name is required');
});

test('lanca exececao se  o email for invalido',function(){

    $dto = new UserDTO('joao da silva','joaoemail.com');

    expect(fn() => UserValidator::validate($dto))
     ->toThrow(InvalidArgumentException::class, 'Email is not valid');
});
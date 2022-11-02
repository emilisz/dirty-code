<?php
declare(strict_types=1);

namespace App\auth;


use App\User;

class Register
{
    public function __construct(protected string $email, protected string $password)
    {
    }

    public function register()
    {
        // some validation
       return User::create([
            'email' => $this->email,
            'password' => password_hash($this->password, 'empty'),
        ]);
    }
}
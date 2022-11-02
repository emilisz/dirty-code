<?php
declare(strict_types=1);

namespace App\auth;


use App\User;

class Login
{
    public function __construct(protected string $email, protected string $password)
    {
    }

    public function login():bool
    {
        $user = User::where('email', $this->email)
            ->get()
            ->first();

        return password_verify($this->password, $user->password);
    }
}
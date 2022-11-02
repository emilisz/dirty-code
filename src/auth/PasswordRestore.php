<?php
declare(strict_types=1);

namespace App\auth;


use App\User;

class PasswordRestore
{

    public function __construct(private string $email)
    {
    }

    public function restore()
    {
        // validation
        $user = User::where('email', $this->email)
            ->get()
            ->first();

        $token = $this->createPasswordToken();
        $user->update([
            'reset_token' => $token,
        ]);

       return $user->email->send(
            $this->email, 'Password restore', 'views/auth/restorePassword', ['token' => $token]
        );
    }

    private function createPasswordToken():string
    {
        return md5($this->email);
    }
}
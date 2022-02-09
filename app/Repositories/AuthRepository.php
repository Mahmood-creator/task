<?php

namespace App\Repositories;


use App\Interfaces\AuthInterface;
use App\Models\User;

class AuthRepository implements AuthInterface
{
    /**
     * @param User $user
     * @param string $device
     *
     * @return string
     */
    public function createToken(User $user): string
    {
        // dd($user->);
        return $user->createToken($user)->plainTextToken;
    }

    /**
     * @param User $user
     * @param string $token
     *
     * @return void
     */
    public function deleteToken(User $user, string $token): void
    {
        $user->tokens()->where('id', '=', $token)->delete();
    }

    /**
     * @param string $login
     *
     * @return User
     */
    public function findByLogin(string $login): User
    {
        return User::findByLogin($login)->firstOrFail();
    }
}

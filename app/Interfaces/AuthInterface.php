<?php

namespace App\Interfaces;

use App\Models\User;

interface AuthInterface
{
    /**
     * @param User $user
     * @param string $device
     *
     * @return string
     */
    public function createToken(User $user): string;

    /**
     * @param User $user
     * @param string $token
     *
     * @return void
     */
    public function deleteToken(User $user, string $token): void;

    /**
     * @param string $login
     *
     * @return User
     */
    public function findByLogin(string $login): User;
}

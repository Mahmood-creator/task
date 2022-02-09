<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Interfaces\AuthInterface;
use App\Models\User;

class AuthService
{
    protected $repository;

    public function __construct(AuthInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param User $user
     * @param string $device
     *
     * @return string
     */
    public function createToken(User $user): string
    {
        return $this->repository->createToken($user);
    }

    /**
     * @param User $user
     * @param string $token
     *
     * @return void
     */
    public function deleteToken(User $user, string $token): void
    {
        $token = Str::substr($token, 0, 1);

        $this->repository->deleteToken($user, $token);
    }

    /**
     * @param string $login
     *
     * @return User
     */
    public function findByLogin(string $login): User
    {
        return $this->repository->findByLogin($login);
    }
}

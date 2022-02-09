<?php

namespace App\Providers;

use App\Interfaces\CompanyInterface;
use App\Interfaces\WorkerInterface;
use App\Repositories\CompanyRepository;
use App\Repositories\WorkerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
        $this->app->bind(WorkerInterface::class, WorkerRepository::class);

    }

    /**
     * @return void
     */
    public function boot(): void
    {
        //
    }
}

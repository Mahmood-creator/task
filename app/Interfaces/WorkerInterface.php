<?php

namespace App\Interfaces;

use Exception;

use App\Models\Worker;

use Illuminate\Database\Eloquent\Collection;

interface WorkerInterface
{
    /**
     * @param array $attributes
     *
     * @return Collection
     */
    public function all(array $attributes): Collection;

    /**
     * @param array $attribute
     *
     * @return Worker
     */
    public function create(array $attribute): Worker;

    /**
     * @param Worker $worker
     *
     * @return Worker
     */
    public function show(Worker $worker): Worker;

    /**
     * @param Worker $Worker
     * @param array $attributes
     *
     * @return Worker
     */
    public function update(Worker $worker, array $attributes): Worker;

    /**
     * @param Worker $Worker
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Worker $worker): bool;
}

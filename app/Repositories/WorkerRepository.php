<?php

namespace App\Repositories;

use App\Interfaces\WorkerInterface;
use Exception;

use App\Models\Worker;


use Illuminate\Database\Eloquent\Collection;

class WorkerRepository implements WorkerInterface

{
    /**
     * @param array $attributes
     *
     * @return Collection
     */
    public function all(array $attributes): Collection
    {
        return Worker::filter($attributes)->orderBy('id', 'asc')->get();
    }

    /**
     * @param array $attribute
     *
     * @return Worker
     */
    public function create(array $attribute): Worker
    {

        $worker = new Worker($attribute);
        $worker->save();
        return $worker;
    }

    /**
     * @param Worker $worker
     *
     * @return Worker
     */
    public function show(Worker $worker): Worker
    {
        return $worker;
    }

    /**
     * @param Worker $worker
     * @param array $attributes
     *
     * @return Worker
     */
    public function update(Worker $worker, array $attributes): Worker
    {
        $worker->fill($attributes);

        $worker->save();

        return $worker;
    }

    /**
     * @param Worker $worker
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Worker $worker): bool
    {
        return $worker->delete();
    }
}

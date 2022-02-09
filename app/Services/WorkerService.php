<?php

namespace App\Services;

use Exception;

use App\Models\Worker;

use App\Interfaces\WorkerInterface;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Collection;

class WorkerService
{
    /**
     * @var WorkerInterface
     */
    protected $repository;

    /**
     * @param WorkerInterface $repository
     *
     * @return void
     */
    public function __construct(WorkerInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $attributes
     *
     * @return Collection
     */
    public function all(array $attributes): Collection
    {
        $result = $this->repository->all($attributes);
        $result->transform(function ($item) {
            return [
                'id' => $item->id,
                'first_name' => $item->first_name,
            ];
        });

        return $result;
    }

    /**
     * @param array $attributes
     *
     * @return Worker
     */
    public function create(array $attributes): Worker
    {
        $attributes['slug'] = Str::slug($attributes['first_name']) ?? $attributes['first_name'];
        $uniques = Arr::only($attributes, ['slug']);
        $this->checkForExists($uniques);

        return $this->repository->create($attributes);
    }

    /**
     * @param Worker $worker
     *
     * @return array
     */
    public function show(Worker $worker): array
    {
        $result = $this->repository->show($worker);


        return [
            'id' => $result->id,
            'first_name' => $result->first_name,
            'last_name' => $result->last_name,
            'middle_name' => $result->middle_name,
            'position' => $result->position,
            'adress' => $result->adress,
            'company' => $result->company,
            'phone' => $result->phone,
            'company_id' => $result->company_id
        ];
    }

    /**
     * @param Worker $worker
     * @param array $attributes
     *
     * @return Worker
     */
    public function update(Worker $worker, array $attributes): Worker
    {
        $attributes['slug'] = Str::slug($attributes['first_name']) ?? $attributes['first_name'];

        $uniques = Arr::only($attributes, ['slug']);

        if (! $worker->checkForUnique($uniques)) {
            $this->checkForExists($uniques);
        }

        return $this->repository->update($worker, $attributes);
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
        return $this->repository->delete($worker);
    }

    /**
     * @param array $uniques
     *
     * @return bool
     */
    protected function checkForExists(array $uniques): bool
    {
        return Worker::hasExistsModel($uniques);
    }
}

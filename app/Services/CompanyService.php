<?php

namespace App\Services;

use Exception;

use App\Models\Company;

use App\Interfaces\CompanyInterface;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Collection;

class CompanyService
{
    /**
     * @var CompanyInterface
     */
    protected $repository;

    /**
     * @param CompanyInterface $repository
     *
     * @return void
     */
    public function __construct(CompanyInterface $repository)
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
                'name' => $item->name,
            ];
        });

        return $result;
    }

    /**
     * @param array $attributes
     *
     * @return Company
     */
    public function create(array $attributes): Company
    {
        $attributes['slug'] = Str::slug($attributes['name']) ?? $attributes['name'];

        $uniques = Arr::only($attributes, ['slug']);
        $this->checkForExists($uniques);

        return $this->repository->create($attributes);
    }

    /**
     * @param Company $company
     *
     * @return array
     */
    public function show(Company $company): array
    {
        $result = $this->repository->show($company);


        return [
            'id' => $result->id,
            'name' => $result->name,
            'director_name' => $result->director_name,
            'email' => $result->email,
            'adress' => $result->adress,
            'website_link' => $result->website_link,
            'phone' => $result->phone,
            'user_id' => $result->user_id,
        ];
    }

    /**
     * @param Company $company
     * @param array $attributes
     *
     * @return Company
     */
    public function update(Company $company, array $attributes): Company
    {
        $attributes['slug'] = Str::slug($attributes['name']) ?? $attributes['name'];

        $uniques = Arr::only($attributes, ['slug']);
        
        if (! $company->checkForUnique($uniques)) {
            $this->checkForExists($uniques);
        }

        return $this->repository->update($company, $attributes);
    }

    /**
     * @param Company $company
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Company $company): bool
    {
        return $this->repository->delete($company);
    }

    /**
     * @param array $uniques
     *
     * @return bool
     */
    protected function checkForExists(array $uniques): bool
    {
        return Company::hasExistsModel($uniques);
    }
}

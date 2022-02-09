<?php

namespace App\Repositories;

use App\Interfaces\CompanyInterface;
use Exception;

use App\Models\Company;


use Illuminate\Database\Eloquent\Collection;

class CompanyRepository implements CompanyInterface

{
    /**
     * @param array $attributes
     *
     * @return Collection
     */
    public function all(array $attributes): Collection
    {
        return Company::filter($attributes)->orderBy('id', 'asc')->get();
    }

    /**
     * @param array $attribute
     *
     * @return Company
     */
    public function create(array $attribute): Company
    {
        $Company = new Company($attribute);
        $Company->save();
        return $Company;
    }

    /**
     * @param Company $Company
     *
     * @return Company
     */
    public function show(Company $Company): Company
    {
        return $Company;
    }

    /**
     * @param Company $Company
     * @param array $attributes
     *
     * @return Company
     */
    public function update(Company $Company, array $attributes): Company
    {
        $Company->fill($attributes);

        $Company->save();

        return $Company;
    }

    /**
     * @param Company $Company
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Company $Company): bool
    {
        return $Company->delete();
    }
}

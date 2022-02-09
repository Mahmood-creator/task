<?php

namespace App\Interfaces;

use Exception;

use App\Models\Company;

use Illuminate\Database\Eloquent\Collection;

interface CompanyInterface
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
     * @return Company
     */
    public function create(array $attribute): Company;

    /**
     * @param Company $Company
     *
     * @return Company
     */
    public function show(Company $Company): Company;

    /**
     * @param Company $Company
     * @param array $attributes
     *
     * @return Company
     */
    public function update(Company $Company, array $attributes): Company;

    /**
     * @param Company $Company
     *
     * @return bool
     *
     * @throws Exception
     */
    public function delete(Company $Company): bool;
}

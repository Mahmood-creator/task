<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;

trait HasExistsModel
{
    /**
     * @param array $attributes
     *
     * @return bool
     */
    public function checkForUnique(array $attributes): bool
    {
        foreach ($attributes as $key => $value) {
            if ($this->{$key} !== $value) {
                return false;
            }
        }

        return true;
    }

    /**
         * @param array $attributes
         *
         * @return bool
         */
        public static function hasExistsModel(array $attributes): bool
        {
            $model = static::query();

            foreach ($attributes as $key => $value) {
                $model->where($key, '=', $value);
            }

            try {
                $model->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                return false;
            }

            return true;
        }
}

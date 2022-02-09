<?php

namespace App\Models;

use App\Traits\HasExistsModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model
{
    use HasExistsModel;

    /**
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
         * @var string
         */
        protected $table = 'workers';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name', 'slug','last_name','adress','middle_name','position','phone', 'company_id', 'company'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
    /**
     * @param Builder $query
     * @param array $attributes
     *
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $attributes): Builder
    {
        return $query->when($attributes['search'] ?? null, function (Builder $query, string $search) {
            return $query->where('worker.first_name', 'like', '%' . $search . '%');
        });
    }
}

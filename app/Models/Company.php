<?php

namespace App\Models;

use App\Traits\HasExistsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasExistsModel;

    /**
     * @return HasMany
     */
    public function workers() : HasMany
    {
        return $this->hasMany(Worker::class, 'company_id');
    }

    /**
     * @return HasMany
     */
    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    /**
         * @var string
         */
        protected $table = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug','director_name','adress','email','website_link','phone','user_id'
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
            return $query->where('companies.name', 'like', '%' . $search . '%');
        });
    }
}

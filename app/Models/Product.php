<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\ProductMeasurementTypeEnum;
use App\Models\Services\ProductService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'measurement_type' => ProductMeasurementTypeEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): ProductService
    {
        return new ProductService($this);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/customer/{$this->id}";

        if ($dir) {
            $rootPath .= '/' . trim($dir, '/');
        }

        return $rootPath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeSearch(
        Builder $query,
        string $search = null,
        string $sort = null,
        string $sort_type = null
    )
    {
        if($search) {
            $query->where('name', 'like', '%'.$search.'%');
            $query->orWhere('brand', 'like', '%'.$search.'%');
        }

        if($sort) {
            $query->orderBy($sort, $sort_type);
        }

        return $query;
    }
}

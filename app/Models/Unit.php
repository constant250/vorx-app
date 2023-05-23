<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\StorageDiskEnum;
use App\Models\Services\UnitService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\Factories\FileServiceFactory;
use App\Models\Enums\UnitStatusEnum;
use App\Models\Enums\UnitTypeEnum;
use App\Models\Enums\UnitVetFlagEnum;

class Unit extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'unit_type' => UnitTypeEnum::class,
        'vet_flag' => UnitVetFlagEnum::class,
        'status' => UnitStatusEnum::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): UnitService
    {
        return new UnitService($this);
    }

    public function FileServiceFactory(string $dir = null)
    {
        return FileServiceFactory::resolve($this, StorageDiskEnum::PUBLIC_S3(), $dir);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/vorx-2/units/{$this->id}";

        if ($dir) {
            $rootPath .= '/' . trim($dir, '/');
        }

        return $rootPath;
    }

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

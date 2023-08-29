<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\StorageDiskEnum;
use App\Models\Enums\CourseStatusEnum;
use App\Models\Services\CourseService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\Factories\FileServiceFactory;

class Course extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'status' => CourseStatusEnum::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): CourseService
    {
        return new CourseService($this);
    }
    
    public function FileServiceFactory(string $dir = null)
    {
        return FileServiceFactory::resolve($this, StorageDiskEnum::PUBLIC_S3(), $dir);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/vorx-2/course/{$this->id}";

        if ($dir) {
            $rootPath .= '/' . trim($dir, '/');
        }

        return $rootPath;
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function structure_fee()
    {
        return $this->hasMany(CourseStructureFee::class);
    }
}

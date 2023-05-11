<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\StorageDiskEnum;
use App\Models\Enums\StudentShoreTypeEnum;
use App\Models\Enums\StudentStatusEnum;
use App\Models\Enums\StudentTestEnum;
use App\Models\Services\StudentService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\Factories\FileServiceFactory;

class Student extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'is_active' => StudentStatusEnum::class,
        'is_test' => StudentTestEnum::class,
        'shore_type' => StudentShoreTypeEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): StudentService
    {
        return new StudentService($this);
    }

    public function FileServiceFactory(string $dir = null)
    {
        return FileServiceFactory::resolve($this, StorageDiskEnum::PUBLIC_S3(), $dir);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/vorx-2/student/{$this->id}";

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
    
    public function contact_details()
    {
        return $this->hasOne(StudentContactDetail::class);
    }

    public function visa_details()
    {
        return $this->hasOne(StudentVisaDetail::class);
    }

    public function avetmiss_details()
    {
        return $this->hasOne(StudentAvetmissDetail::class);
    }
}

<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
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

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/course/{$this->id}";

        if ($dir) {
            $rootPath .= '/' . trim($dir, '/');
        }

        return $rootPath;
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}

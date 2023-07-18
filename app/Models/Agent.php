<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\AgentShoreTypeEnum;
use App\Models\Enums\AgentStatusEnum;
use App\Models\Enums\AgentTestEnum;
use App\Models\Enums\StorageDiskEnum;
use App\Models\Services\AgentService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\Factories\FileServiceFactory;

class Agent extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'is_active' => AgentStatusEnum::class,
        'is_test' => AgentTestEnum::class,
        'shore_type' => AgentShoreTypeEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): AgentService
    {
        return new AgentService($this);
    }

    public function FileServiceFactory(string $dir = null)
    {
        return FileServiceFactory::resolve($this, StorageDiskEnum::PUBLIC_S3(), $dir);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/vorx-2/agent/{$this->id}";

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
}

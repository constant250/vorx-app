<?php

namespace App\Models;

use App\Models\Enums\OrganisationStatusEnum;
use App\Models\Services\OrganisationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Interfaces\ImageableInterface;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'status' => OrganisationStatusEnum::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());

    }

    public function Service(): OrganisationService
    {
        return new OrganisationService($this);
    }


    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/vorx-2/organisation/{$this->id}";

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

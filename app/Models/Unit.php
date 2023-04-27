<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Services\UnitService;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope());
    }

    public function Service(): UnitService
    {
        return new UnitService($this);
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

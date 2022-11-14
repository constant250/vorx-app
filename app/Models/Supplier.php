<?php

namespace App\Models;

use App\Interfaces\ImageableInterface;
use App\Models\Services\SupplierService;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model implements ImageableInterface
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function Service(): SupplierService
    {
        return new SupplierService($this);
    }

    public function getRootDestinationPath(string $dir = null): string
    {
        $rootPath = "/customer/{$this->id}";

        if ($dir) {
            $rootPath .= '/' . trim($dir, '/');
        }

        return $rootPath;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

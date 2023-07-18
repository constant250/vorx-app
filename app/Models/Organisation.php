<?php

namespace App\Models;

use App\Models\Enums\OrganisationStatusEnum;
use App\Models\Services\OrganisationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Interfaces\ImageableInterface;
use App\Models\Enums\StorageDiskEnum;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\Factories\FileServiceFactory;

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

    public function FileServiceFactory(string $dir = null)
    {
        return FileServiceFactory::resolve($this, StorageDiskEnum::PUBLIC_S3(), $dir);
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

    public function org_bank()
    {
        return $this->hasOne(OrganisationBankDetails::class);
    }

    public function org_type()
    {
    	return $this->belongsTo(AvtOrgType::class, 'org_type_identifier', 'value');
    }

    public function suburb_details()
    {
    	return $this->belongsTo(AvtPostcode::class, 'suburb', 'id');
    }
    
    public function delivery_locations()
    {
        return $this->hasMany(OrganisationDeliveryLocation::class, 'organisation_id', 'id');
    }
}

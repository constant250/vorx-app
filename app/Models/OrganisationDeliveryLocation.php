<?php

namespace App\Models;

use App\Models\Services\OrganisationDeliveryLocationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Enums\OrganisationDlvrLocStatusEnum;

class OrganisationDeliveryLocation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'is_active' => OrganisationDlvrLocStatusEnum::class
    ];

    public function Service(): OrganisationDeliveryLocationService
    {
        return new OrganisationDeliveryLocationService($this);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}

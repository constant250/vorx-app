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
    
    public function suburb_details()
    {
    	return $this->belongsTo(AvtPostcode::class, 'suburb', 'id');
    }

    public function state()
    {
    	return $this->belongsTo(AvtStateIdentifier::class, 'state_id', 'id');
    }

    public function country()
    {
    	return $this->belongsTo(AvtCountryIdentifier::class, 'country_id', 'identifier');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

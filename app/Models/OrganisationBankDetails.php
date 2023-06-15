<?php

namespace App\Models;

use App\Models\Services\OrganisationBankDetailsService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganisationBankDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function Service(): OrganisationBankDetailsService
    {
        return new OrganisationBankDetailsService($this);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}

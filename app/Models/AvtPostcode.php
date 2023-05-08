<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvtPostcode extends Model
{
    //
    protected $table = 'avt_postcodes_geo';


    public function state_identifier()
    {
        return $this->belongsTo(AvtStateIdentifier::class, 'state', 'state_key');
    }

    
}

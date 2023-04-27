<?php

namespace App\Models\Services;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UnitService extends ModelService
{
    /**
     * @var Unit
     */
    private $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
        $this->model = $unit;
    }

   
}

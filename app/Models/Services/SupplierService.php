<?php

namespace App\Models\Services;

use App\Models\Supplier;

class SupplierService extends ModelService
{
    /**
     * @var Supplier
     */
    private $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->model = $supplier;
    }

   
}

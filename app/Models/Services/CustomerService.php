<?php

namespace App\Models\Services;

use App\Models\Customer;

class CustomerService extends ModelService
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->model = $customer;
    }

   
}

<?php

namespace App\Models\Services;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;

class OrganisationService extends ModelService
{
    /**
     * @var Organisation
     */
    private $organisation;

    public function __construct(Organisation $organisation)
    {
        $this->organisation = $organisation;
        $this->model = $organisation;
    }

    public static function create(

    )
    {

    }
   

    public function update(

    )
    {

    }
}

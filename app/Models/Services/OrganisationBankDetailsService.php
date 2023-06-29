<?php

namespace App\Models\Services;

use App\Models\OrganisationBankDetails;
use Illuminate\Support\Facades\Auth;

class OrganisationBankDetailsService extends ModelService
{
    
    /**
     * @var OrganisationBankDetails
     */
    private $bank;

    public function __construct(OrganisationBankDetails $bank)
    {
        $this->bank = $bank;
        $this->model = $bank;
    }

    public static function create(
        Int $organisation_id,
        string $bank_name,
        string $bsb,
        string $account_name,
        string $account_number,
        string $branch_address = null,
        string $swift_code = null
    )
    {
        $bank = new OrganisationBankDetails;
        $bank->organisation_id = $organisation_id;
        $bank->bank_name = $bank_name;
        $bank->bsb = $bsb;
        $bank->account_name = $account_name;
        $bank->account_number = $account_number;
        $bank->branch_address = $branch_address;
        $bank->swift_code = $swift_code;
        $bank->save();

        return $bank;
    }
   

    public function update(
        string $bank_name,
        string $bsb,
        string $account_name,
        string $account_number,
        string $branch_address = null,
        string $swift_code = null
    )
    {
        $this->bank->bank_name = $bank_name;
        $this->bank->bsb = $bsb;
        $this->bank->account_name = $account_name;
        $this->bank->account_number = $account_number;
        $this->bank->branch_address = $branch_address;
        $this->bank->swift_code = $swift_code;
        $this->bank->save();

        return $this->bank->fresh();
    }

}

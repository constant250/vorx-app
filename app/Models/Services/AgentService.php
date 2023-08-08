<?php

namespace App\Models\Services;

use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageModelServiceTrait;
use App\Models\Enums\AgentShoreTypeEnum;
use App\Models\Enums\AgentStatusEnum;
use App\Models\Enums\AgentTestEnum;

class AgentService extends ModelService
{
    use ImageModelServiceTrait;
    
    /**
     * @var Agent
     */
    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
        $this->model = $agent;
    }

    public static function create(
        string $agent_code,
        string $company_name = null,
        string $trading_name = null,
        string $agent_name = null,
        string $abn = null,
        string $address = null,
        string $email = null,
        string $alt_email = null,
        string $phone = null,
        string $mobile = null,
        string $fax = null,
        string $website = null,
        string $remarks = null,
        string $bank_name = null,
        string $account_name = null,
        string $bsb = null,
        string $account_number = null,
        AgentShoreTypeEnum $shore_type,
        AgentStatusEnum $is_active,
        AgentTestEnum $is_test
    )
    {
        $agent = new Agent;
            $agent->agent_code = $agent_code;
            $agent->company_name = $company_name;
            $agent->trading_name = $trading_name;
            $agent->agent_name = $agent_name;
            $agent->abn = $abn;
            $agent->address = $address;
            $agent->email = $email;
            $agent->alt_email = $alt_email;
            $agent->phone = $phone;
            $agent->mobile = $mobile;
            $agent->fax = $fax;
            $agent->website = $website;
            $agent->remarks = $remarks;
            $agent->bank_name = $bank_name;
            $agent->account_name = $account_name;
            $agent->bsb = $bsb;
            $agent->account_number = $account_number;
            $agent->shore_type = $shore_type;
            $agent->is_active = $is_active;
            $agent->is_test = $is_test;
            $agent->user_id = Auth::user()->id;
            $agent->account_id = Auth::user()->account_id;
            $agent->save();

            return $agent;
    }
   
    public function update(
        string $company_name = null,
        string $trading_name = null,
        string $agent_name = null,
        string $abn = null,
        string $address = null,
        string $email = null,
        string $alt_email = null,
        string $phone = null,
        string $mobile = null,
        string $fax = null,
        string $website = null,
        string $remarks = null,
        string $bank_name = null,
        string $account_name = null,
        string $bsb = null,
        string $account_number = null,
        AgentShoreTypeEnum $shore_type,
        AgentStatusEnum $is_active,
        AgentTestEnum $is_test
    )
    {
        $this->agent->company_name = $company_name;
        $this->agent->trading_name = $trading_name;
        $this->agent->agent_name = $agent_name;
        $this->agent->abn = $abn;
        $this->agent->address = $address;
        $this->agent->email = $email;
        $this->agent->alt_email = $alt_email;
        $this->agent->phone = $phone;
        $this->agent->mobile = $mobile;
        $this->agent->fax = $fax;
        $this->agent->website = $website;
        $this->agent->remarks = $remarks;
        $this->agent->bank_name = $bank_name;
        $this->agent->account_name = $account_name;
        $this->agent->bsb = $bsb;
        $this->agent->account_number = $account_number;
        $this->agent->shore_type = $shore_type;
        $this->agent->is_active = $is_active;
        $this->agent->is_test = $is_test;
        $this->agent->save();

        return $this->agent->fresh();
    }


    public function uploadImages(object $images)
    {
        foreach ($images as $image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time();
            $file = $this->agent->FileServiceFactory()->uploadFile($image, $filename);

            $this->agent->Service()->attachImage($image, $file['name']);
        }

        return $this->agent->fresh()->images;
    }
}

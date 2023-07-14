<?php

namespace App\Models\Services;

use App\Models\OrganisationDeliveryLocation;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\OrganisationDlvrLocStatusEnum;

class OrganisationDeliveryLocationService extends ModelService
{
    
    /**
     * @var OrganisationDeliveryLocation
     */
    private $deliverylocation;

    public function __construct(OrganisationDeliveryLocation $deliverylocation)
    {
        $this->deliverylocation = $deliverylocation;
        $this->model = $deliverylocation;
    }

    public static function create(
        Int $org_id,
        string $train_org_dlvr_loc_id,
        string $train_org_dlvr_loc_name,
        string $postcode,
        string $state_id,
        string $addr_location,
        string $country_id,
        string $addr_street_num = null,
        string $addr_street_name = null,
        string $addr_building_property_name = null,
        string $addr_flat_unit_detail = null,
        OrganisationDlvrLocStatusEnum $is_active
    )
    {
        $deliverylocation = new OrganisationDeliveryLocation;
        $deliverylocation->org_id = $org_id;
        $deliverylocation->train_org_dlvr_loc_id = $train_org_dlvr_loc_id;
        $deliverylocation->train_org_dlvr_loc_name = $train_org_dlvr_loc_name;
        $deliverylocation->postcode = $postcode;
        $deliverylocation->state_id = $state_id;
        $deliverylocation->addr_location = $addr_location;
        $deliverylocation->country_id = $country_id;
        $deliverylocation->addr_street_num = $addr_street_num;
        $deliverylocation->addr_street_name = $addr_street_name;
        $deliverylocation->addr_building_property_name = $addr_building_property_name;
        $deliverylocation->addr_flat_unit_detail = $addr_flat_unit_detail;
        $deliverylocation->is_active = $is_active;
        $deliverylocation->user_id = Auth::user()->id;
        $deliverylocation->save();

        return $deliverylocation;
    }
   

    public function update(
        Int $org_id,
        string $train_org_dlvr_loc_id,
        string $train_org_dlvr_loc_name,
        string $postcode,
        string $state_id,
        string $addr_location,
        string $country_id,
        string $addr_street_num = null,
        string $addr_street_name = null,
        string $addr_building_property_name = null,
        string $addr_flat_unit_detail = null,
        OrganisationDlvrLocStatusEnum $is_active
    )
    {
        $this->deliverylocation->org_id = $org_id;
        $this->deliverylocation->train_org_dlvr_loc_id = $train_org_dlvr_loc_id;
        $this->deliverylocation->train_org_dlvr_loc_name = $train_org_dlvr_loc_name;
        $this->deliverylocation->postcode = $postcode;
        $this->deliverylocation->state_id = $state_id;
        $this->deliverylocation->addr_location = $addr_location;
        $this->deliverylocation->country_id = $country_id;
        $this->deliverylocation->addr_street_num = $addr_street_num;
        $this->deliverylocation->addr_street_name = $addr_street_name;
        $this->deliverylocation->addr_building_property_name = $addr_building_property_name;
        $this->deliverylocation->addr_flat_unit_detail = $addr_flat_unit_detail;
        $this->deliverylocation->is_active = $is_active;
        $this->deliverylocation->save();

        return $this->deliverylocation->fresh();
    }

}
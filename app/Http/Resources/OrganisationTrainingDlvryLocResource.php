<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationTrainingDlvryLocResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'organisation_id' => $this->organisation_id,
            'train_org_dlvr_loc_id' => $this->train_org_dlvr_loc_id,
            'train_org_dlvr_loc_name' => $this->train_org_dlvr_loc_name,
            'state_id' => $this->state_id,
            'state' => $this->state,
            'country_id' => $this->country_id,
            'country' => $this->country,
            'branch_address' => $this->branch_address,
            'suburb' => $this->suburb,
            'suburb_details' => $this->suburb_details,
            'postcode' => $this->postcode,
            'addr_location' => $this->addr_location,
            'addr_street_num' => $this->addr_street_num,
            'addr_street_name' => $this->addr_street_name,
            'addr_building_property_name' => $this->addr_building_property_name,
            'addr_flat_unit_detail' => $this->addr_flat_unit_detail,
            'is_active' => $this->is_active,
            'is_active_label' => $this->is_active->getLabel(),
            'user' => $this->user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
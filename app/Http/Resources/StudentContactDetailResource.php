<?php

namespace App\Http\Resources;
use App\Models\Student;
use App\Models\StudentContactDetail;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StudentContactDetailResource.
 *
 * @property StudentContactDetail $resource
 */
class StudentContactDetailResource extends JsonResource
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
            'addr_suburb' => $this->addr_suburb,
            'addr_flat_unit_detail' => $this->addr_flat_unit_detail,
            'addr_building_property_name' => $this->addr_building_property_name,
            'addr_street_name' => $this->addr_street_name,
            'addr_street_num' => $this->addr_street_num,
            'postcode' => $this->postcode,
            'state' => $this->state,
            'addr_postal_delivery_box' => $this->addr_postal_delivery_box,
            'home_country_res_addr' => $this->home_country_res_addr,
            'phone_home' => $this->phone_home,
            'phone_work' => $this->phone_work,
            'phone_mobile' => $this->phone_mobile,
            'email' => $this->email,
            'email_alt' => $this->email_alt,
            'emer_name' => $this->emer_name,
            'emer_address' => $this->emer_address,
            'emer_phone' => $this->emer_phone,
            'emer_relationship' => $this->emer_relationship,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

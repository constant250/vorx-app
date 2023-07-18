<?php

namespace App\Http\Requests\Organisation;

use App\Models\Enums\OrganisationDlvrLocStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrganisationTrainingDlvryLocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'train_org_dlvr_loc_id' => 'required',
            'train_org_dlvr_loc_name' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'suburb' => 'required',
            'postcode' => 'required',
            'addr_location' => 'nullable',
            'addr_street_num' => 'nullable',
            'addr_street_name' => 'nullable',
            'addr_building_property_name' => 'nullable',
            'addr_flat_unit_detail' => 'nullable',
            'is_active' => [Rule::in(OrganisationDlvrLocStatusEnum::members())],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'train_org_dlvr_loc_id' => 'Delivery Location Identifier',
            'train_org_dlvr_loc_name' => 'Delivery Location Name',
            'state_id' => 'State Identifier',
            'country_id' => 'Country',
            'suburb' => 'Suburb, Locality or Town',
            'postcode' => 'Postcode',
            'addr_location' => 'Location',
            'addr_street_num' => 'Street Number',
            'addr_street_name' => 'Street Name',
            'addr_building_property_name' => 'Building Property Name',
            'addr_flat_unit_detail' => 'Flat Unit Detail',
            'is_active' => 'Status',
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }
}

<?php

namespace App\Http\Requests\Organisation;

use App\Models\Enums\OrganisationStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrganisationRequest extends FormRequest
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
            'organisation_id' => 'nullable',
            'organisation_name' => 'nullable',
            'organisation_logo' => 'nullable',
            'org_type_identifier' => 'nullable',
            'abn' => 'nullable',
            'cricos_code' => 'nullable',
            'site_url' => 'nullable',
            'contact_name' => 'nullable',
            'phone_number' => 'nullable|numeric',
            'fax_number' => 'nullable',
            'email' => 'nullable|email',
            'addr_line_1' => 'nullable',
            'addr_line_2' => 'nullable',
            'suburb' => 'nullable',
            'student_id_prefix' => 'nullable',
            'person_in_charge_name' => 'nullable',
            'person_in_charge_position' => 'nullable',
            'person_in_charge_signature' => 'nullable',
            'status' => [Rule::in(OrganisationStatusEnum::members())]
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
            'organisation_id' => 'Organisation Identifier',
            'organisation_name' => 'Organisation Name',
            'organisation_logo' => 'Organisation Logo',
            'org_type_identifier' => 'Organisation Type',
            'abn' => 'ABN',
            'cricos_code' => 'CRICOS Code',
            'site_url' => 'Website Url',
            'contact_name' => 'Contact Name',
            'phone_number' => 'Telephone Number',
            'fax_number' => 'Facsimile Number',
            'email' => 'Email Address',
            'addr_line_1' => 'Address Line',
            'addr_line_2' => 'Address Line',
            'suburb' => 'Suburb, State Postcode',
            'student_id_prefix' => 'Student ID Prefix',
            'person_in_charge_name' => 'Person In-Charge',
            'person_in_charge_position' => 'Person In-Charge Position',
            'person_in_charge_signature' => 'Person In-Charge Signature',
            'status' => [Rule::in(OrganisationStatusEnum::members())]
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }
}

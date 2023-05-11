<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateStudentContactDetailRequest extends FormRequest
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
            'student_id' => 'sometimes',
            'addr_suburb' => 'sometimes',
            'addr_flat_unit_detail' => 'sometimes',
            'addr_building_property_name' => 'sometimes',
            'addr_street_name' => 'sometimes',
            'addr_street_num' => 'sometimes',
            'postcode' => 'sometimes',
            'state' => 'sometimes',
            'addr_postal_delivery_box' => 'sometimes',
            'home_country_res_addr' => 'sometimes',
            'phone_home' => 'sometimes',
            'phone_work' => 'sometimes',
            'phone_mobile' => 'sometimes',
            'email' => 'nullable|email',
            'email_alt' => 'nullable|email',
            'emer_name' => 'sometimes',
            'emer_address' => 'sometimes',
            'emer_phone' => 'sometimes',
            'emer_relationship' => 'sometimes',
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
            'student_id' => 'Student ID',
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }

}

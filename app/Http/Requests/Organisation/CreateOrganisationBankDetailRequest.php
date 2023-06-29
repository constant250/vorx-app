<?php

namespace App\Http\Requests\Organisation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrganisationBankDetailRequest extends FormRequest
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
            'bank_name' => 'required',
            'bsb' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'branch_address' => 'nullable',
            'swift_code' => 'nullable'
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
            'bank_name' => 'Bank Name',
            'bsb' => 'BSB',
            'account_name' => 'Account Name',
            'account_number' => 'Account Number',
            'branch_address' => 'Branch Address',
            'swift_code' => 'Swift Code'
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }
}

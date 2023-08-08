<?php

namespace App\Http\Requests\Agent;

use App\Models\Enums\AgentShoreTypeEnum;
use App\Models\Enums\AgentStatusEnum;
use App\Models\Enums\AgentTestEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAgentRequest extends FormRequest
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
            'agent_code' => 'sometimes',
            'company_name' => 'required',
            'trading_name' => 'required',
            'agent_name' => 'required',
            'abn' => 'nullable',
            'address' => 'nullable',
            'email' => 'required|email',
            'alt_email' => 'nullable|email',
            'phone' => 'required',
            'mobile' => 'nullable',
            'fax' => 'nullable',
            'website' => 'nullable',
            'remarks' => 'nullable',
            'bank_name' => 'nullable',
            'account_name' => 'nullable',
            'bsb' => 'nullable',
            'account_number' => 'nullable',
            'shore_type' => [Rule::in(AgentShoreTypeEnum::members())],
            'is_active' => [Rule::in(AgentStatusEnum::members())],
            'is_test' => [Rule::in(AgentTestEnum::members())]
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
            'agent_code' => 'Agent Code',
            'company_name' => 'Company Name',
            'trading_name' => 'Trading Name',
            'agent_name' => 'Agent Name',
            'abn' => 'ABN',
            'address' => 'Address',
            'email' => 'Email',
            'alt_email' => 'Alternative Email',
            'phone' => 'Telephone Number',
            'mobile' => 'Mobile Number',
            'fax' => 'Facsimile Number',
            'website' => 'Website Url',
            'remarks' => 'Remarks',
            'bank_name' => 'Bank Name',
            'account_name' => 'Acount Name',
            'bsb' => 'BSB',
            'account_number' => 'Acount Number',
            'shore_type' => [Rule::in(AgentShoreTypeEnum::members())],
            'is_active' => [Rule::in(AgentStatusEnum::members())],
            'is_test' => [Rule::in(AgentTestEnum::members())]
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }
}

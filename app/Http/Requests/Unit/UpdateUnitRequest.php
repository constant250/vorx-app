<?php

namespace App\Http\Requests\Unit;

use App\Models\Enums\UnitStatusEnum;
use App\Models\Enums\UnitTypeEnum;
use App\Models\Enums\UnitVetFlagEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
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
            'code' => 'required',
            'description' => 'sometimes',
            'unit_type' => [Rule::in(UnitTypeEnum::members())],
            'assessment_method' => 'required',
            'nominal_hours' => 'sometimes',
            'scheduled_hours' => 'sometimes',
            'training_method_id' => 'sometimes',
            'subject_field_educ_id' => 'sometimes',
            'vet_flag' => [Rule::in(UnitVetFlagEnum::members())],
            'status' => [Rule::in(UnitStatusEnum::members())],
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
            'code' => 'Code',
            'unit_type' => 'Unit Type',
            'assessment_method' => 'Assessment Method',
            'vet_flag' => 'VET Flag Status',
            'status' => 'Status',
        ];
    }

}

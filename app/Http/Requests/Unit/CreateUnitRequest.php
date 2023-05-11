<?php

namespace App\Http\Requests\Unit;

use App\Models\Enums\UnitStatusEnum;
use App\Models\Enums\UnitTypeEnum;
use App\Models\Enums\UnitVetFlagEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUnitRequest extends FormRequest
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
            'assessment_method' => 'sometimes',
            'nominal_hours' => 'nullable|numeric',
            'scheduled_hours' => 'nullable|numeric',
            'training_method_id' => 'nullable|numeric',
            'subject_field_educ_id' => 'nullable|numeric',
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
            'nominal_hours' => 'Nominal Hours',
            'scheduled_hours' => 'Scheduled Hours',
            'training_method_id' => 'Training Method',
            'subject_field_educ_id' => 'Subject Field of Education Identifier',
            'vet_flag' => 'VET Flag Status',
            'status' => 'Status',
        ];
    }

}

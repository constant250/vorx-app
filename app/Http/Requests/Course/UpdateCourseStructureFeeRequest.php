<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseStructureFeeRequest extends FormRequest
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
            'cricos_code' => 'nullable',
            'state_id' => 'nullable|numeric',
            'week_duration' => 'nullable|numeric',
            'training_hours_weekly' => 'nullable|numeric',
            'work_placement' => 'nullable|numeric',
            'onshore_material_fee' => 'nullable|numeric',
            'onshore_application_fee' => 'nullable|numeric',
            'onshore_tuition_fee' => 'nullable|numeric',
            'offshore_material_fee' => 'nullable|numeric',
            'offshore_application_fee' => 'nullable|numeric',
            'offshore_tuition_fee' => 'nullable|numeric',
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
            'cricos_code' => 'Cricos Code',
            'state_id' => 'Location',
            'week_duration' => 'Duration (Weeks)',
            'training_hours_weekly' => 'Training hours weekly',
            'work_placement' => 'Work Placement (Hours)',
            'onshore_material_fee' => 'Onshore Material Fees',
            'onshore_application_fee' => 'Onshore Enrolment/Application Fees',
            'onshore_tuition_fee' => 'Onshore Tuition fees',
            'offshore_material_fee' => 'Offshore Material fees',
            'offshore_application_fee' => 'Offshore Enrolment/Application fees',
            'offshore_tuition_fee' => 'Offshore Tuition fees',
        ];
    }
}

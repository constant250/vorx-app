<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Enums\AtSchoolFlagEnum;
use App\Models\Enums\DisabilityFlagEnum;
use App\Models\Enums\PriorEducationalAchievementFlagEnum;
use Illuminate\Validation\Rule;

class CreateStudentAvetmissDetailRequest extends FormRequest
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
            'usi' => 'sometimes',
            'highest_school_level_completed_id' => 'sometimes',
            'indigenous_status_id' => 'sometimes',
            'language_id' => 'sometimes',
            'labour_force_status_id' => 'sometimes',
            'country_id' => 'sometimes',
            'disability_flag' => [Rule::in(DisabilityFlagEnum::members())],
            'disability' => 'sometimes',
            'prior_educational_achievment_flag' => [Rule::in(PriorEducationalAchievementFlagEnum::members())],
            'prior_educational_achievment' => 'sometimes',
            'at_school_flag' => [Rule::in(AtSchoolFlagEnum::members())],
            'institute' => 'sometimes',
            'city_of_birth' => 'sometimes',
            'survey_contact_status' => 'sometimes',
            'statistical_area_level_1_id' => 'sometimes',
            'statistical_area_level_2_id' => 'sometimes',
            'year_completed' => 'sometimes',
            'aiss_check_date' => 'nullable|date',
            'english_test_id' => 'nullable|numeric',
            'english_test_score' => 'sometimes',
            'english_test_date' => 'nullable|date',
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
}

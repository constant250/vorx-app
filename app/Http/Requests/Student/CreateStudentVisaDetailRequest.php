<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Enums\StudyRightsEnum;
use App\Models\Enums\AppliedForAuResidencyEnum;
use Illuminate\Validation\Rule;

class CreateStudentVisaDetailRequest extends FormRequest
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
            'nationality' => 'sometimes',
            'passport_no' => 'sometimes',
            'passport_issued_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date',
            'visa_type_id' => 'nullable|numeric',
            'subclass' => 'sometimes',
            'visa_expiry_date' => 'nullable|date',
            'study_rights' => [Rule::in(StudyRightsEnum::members())],
            'applied_for_au_residency' => [Rule::in(AppliedForAuResidencyEnum::members())],
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
            'nationality' => 'Nationality',
            'passport_no' => 'Passport No.',
            'passport_issued_date' => 'Passport Issued Date',
            'passport_expiry_date' => 'Passport Expiry Date',
            'visa_type_id' => 'Visa Type ID',
            'subclass' => 'Subclass',
            'visa_expiry_date' => 'Visa Expiry Date',
            'study_rights' => 'Study Rights',
            'applied_for_au_residency' => 'Applied for AU Residendy',
        ];
    }
}

<?php

namespace App\Http\Requests\Student;

use App\Models\Enums\StudentShoreTypeEnum;
use App\Models\Enums\StudentStatusEnum;
use App\Models\Enums\StudentTestEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            'student_id' => ['sometimes', Rule::unique('students')->ignore($this->student)],
            'firstname' => 'required',
            'middlename' => 'sometimes',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'sometimes',
            'shore_type' => [Rule::in(StudentShoreTypeEnum::members())],
            'is_active' => [Rule::in(StudentStatusEnum::members())],
            'is_test' => [Rule::in(StudentTestEnum::members())]
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
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'date_of_birth' => 'Date of Birth',
            'shore_type' => 'Shore Type',
            'is_active' => 'Status',
            'is_test' => 'Test Data',
        ];
    }

    protected function prepareForValidation(){
        // dd($this->request);
    }
}

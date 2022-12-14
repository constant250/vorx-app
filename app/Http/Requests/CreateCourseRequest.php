<?php

namespace App\Http\Requests;

use App\Models\Enums\CourseStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCourseRequest extends FormRequest
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
            'name' => 'required',
            'target_enrolee' => 'required|numeric',
            'tp_code' => 'sometimes',
            'status' => [Rule::in(CourseStatusEnum::members())]
        ];
    }
}

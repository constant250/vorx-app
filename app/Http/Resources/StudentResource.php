<?php

namespace App\Http\Resources;
use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StudentResource.
 *
 * @property Student $resource
 */
class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);\
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'date_of_birth' => $this->date_of_birth,
            'shore_type' => $this->shore_type,
            'shore_type_label' => $this->shore_type->getLabel(),
            'is_active' => $this->is_active,
            'is_active_label' => $this->is_active->getLabel(),
            'is_test' => $this->is_test,
            'is_test_label' => $this->is_test->getLabel(),
            'contact_details' => new StudentContactDetailResource($this->contact_details),
            'visa_details' => new StudentVisaDetailResource($this->visa_details),
            'avetmiss_details' => new StudentAvetmissDetailResource($this->avetmiss_details),
            'attachments' => ImageResource::collection($this->images),
            'user' => $this->user,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentVisaDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nationality' => $this->nationality,
            'passport_no' => $this->passport_no,
            'passport_issued_date' => $this->passport_issued_date,
            'passport_expiry_date' => $this->passport_expiry_date,
            'visa_type_id' => $this->visa_type_id,
            'visa' => $this->visa,
            'subclass' => $this->subclass,
            'visa_expiry_date' => $this->visa_expiry_date,
            'study_rights' => $this->study_rights,
            'study_rights_label' => $this->study_rights->getLabel(),
            'applied_for_au_residency' => $this->applied_for_au_residency,
            'applied_for_au_residency_label' => $this->applied_for_au_residency->getLabel(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

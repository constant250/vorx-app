<?php

namespace App\Http\Resources;
use App\Models\Unit;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UnitResource.
 *
 * @property Unit $resource
 */
class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'code' => $this->code,
            'description' => $this->description,
            'unit_type' => $this->unit_type,
            'unit_type_label' => $this->unit_type->getLabel(),
            'assessment_method' => $this->assessment_method,
            'nominal_hours' => $this->nominal_hours,
            'scheduled_hours' => $this->scheduled_hours,
            'training_method_id' => $this->training_method_id,
            'subject_field_educ_id' => $this->subject_field_educ_id,
            'vet_flag' => $this->vet_flag,
            'vet_flag_label' => $this->vet_flag->getLabel(),
            'status' => $this->status,
            'status_label' => $this->status->getLabel(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'user' => $this->user,
            'account' => $this->account,
            'attachments' => ImageResource::collection($this->images),
            

        ];
    }
}

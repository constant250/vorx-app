<?php

namespace App\Http\Resources;

use App\Models\Enums\CourseStatusEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'name' => $this->name,
            'title' => $this->title,
            'target_enrolee' => $this->target_enrolee,
            'tp_code' => $this->tp_code,
            'status' => $this->status,
            'status_label' => $this->status->getLabel(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'units' => $this->units,
            'user' => $this->user,
            'account' => $this->account,
            'attachments' => ImageResource::collection($this->images),
        ];
    }
}

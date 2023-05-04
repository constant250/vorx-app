<?php

namespace App\Http\Resources;
use App\Models\Student;
use App\Models\StudentContactDetail;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StudentContactDetailResource.
 *
 * @property StudentContactDetail $resource
 */
class StudentContactDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

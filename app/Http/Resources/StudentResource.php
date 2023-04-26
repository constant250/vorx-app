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
        return parent::toArray($request);
    }
}

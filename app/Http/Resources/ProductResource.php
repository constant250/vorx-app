<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->name,
            'name' => $this->name,
            'brand' => $this->brand,
            'unit' => $this->unit,
            'measurement_type' => $this->measurement_type->getLabel(),
            'low_quantity' => $this->low_quantity,
            'is_active' => $this->is_active,
            'user_id' => $this->user_id,
            'author' => $this->user->name,
            'account_id' => $this->account_id,
            'account_name' => $this->account->company_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

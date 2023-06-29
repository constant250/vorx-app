<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationBankDetailResource extends JsonResource
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
            'organisation_id' => $this->organisation_id,
            'bank_name' => $this->bank_name,
            'bsb' => $this->bsb,
            'account_name' => $this->account_name,
            'account_number' => $this->account_number,
            'branch_address' => $this->branch_address,
            'swift_code' => $this->swift_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}

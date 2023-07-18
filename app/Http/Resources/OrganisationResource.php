<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Organisation;

/**
 * Class OrganisationResource.
 *
 * @property Organisation $resource
 */
class OrganisationResource extends JsonResource
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
            'organisation_name' => $this->organisation_name,
            'organisation_logo' => $this->organisation_logo,
            'org_type_identifier' => $this->org_type_identifier,
            'org_type' => $this->org_type,
            'abn' => $this->abn,
            'cricos_code' => $this->cricos_code,
            'site_url' => $this->site_url,
            'contact_name' => $this->contact_name,
            'phone_number' => $this->phone_number,
            'fax_number' => $this->fax_number,
            'email' => $this->email,
            'addr_line_1' => $this->addr_line_1,
            'addr_line_2' => $this->addr_line_2,
            'suburb' => $this->suburb,
            'suburb_details' => $this->suburb_details,
            'student_id_prefix' => $this->student_id_prefix,
            'person_in_charge_name' => $this->person_in_charge_name,
            'person_in_charge_position' => $this->person_in_charge_position,
            'person_in_charge_signature' => $this->person_in_charge_signature,
            'status' => $this->status,
            'status_label' => $this->status->getLabel(),
            'org_bank' => new OrganisationBankDetailResource($this->org_bank),
            'delivery_locations' => OrganisationTrainingDlvryLocResource::collection($this->delivery_locations),
            'attachments' => ImageResource::collection($this->images),
            'user' => $this->user,
            'account' => $this->account,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}

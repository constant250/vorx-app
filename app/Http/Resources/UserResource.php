<?php

namespace App\Http\Resources;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AccountResource.
 *
 * @property User $resource
 */
class UserResource extends JsonResource
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
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
//            'avatar' => new ImageResource($this->resource->image), // uncomment this if the UI is able to handle file upload
            'account_id' => $this->resource->account_id,
            'account_name' => $this->resource->account->company_name,
            'is_owner' => $this->resource->is_owner,
            'is_active' => $this->resource->is_active,
            'has_analytics_setup' => $this->resource->account->has_analytics_setup,
            'role_id' => $this->resource->role_id,
            'role_label' => $this->resource->role_id->getLabel(),
            // 'created_at' => $this->resource->created_at,
            // 'updated_at' => $this->resource->updated_at,
            // 'deleted_at' => $this->resource->deleted_at,
        ];
    }
}
